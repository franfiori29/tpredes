<?php
sleep(3);
if (isset($_POST["string"])) {
    $raw = $_POST["string"];
    $md5 = md5($raw);
    $sha1 = sha1($raw);
    $outputArray = array("raw" => $raw, "md5" => $md5, "sha1" => $sha1);
    echo json_encode($outputArray);
} else {
    echo "not found";
}
