<?php

$output='';
$success = false;

if($_POST)
{
    if(isset($_POST['uname'])&&isset($_POST['psw'])&&!empty($_POST['uname'])&&!empty($_POST['psw'])) {
        include("database.php");
        $uname = $_POST['uname'];
        $psw=$_POST['psw'];

        $stmt=$conn->stmt_init();
        if($stmt->prepare("select LoginName, LoginPassword from user WHERE LoginName=? and LoginPassword=?")){

            $stmt->bind_param('ss',$uname,$psw);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows>0){
                $success = true;
                $change="<div class='container'><button class= 'button' ><a href="."add.php".">Add Picture</a></button>";

                $change=$change."<button class= 'button'> <a href="."remove.php".">Remove Picture</a></button>";

                $output=$change.'<p>welcome</p></div>';
                $count=0;

            } else {
                $success = true;
                $change="<div class='container'>";

                $change=$change."<button class= 'button'> <a href="."Login.php".">retry</a></button>";
                $output =$change.'<p>'. "wrong login name or password"." </p></div>";
            }
            $stmt->close();
        }
        $conn->close();
    } else {
        $output = "<p>Type in your login Name and login password,please!</p>";
    }
    /*
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control " content="no-cache,must-revalidate">
    <meta name="description" content="">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">*/


}

?>


<html lang="En">
<head>

    <title>Log in page</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body >
<?php if($success === false) { ?>
<form  action="Login.php" method="post" >

<div class="container">
    <div class="content" >
        <h1>Login Form</h1>

        <p><label for="uname"><b>Username</b></label></p>
        <p><input type="text" placeholder="Enter Username" name="uname" id="uname" required></p>

        <p><label for="psw"><b>Password</b></label></p>
        <p><input type="password" placeholder="Enter Password" name="psw" id="psw" required></p>

        <p>
            <button type="submit" class="submit">Login</button>
            <button type="button" class="cancelbtn" onclick="javascript:history.go(-1)">Cancel</button>
        </p>
    </div>

</div>

</form>
<?php } ?>
<div>
    <?php
    echo $output;?>
</div>

<footer><p>©EFREI Paris  Contact us: <a href="mailto:c029577i@student.staffs.ac.uk">c029577i@student.staffs.ac.uk</a></p></footer>

</body>
</html>

