<?php

require_once './models/expense.php';
class ExpenseController extends Expense{

    public function viewExpenseList():void{
        $expenseList = $this->getExpenseListFromFile();
        $this->setExpenses($expenseList);
        $this->showExpenseList();
    }

    public function addExpense():void{
        $newExpense = $this->setExpense();
        if($this->insertExpenseListIntoFile($newExpense))
            echo "\nExpense added Successfully!\n";
        else
            echo "\nSomething happened bad :(!\n";
    }

    public function setExpenseOptions(array $incomeCategories):void{
        $incomeCategoryOptions = [];
        $optionIndex = "1";
        foreach($incomeCategories as $category){
            $incomeCategoryOptions[$optionIndex++] = $category['name'];
        }
        $this->setExpenseTypesOptions($incomeCategoryOptions);
    }

    public function getTotalExpense():int{
        $expenseList = $this->getExpenseListFromFile();
        $this->setExpenses($expenseList);
        return $this->getTotalExpenseValue();
    }


    private function getExpenseListFromFile(){
        $headingIndex = true;
        $fileData = [];
        if (($open = fopen($this->filePath, 'r')) !== FALSE) {
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                if($headingIndex==true){
                    $headingIndex = false;
                    continue;
                }
                array_push($fileData, ["name" => $data[0], "amount"=>$data[1]]);
            }
            fclose($open);
        }
        return $fileData;
    }


    private function insertExpenseListIntoFile($newCategory):bool{
        if (($open = fopen($this->filePath, 'a')) !== FALSE) {
            fputcsv($open, $newCategory);
            fclose($open);
            return true;
        }
        return false;
        
    }

}