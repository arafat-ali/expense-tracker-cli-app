<?php
require './helpers/handleFile.php';
require './models/operation.php';

$operation = new Operation();
$operation->start();

while(true){
    $operation->getInputOfOption();
    
}