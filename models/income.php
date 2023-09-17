<?php

require_once 'input.php';
class Income extends Input{
    private string $name;
    private int $amount;
    // private $filePath;

    private array $incomes = [];

    private $incomeTypesOptions = [];

    public function setIncome(){
        echo "\nAdding Income...";
        echo "\nSelect Your Income Type";

        $this->showOption($this->incomeTypesOptions);
        $selected0ption = (int) readline('Please enter an option of type: ');
        $this->name = $this->incomeTypesOptions[$selected0ption];
        $this->amount = (string) readline('Please enter amount: ');
        
        array_push($this->incomes, [
            "name" => $this->name,
            "amount" => $this->amount
        ]);

        echo "\nIncome added Successfully!\n";
    }


    public function getIncomes():array{
        return $this->incomes;
    }

    public function showIncomeList():void{
        echo "\n\nList of Income --\n";
        $total = 0;
        foreach($this->incomes as $income){
            $total+= (int) $income['amount'];
            echo "Name: $income[name] - Amount: $income[amount]\n";
        }
        echo "Total income - $total\n";
        echo "\n";
    }


    public function setIncomeTypesOptions(array $incomeTypesOptions):void {
        $this->incomeTypesOptions = $incomeTypesOptions;
    }

}