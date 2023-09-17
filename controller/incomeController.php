<?php

require_once './models/income.php';

class IncomeController extends Income{

    public function viewIncomeList():void{
        $this->showIncomeList();
    }

    public function addIncome():void{
        $this->setIncome();
    }

    public function setIncomeOptions(array $incomeCategories):void{
        $incomeCategoryOptions = [];
        $optionIndex = "1";
        foreach($incomeCategories as $category){
            $incomeCategoryOptions[$optionIndex++] = $category['name'];
        }
        $this->setIncomeTypesOptions($incomeCategoryOptions);
    }

}