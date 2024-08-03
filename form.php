<?php
include'database1.php';
$obj= new Database(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="save-data.php" method="post">
        <label>Name</label><br>
        <input type="text" name="sname" id="sname"><br><br>
        <label>roll_no</label><br>

        <input type="text" name="sroll" id="sroll"><br><br>
        <label>address</label><br>
        <input type="text" name="sadd" id="sadd"><br><br>

        <select name="scity" id="scity">
        <?php
        $obj->select('citydb');
        $result =$obj->getresult();
        foreach($result as list('cid'=>$cid,'city'=>$city)){
            echo "<option value='$cid'>$city</option>";
        }
        ?>
        </select>
        <input type="submit" value="save" name="save" id="save">
    </form>
</body>
</html>