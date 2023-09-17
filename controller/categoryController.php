<?php

require_once './models/category.php';

class CategoryController extends Category{
    
    public function viewCategories():void{
        $categories = $this->getCategoriesFromFile();
        $this->setCategories($categories);
        $this->showCategories();
    }

    public function addCategory():void{
        $newCategory = $this->setCategory();
        $this->insertCategoryIntoFile($newCategory);
    }

    public function getIncomeCategory():array{
        return array_filter($this->getCategories(), fn($el) => $el['type'] == "Income");
    }

    public function getExpenseCategory():array{
        return array_filter($this->getCategories(), fn($el) => $el['type'] == "Expense");
    }


    private function getCategoriesFromFile(){
        $headingIndex = true;
        $fileData = [];
        if (($open = fopen($this->filePath, 'r')) !== FALSE) {
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                if($headingIndex==true){
                    $headingIndex = false;
                    continue;
                }
                array_push($fileData, ["name" => $data[0], "type"=>$data[1]]);
            }
            fclose($open);
        }
        return $fileData;
    }


    private function insertCategoryIntoFile($newCategory){
        if (($open = fopen($this->filePath, 'a')) !== FALSE) {
            fputcsv($open, $newCategory);
            fclose($open);
        }
        
    }


}