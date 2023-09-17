<?php

require_once './models/operation.php';

class OperationController extends Operation{

    public function showOperations():void{
        $this->showOptions();
    }

}