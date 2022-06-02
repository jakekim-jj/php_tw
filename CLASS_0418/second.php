<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Some useful string functions</h1>
    <p>strlen() will return the len of a string</p>
    <?php
        $fname = "Milad";
        echo strlen($fname);
    ?>
    <p>str_word_count() </p>
    <?php
        $a = "Tamwood Web development Web program";
        echo str_word_count($a),$fname;
    ?>
    <p>strpos() will return the index number/ find the world within a string</p>
    <?php
        echo strpos($a,"Web",10);
    ?>
    <p>str_replace() will replace some characters with some other characters in a string</p>
    <?php
        echo str_replace("Web","English",$a);
    ?>
    <p>Exercise</p>
    <?php
        $key = "Roy";
        $replace = "Earth";
        $sentence = "I am coming from planet Earth. Earth is a good place to live";
        //In the $setnence how you can change/replace the value inside $key 
        //only and only once with the value inside $replace
        $length = strlen($replace);
        $start = strpos($sentence,$replace);
        echo substr_replace($sentence,$key,$start,$length);
    ?>
</body>
</html>