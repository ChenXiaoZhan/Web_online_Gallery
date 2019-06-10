<?php
$output='';
$success = false;
if ($_POST)
{
if(!empty($_POST['uname']) && !empty($_POST['psw']) )
{
    include("database.php");
    /*
    $uname=$_POST['uname'];
    $rs = $stmt = $conn->prepare("select * from user where LoginName like $uname");
    $rs->bind_param("s", $uname);
    $rs->execute();
    $rs->store_result();
    if($rs->num_rows > 0)
    {
        echo "already exist";
        echo "<a href=logintest2.php></a>";
    } else {*/
        $stmt = $conn->prepare("INSERT INTO user (LoginName, LoginPassword) VALUES (?, ?)");

        $stmt->bind_param('ss', $_POST['uname'], $_POST['psw']);

        /* execute prepared statement */
        $stmt->execute();
        if ($stmt->affected_rows === 1) {
            $id = $stmt->insert_id;
            $success = true;
            $output = "<div class='container'><p>Your account has been created - your ID is: " . $id . '</p>';
            $output = $output . "<div class= 'button' ><a href=" . "index.php" . ">Return Home</a></div></div>";


        }

    }
    /* close statement and connection */
    $stmt->close();
    $conn->close();
}


?>


<html lang="en">
<head>
    <title>Sign up</title>
    <link rel="stylesheet" href="signUp.css">
</head>
<body>
<?php if($success === false) { ?>
    <form  action="signUp.php" method="post" >

            <div class="container">
                <div class="content">
                    <h1>Sign Up Form</h1>

                    <p><label for="uname"><b>Username</b></label></p>
                    <p><input type="text" placeholder="Enter Username" name="uname" id="uname"required></p>

                    <p><label for="psw"><b>Password</b></label></p>
                    <p><input type="password" placeholder="Enter Password" name="psw" id="psw" required></p>
                    <p><label for="cpsw"><b>Confirm Password</b></label></p>
                    <p><input type="password" placeholder="Enter Password" name="cpsw" id="cpsw" onkeyup="validate()" required><span id="tishi"></span></p>
                    <p>
                        <button type="submit" class="submit">Sign Up</button>
                        <button type="reset" class="cancelbtn" onclick="location.href='index.php'">Cancel</button>
                    </p>
                 </div>
            </div>
    </form>
<?php } ?>
<div>
    <?php echo $output;?>
</div>
<script>
    function validate() {
        var pw1 = document.getElementById("psw").value;
        var pw2 = document.getElementById("cpsw").value;
        if(pw1 == pw2) {
            document.getElementById("tishi").innerHTML="<p><font color='green'>identical</font></p>";
            document.getElementById("submit").disabled = false;
        }
        else {
            document.getElementById("tishi").innerHTML="<p><font color='red'>different</font></p>";
            document.getElementById("submit").disabled = true;
        }
    }
</script>

<footer><p>©EFREI Paris  Contact us:<a href="mailto:c029577i@student.staffs.ac.uk">c029577i@student.staffs.ac.uk</a></p></footer>
</body>
</html>




