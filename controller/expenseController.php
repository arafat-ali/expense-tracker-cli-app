<?php

require_once './models/expense.php';

class ExpenseController extends Expense{

    public function viewExpenseList():void{
        $this->showExpenseList();
    }

    public function addExpense():void{
        $this->setExpense();
    }

    public function setExpenseOptions(array $incomeCategories):void{
        $incomeCategoryOptions = [];
        $optionIndex = "1";
        foreach($incomeCategories as $category){
            $incomeCategoryOptions[$optionIndex++] = $category['name'];
        }
        $this->setExpenseTypesOptions($incomeCategoryOptions);
    }

}