<?php

require_once 'input.php';

class Operation extends Input{
    public $option;
    private $options = [
        "1" => "View Categories",
        "2" => "Add Category",
        "3" => "View Income List",
        "4" => "Add Income",
        "5" => "View Expense List",
        "6" => "Add Expense",
        "7" => "Current Balance",
        "0" => "Exit Application"
    ];

    public function showOperationalOptions():void{
        $this->showOption($this->options);
    }

}