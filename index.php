<?php
require_once './helpers/handleFile.php';
require_once './models/operation.php';
require_once './models/expense.php';
require_once './models/income.php';
require_once './models/category.php';

echo "\nWellcome to Income-Expense Tracker System!\n";
$operation = new Operation();
$operation->showOperationalOptions();

$category = new Category();

function viewCategories():void{
    global $category;
    $category->getCategories();
}

function addCategory(){
    global $category;
    $category->setCategory();
}



$exit = false;
while(!$exit){
    $operation->setInput();

    switch ($operation->getInput()) {
        case 1:
            viewCategories();
            $operation->showOperationalOptions();
            break;

        case 2:
            addCategory();
            $operation->showOperationalOptions();
            break;

        case 3:
            echo "Add Income";
          break;

        case 4:
            echo "Add Expense";
            break;

        case 5:
            echo "View Income";
            break;

        case 6:
            echo "View Expense";
            break;
        
        case 0:
            $exit = true;
            break;

        default:
            echo "Invalid Option";
    }
}

echo "\nApplication Exited!\n\n";