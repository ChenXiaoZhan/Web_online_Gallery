<?php
/* Include link to database */
include("database.php");

/* set up and execute query */
$query = "SELECT ImageID,URL,Description FROM image order by ImageID";
$result = $conn->query($query);
$output = "";


if(!$result = $conn->query($query)){
    die('There was an error running the query [' . $conn->error . ']');
}

if($result->num_rows == 0) {
    /* if there are no results */

    $output = "<p>No result set</p>";
} else {
    /* if there are results, loop through them and add them to a list*/

    while ($row = $result->fetch_assoc()) {
        $output = $output . '<div class="container-item">';
        $output = $output . "<img src ='";
        $output = $output . $row['URL']."' alt='A picture of ".$row['ImageID'];
        $output = $output . "' class='picture'><div class='overlay'>"."<div class='text'><p>Image ID:".$row['ImageID']."  </p><p> ".$row['Description']."</p></div>";
        $output = $output ."</div>></div>";
    }
    /*$output = $output . '<div class="container-item"><p>image ID: '.$row['ImageID'].'</p>';
    $output = $output . "<figure ><img src ='";
    $output = $output . $row['URL']."' alt='A picture of ".$row['ImageID'];
    $output = $output . "' class='picture'><figcaption><div>".$row['Description']."</div></figcaption></figure></div>";*/




    /* free result set */
    $result->close();
}
/* close connection */
$conn->close();
/*select key word*/


$success = false;
if ($_POST)
{
	if(isset($_POST['Key_word']) && !empty($_POST['Key_word']))
	{
        include("database.php");
        $key = $_POST['Key_word'];

        $stmt = $conn->stmt_init();
        if ($stmt->prepare("SELECT ImageID,URL,Description FROM image WHERE Description like ?")) {
            $des = '%' . $key . '%';
            $stmt->bind_param("s", $des);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0) {
       $stmt->bind_result($id, $url,$des);
            $output = "";
          while ($stmt->fetch()) {
              $output = $output . '<div class="container-item">';
              $output = $output . "<img src ='";
              $output = $output. $url."' alt='A picture of ".$id;
              $output = $output . "' class='picture'><div class='overlay'>"."<div class='text'><p>Image ID:".$id."  </p><p> ".$des."</p></div>";
              $output = $output ."</div></div>";
       }
            } else {
                $output = "<p>No picture found</p>";
            }
       $stmt->close();
}
$conn->close();
} else {
		$output = "<p>Type in the picture you want</p>";
}
}
?>






<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Explore or search for pictures</title>
    <link rel="stylesheet" href="ViewAndSearch.css">
</head>

<body>
<header>
</header>
<?php if($success === false) { ?>
<div class = "topnav">

        <button class= "button" onclick="location.href = 'Login.php';">Log in</button>

        <button class= "button" onclick="window.location.href = 'index.php';">Home</button>

    <form id="myForm" action="ViewAndSearch.php" method="POST">
        <div class="search-bar">
            <input type="text" class="search-txt" placeholder="Coffee, night, sea, dog..." name="Key_word" id="Key_word">
            <input type="submit" class = "search-btn" value = "S">
        </div>
    </form>
    <?php } ?>
</div>
<div class="container-picture">
    <?php echo $output ?>

</div>

<footer class = "topnav"><p>©EFREI Paris</p><nav><p>Contact us:<a href="mailto:c029577i@student.staffs.ac.uk">c029577i@student.staffs.ac.uk</a></p></nav></footer>



</body>
</html>