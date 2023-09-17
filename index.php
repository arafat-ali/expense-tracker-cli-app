<?php

require_once './controller/operationController.php';
require_once './controller/categoryController.php';
require_once './controller/incomeController.php';
require_once './controller/expenseController.php';

echo "\nWellcome to Income-Expense Tracker System!\n";
$operationController = new OperationController();
$operationController->showOperations();

$categoryController = new CategoryController();
$incomeController = new IncomeController();
$expenseController = new ExpenseController();

$exit = false;
while(!$exit){
    $operationController->setInput();

    switch ($operationController->getInput()) {
        case 1:
            $categoryController->viewCategories();
            $operationController->showOperations();
            break;

        case 2:
            $categoryController->addCategory();
            $operationController->showOperations();
            break;

        case 3:
            $incomeController->viewIncomeList();
            $operationController->showOperations();
            break;

        case 4:
            $incomeController->setIncomeOptions($categoryController->getIncomeCategory());
            $incomeController->addIncome();
            $operationController->showOperations();
            break;

        case 5:
            $expenseController->viewExpenseList();
            $operationController->showOperations();
            break;

        case 6:
            $expenseController->setExpenseOptions($categoryController->getExpenseCategory());
            $expenseController->addExpense();
            $operationController->showOperations();
            break;
        
        case 0:
            $exit = true;
            break;

        default:
            echo "Invalid Option";
    }
}

echo "\nApplication Exited!\n\n";