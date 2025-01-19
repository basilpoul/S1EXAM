<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="main">
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $num=$_POST["num"];
        $fact=1;
        for($i=1;$i<=$num;$i++){
            $fact=$fact*$i;
        }
       
    }
    ?>
    <form method="POST">
    <input type="text" name="num" class="num" placeholder="Enter a number"/>
    <input type="submit" class="submit"/>
    <div class="res">
        <?php
        if(isset($num)){
            echo "Factorial of ".$num."=".$fact;
        }
        ?>
    </div>
    </form>
</body>
</html>