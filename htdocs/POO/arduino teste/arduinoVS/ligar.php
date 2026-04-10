<?php
require "arduino.php";

$arduino  = new arduino('com3');
$arduino->ligar();

echo 'LED LIGADO';
?>