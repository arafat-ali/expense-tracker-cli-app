<?php

require_once 'input.php';

class Operation extends Input{
    public $option;
    private $options = [
        "1" => "View Categories",
        "2" => "Add Category",
        "3" => "Add Income",
        "4" => "Add Expense",
        "5" => "View Income List",
        "6" => "View Expense List",
        "0" => "Exit Application"
    ];

    public function showOperationalOptions():void{
        $this->showOption($this->options);
    }




}