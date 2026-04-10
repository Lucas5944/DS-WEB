<?php
require "arduino.php";

$arduino  = new arduino('com3');
$arduino->desligar();

echo 'LED DESLIGADO';
?>