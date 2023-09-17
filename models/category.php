<?php
require_once 'input.php';

class Category extends Input{
    private string $name;
    private int $type;
    protected string $filePath = './database/Categories.csv';

    // private array $categories = [
    //     [
    //         "name" => "Salary",
    //         "type" => "Income"
    //     ],
    //     [
    //         "name" => "Bonus",
    //         "type" => "Income"
    //     ],
    //     [
    //         "name" => "House rent",
    //         "type" => "Expense"
    //     ],
    // ];

    private array $categories = [];

    private $categoryTypesOptions = [
        "1" => "Income Category",
        "2" => "Expense Category"
    ];

    public function setCategory():array{
        echo "\nAdding Category...";
        echo "\nSelect Your new Category Type";
        $this->showOption($this->categoryTypesOptions);
        $this->type = (int) readline('Please enter an option of type: ');
        $this->name = (string) readline('Please enter category name: ');

        // ** When I worked without file ** //
        // array_push($this->categories, [
        //     "name" => $this->name,
        //     "type" => $this->type==1 ? 'Income':'Expense',
        // ]);

        return [$this->name, $this->type===1 ? 'Income' : 'Expense'];
    }


    public function setCategories(array $categories){
        $this->categories = $categories;
    }

    public function getCategories():array{
        return $this->categories;
    }

    public function showCategories():void{
        echo "\n\nList of Categories --\n\n";
        foreach($this->categories as $category){
            echo "Name: $category[name] \t Type: $category[type]\n";
        }
        echo "\n";
    }


}