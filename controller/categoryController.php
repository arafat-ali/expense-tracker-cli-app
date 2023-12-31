<?php

require_once './models/category.php';
require_once './trait/filehandlerTrait.php';
class CategoryController extends Category{
    use FilehandlerTrait;

    public function viewCategories():void{
        $categories = $this->getCategoriesFromFile();
        $this->setCategories($categories);
        $this->showCategories();
    }

    public function addCategory():void{
        $newCategory = $this->setCategory();
        if($this->insertCategoryIntoFile($newCategory))
            echo "\nCategory added Successfully!\n";
        else
            echo "\nSomething happened bad :(!\n";
    }

    public function getIncomeCategory():array{
        $categories = $this->getCategoriesFromFile();
        $this->setCategories($categories);
        return array_filter($this->getCategories(), fn($el) => $el['type'] == "Income");
    }

    public function getExpenseCategory():array{
        $categories = $this->getCategoriesFromFile();
        $this->setCategories($categories);
        return array_filter($this->getCategories(), fn($el) => $el['type'] == "Expense");
    }


    private function getCategoriesFromFile(){
        return $this->getItemsFromFile($this->filePath);
    }

    private function insertCategoryIntoFile($newCategory) : bool{
        return $this->insertNewItemIntoFile($this->filePath, $newCategory);
    }
    
    // ** Trait has used , So I have Commented out the Code

    // private function getCategoriesFromFile(){
    //     $headingIndex = true;
    //     $fileData = [];
    //     if (($open = fopen($this->filePath, 'r')) !== FALSE) {
    //         while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
    //             if($headingIndex==true){
    //                 $headingIndex = false;
    //                 continue;
    //             }
    //             array_push($fileData, ["name" => $data[0], "type"=>$data[1]]);
    //         }
    //         fclose($open);
    //     }
    //     return $fileData;
    // }


    // private function insertCategoryIntoFile($newCategory) : bool{
    //     if (($open = fopen($this->filePath, 'a')) !== FALSE) {
    //         fputcsv($open, $newCategory);
    //         fclose($open);
    //         return true;
    //     }
    //     return false;
    // }


}