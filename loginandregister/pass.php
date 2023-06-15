<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['input'];
    $file = __DIR__ . '/data.txt';
    file_put_contents($file, $input, FILE_APPEND | LOCK_EX);
    echo '保存成功！';
}
?>
