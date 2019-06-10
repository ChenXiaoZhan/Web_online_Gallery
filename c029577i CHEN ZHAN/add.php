<?php

$output='';
$success = false;
if($_POST)
{
    if(!empty($_POST['uid'])&&!empty($_POST['des'])&&!empty($_POST['url'])) {
        include("database.php");
        $des=$_POST['des'];
        $uid=$_POST['uid'];
        $url = $_POST['url'];

        $stmt=$conn->prepare("INSERT INTO image (Description,URL, UserID) VALUES (?, ?, ?)");

        $stmt->bind_param('ssi',$des,$url,$uid);
        $stmt->execute();
        if($stmt->affected_rows === 1){
            $success = true;
            $id = $stmt->insert_id;
            $output='<div class=\'container\'><p>image added successfully</p>';
            /*
            $output = $output . "<figure><img src='";
            $output = $output . $url . "' alt='A picture of ". $des;
            $output = $output . "'><figcaption><p>". $des . "</p></figcaption></figure>";*/
            $output=$output."<div class= 'button'  ><a href="."add.php".">Continue</a></div>";
            $output=$output."<div class= 'button' ><a href="."ViewAndSearch.php".">Return</a></div></div>";

        }

        $stmt->close();
        $conn->close();
    }
    else {
        $success = true;
        $output='<div class=\'container\'>';
        $output =$output. "You must complete all of the fields below.</div>";
    }
}


?>

<html lang="en">
<head>

    <title>Add pictures</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>

<?php if($success === false) { ?>
    <form  action="add.php" method="post" >

        <div class="container">

            <div class="content" >

                <p><label for="uid"><b>User ID:</b></label></p>
                <p> <input type="text" placeholder="Enter User ID" name="uid" id="uid" required></p>

                <p><label for="url"><b>URL:</b></label></p>
                <p> <input type="text" placeholder="Enter Image URL" name="url" id="url" required></p>
                <p><label for="des"><b>Description:</b></label>
                <p> <input type="text" placeholder="Enter Image description"  name="des" id="des" required></p>
                <p>
                    <button type="submit" class="submit">Add</button>
                    <button type="button" class="cancelbtn" onclick="javascript:history.go(-1)">Cancel</button>
                </p>

            </div>

        </div>

    </form>
    <footer class = "topnav"><p>©EFREI Paris  Contact us:<a href="mailto:c029577i@student.staffs.ac.uk">c029577i@student.staffs.ac.uk</a></p></footer>
<?php } ?>
<div>
    <?php
    echo $output;?>
</div>


</body>
</html>
