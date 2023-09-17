<?php

require_once './models/income.php';

class IncomeController extends Income{

    public function viewIncomeList():void{
        $incomeList = $this->getIncomeListFromFile();
        $this->setIncomes($incomeList);
        $this->showIncomeList();
    }

    public function addIncome():void{
        $newIncome = $this->setIncome();
        if($this->insertIncomeListIntoFile($newIncome))
            echo "\nIncome added Successfully!\n";
        else
            echo "\nSomething happened bad :(!\n";
    }

    public function setIncomeOptions(array $incomeCategories):void{
        $incomeCategoryOptions = [];
        $optionIndex = "1";
        foreach($incomeCategories as $category){
            $incomeCategoryOptions[$optionIndex++] = $category['name'];
        }
        $this->setIncomeTypesOptions($incomeCategoryOptions);
    }

    private function getIncomeListFromFile(){
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


    private function insertIncomeListIntoFile($newCategory):bool{
        if (($open = fopen($this->filePath, 'a')) !== FALSE) {
            fputcsv($open, $newCategory);
            fclose($open);
            return true;
        }
        return false;
        
    }

}