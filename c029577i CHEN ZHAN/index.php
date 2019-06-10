<?php

$picture0="images/backgroudimages/Train Rail during Golden Hour.jpg";
$picture1="images/backgroudimages/Scenic View of Dramatic Sky during Winter.jpg";
$picture2="images/backgroudimages/Golden Gate Bridge California.jpg";
$picture3="images/backgroudimages/Scenic View of Dramatic Sky during Winter.jpg";
$picture4="images/backgroudimages/Bird eye View Photography of Mountains.jpg";

$bgimagset = array($picture0,$picture1,$picture2, $picture3,$picture4);
$bgimage = "<p>images/backgroudimages/Bird eye View Photography of Mountains.jpg</p>";

$i = rand(0, count($bgimagset)-1); // generate random number size of the array
$selectedBg = "$bgimagset[$i]";

?>
<script>
    function randombg(){

        var bigSize = [
            "url('images/backgroudimages/Scenic_View_Of_Mountain_During_Evening.jpg')",
            "url('images/backgroudimages/Scenic_View_of_Dramatic_Sky_during_Winter.jpg')",
            "url('images/backgroudimages/Bird_Eye_View_Of_City_During_Dawn.jpg')",
            "url('images/backgroudimages/Bird_eye_View_Photography_of_Mountains.jpg')",
            "url('images/backgroudimages/Golden_Gate_Bridge_California.jpg')",
            "url('images/backgroudimages/Train_Rail_during_Golden_Hour.jpg')",
            "url('images/backgroudimages/White_Tree_Blossoms_Under_Golden_Sun.jpg')"];
        var random= Math.floor(Math.random() * bigSize.length);
        document.getElementById("image").style.backgroundImage=bigSize[random];
    }

    setInterval(randombg,6000);
</script>

<!DOCTYPE html>
<html lang="en" class="gr__localhost"><head><script>
        function randombg(){

            var bigSize = [
                "url('images/backgroudimages/Scenic_View_Of_Mountain_During_Evening.jpg')",
                "url('images/backgroudimages/Scenic_View_of_Dramatic_Sky_during_Winter.jpg')",
                "url('images/backgroudimages/Bird_Eye_View_Of_City_During_Dawn.jpg')",
                "url('images/backgroudimages/Bird_eye_View_Photography_of_Mountains.jpg')",
                "url('images/backgroudimages/Golden_Gate_Bridge_California.jpg')",
                "url('images/backgroudimages/Train_Rail_during_Golden_Hour.jpg')",
                "url('images/backgroudimages/White_Tree_Blossoms_Under_Golden_Sun.jpg')"];
            var random= Math.floor(Math.random() * bigSize.length);
            document.getElementById("image").style.backgroundImage=bigSize[random];
        }

        setInterval(randombg,6000);
    </script>

    <title>Online Gallery</title>
    <link rel="stylesheet" href="index.css">

<body  >


<div id="image" style="background-image: url(&quot;images/backgroudimages/Golden_Gate_Bridge_California.jpg&quot;);">


    <div class="text">
        <h1 class="title" style="font-size:34px">Staffordshire online gallery</h1>
        <button class="explore" onclick="location.href='ViewAndSearch.php'">Explore or search for pictures</button>
    </div>

    <div>

        <button class="button" onclick="location.href='signUp.php'">Sign up</button>

        <button class="button" onclick="location.href='Login.php'">Log in</button>
    </div>

</div>
<footer><p>©EFREI Paris  Contact us: <a href="mailto:c029577i@student.staffs.ac.uk">c029577i@student.staffs.ac.uk</a></p></footer>

</body></html>