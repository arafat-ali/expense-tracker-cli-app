<?php

require_once './helpers/handleFile.php';
require_once 'input.php';

class Category extends Input{
    private string $name;
    private int $type;
    // private $filePath;

    private array $categories = [
        [
            "name" => "Salary",
            "type" => "Income"
        ],
        [
            "name" => "House rent",
            "type" => "Expense"
        ],

    ];

    private $categoryTypesOptions = [
        "1" => "Income Category",
        "2" => "Expense Category"
    ];

    public function setCategory(){
        echo "\nAdding Category...";
        echo "\nSelect Your new Category Type";
        $this->showOption($this->categoryTypesOptions);
        $this->type = (int) readline('Please enter an option of type: ');
        $this->name = (string) readline('Please enter category name: ');
        array_push($this->categories, [
            "name" => $this->name,
            "type" => $this->type==1 ? 'Income':'Expense',
        ]);
        echo "\nCategory added Successfully!\n";
    }

    public function getCategories():void{
        echo "\n\nList of Categories\n";
        foreach($this->categories as $category){
            echo "Name: $category[name] - Type: $category[type]\n";
        }
        echo "\n";
    }


}