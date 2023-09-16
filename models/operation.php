<?php

require_once './input.php';

class Operation extends Input{
    public $option;
    private $options = [
        "1" => "Add Category",
        "2" => "View Categories",
        "3" => "Add Income",
        "4" => "Add Expense",
        "5" => "View Income List",
        "6" => "View Expense List",
        "0" => "Exit Application"
    ];


    private function showOptions(){
        echo "\n";
        foreach($this->options as $id => $option){
            echo "\t Press $id to - $option \n";
        }
    }

    public function start(){
        echo "\n\t Wellcome to Income-Expense Tracker System!";
        $this->showOptions();
    }




}