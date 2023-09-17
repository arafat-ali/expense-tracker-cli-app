<?php

require_once './controller/operationController.php';
require_once './controller/categoryController.php';
require_once './controller/incomeController.php';
require_once './controller/expenseController.php';


$operationController = new OperationController();
$categoryController = new CategoryController();
$incomeController = new IncomeController();
$expenseController = new ExpenseController();

$exit = false;
echo "\nWellcome to Income-Expense Tracker System!\n";
$operationController->showOperations();
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

        case 7:
            $savings = (int)$incomeController->getTotalIncome() - (int) $expenseController->getTotalExpense();
            echo "\nYour Savings/Current Balance : $savings\n";
            $operationController->showOperations();
            break;
        
        case 0:
            $exit = true;
            break;

        default:
            echo "\nInvalid Option :(\n";
            $operationController->showOperations();
    }
}

echo "\n**Happy Coding**\n\n";