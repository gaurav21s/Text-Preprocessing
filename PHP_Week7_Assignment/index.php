<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rajpurohit Yogesh Singh MD5 Cracker</title>
</head>
<body>
    <h1>MD5 Cracker</h1>
    This Application takes an MD5 hash of four digit pin and check all 10,000 possible four digit PINs to determine the PIN.
    <br><br>

    Debug Output:
    <br>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="GET") {
            $start_time=microtime(true);
            $ans = -1;
            for($i=0;$i<=10000;$i++) {
                $temp = md5($i);
                if($temp===$_GET["md5"]) {
                    $GLOBALS["ans"]=$i;
                    break;
                }
                if($i<15) {
                    echo $temp." ";
                    echo str_pad($i,4,"0",STR_PAD_LEFT);
                    echo "<br>";
                }
            }
            echo "Total Checks: $i <br>";
            $end_time=microtime(true);
            echo "Elapsed Time: ".($end_time-$start_time);
        }
    ?>
    <br><br>

    PIN:
    <?php 
        if($_SERVER["REQUEST_METHOD"]=="GET") {
            if($GLOBALS["ans"]==-1) echo "Not found";
            else echo $GLOBALS["ans"];
        }
    ?>
    <br><br>

    <form action="index.php" method="GET">
        <input type="text" name="md5" size="40">
        <button type="submit">Crack MD5</button>    
    </form>
    <br>

    <a href="index.php">RESET</a>
</body>
</html>