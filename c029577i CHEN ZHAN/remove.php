<?php
include("database.php");

/*select key word*/


$output=' ';
$success = false;

if ($_POST)
{
    if(!empty($_POST['field1']))
    {
        include("database.php");

        $id = $_POST['field1'];

        $stmt = $conn->prepare("DELETE FROM image WHERE ImageID = ?");
        $stmt->bind_param('i', $id);

        /* execute prepared statement */
        $stmt->execute();

        if($stmt->affected_rows === 1){
            $success = true;

            $output = "<div class='container'><p>The Image with ID " . $id . " has been deleted.</p>";

            $output=$output."<button class= 'button' ><a href="."remove.php".">Continue</a></button>";
            $output=$output."<button class= 'button' ><a href="."searchNew.php".">Return</a></button></div>";
        } else {
            $success = true;
            $output = "<div class='container'><p>No account with the ID " . $id . " exists.</p>";
            $output=$output."<button class= 'button' ><a href="."remove.php".">Continue</a></button>";
            $output=$output."<button class= 'button' ><a href="."searchNew.php".">Return</a></button></div>";
        }

        /* close statement and connection */
        $stmt->close();
        $conn->close();
    }
}
?>

<html>
<head>

    <title>remove</title>
    <link rel="stylesheet" href="remove.css">
</head>
<body>
<?php if($success === false) { ?>
    <form  action="remove.php" method="post" >

        <div class="container">
            <div class="content" >


                <p><label for="field1"><b>Image ID：</b></label></p>
                <p><input type="text" placeholder="Enter Image ID" name="field1" id="field1" required></p>

                <p>
                    <button type="submit" class="submit">Remove</button>
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
<!-- <script src="/static/bundle.js"></script> -->
</body>
</html>

