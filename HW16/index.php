<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head>
<html>
    <?php
        $str = time();
        $array = explode("/", $str);
        echo "{$array[0]}年{$array[1]}月{$array[2]}日";
    ?>
</html>