<?php
$psswd = substr( md5(microtime()), 1, 8);
echo $psswd;
?>