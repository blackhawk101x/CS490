<?php
session_start();
foreach(array_keys($_SESSION) as $k) unset($_SESSION[$k]);
session_destroy();
echo json_encode(array('done'=>true));
?>