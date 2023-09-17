<?php

require_once 'input.php';
class Expense extends Input{
    private string $name;
    private int $amount;
    // private $filePath;

    private array $expenses = [];

    private $expenseTypesOptions = [];

    public function setExpense(){
        echo "\nAdding Expense...";
        echo "\nSelect Your Expense Type";

        $this->showOption($this->expenseTypesOptions);
        $selected0ption = (int) readline('Please enter an option of type: ');
        $this->name = $this->expenseTypesOptions[$selected0ption];
        $this->amount = (int) readline('Please enter amount: ');

        array_push($this->expenses, [
            "name" => $this->name,
            "amount" => $this->amount
        ]);

        echo "\nExpense added Successfully!\n";
    }


    public function getExpenses():array{
        return $this->expenses;
    }

    public function showExpenseList():void{
        echo "\n\nList of Expense --\n";
        $total = 0;
        foreach($this->expenses as $expense){
            $total+= (int) $expense['amount'];
            echo "Name: $expense[name] - Amount: $expense[amount]\n";
        }
        echo "Total expense - $total\n";
        echo "\n";
    }


    public function setExpenseTypesOptions(array $expenseTypesOptions):void {
        $this->expenseTypesOptions = $expenseTypesOptions;
    }

}