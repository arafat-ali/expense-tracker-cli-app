<?php

require_once './models/category.php';
require_once './helpers/fileHandleTrait.php';

class CategoryController extends Category{
    use Filehandle;
    
    public function viewCategories():void{
        $this->getCategoriesFromFile();
        $this->showCategories();
    }

    public function addCategory():void{
        $this->setCategory();
    }

    public function getIncomeCategory():array{
        return array_filter($this->getCategories(), fn($el) => $el['type'] == "Income");
    }

    public function getExpenseCategory():array{
        return array_filter($this->getCategories(), fn($el) => $el['type'] == "Expense");
    }


    private function getCategoriesFromFile(){
        $categoryCsv = $this->openFile('./database/Categories.csv', 'r');

        while (($data = fgetcsv($categoryCsv, 1000, ",")) !== FALSE) {
            
        }
    }


}