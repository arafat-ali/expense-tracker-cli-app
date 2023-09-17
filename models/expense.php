<?php

require_once 'input.php';
class Expense extends Input{
    private string $name;
    private int $amount;
    protected string $filePath = './database/Expense.csv';

    private array $expenses = [];

    private $expenseTypesOptions = [];

    public function setExpense(){
        echo "\nAdding Expense...";
        echo "\nSelect Your Expense Type";

        $this->showOption($this->expenseTypesOptions);
        $selected0ption = (int) readline('Please enter an option of type: ');
        $this->name = $this->expenseTypesOptions[$selected0ption];
        $this->amount = (int) readline('Please enter amount: ');

        // ** When I worked without file ** //
        // array_push($this->expenses, [
        //     "name" => $this->name,
        //     "amount" => $this->amount
        // ]);

        return [$this->name, $this->amount];
    }

    public function setExpenses(array $expenses){
        $this->expenses = $expenses;
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

    public function getTotalExpenseValue():int{
        return array_sum(array_map(fn ($item) => $item['amount'], $this->expenses));
    }


    public function setExpenseTypesOptions(array $expenseTypesOptions):void {
        $this->expenseTypesOptions = $expenseTypesOptions;
    }

}