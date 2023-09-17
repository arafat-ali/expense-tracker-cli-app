<?php

class Input {
    private int $option;

    public function setInput():void{
        $this->option = (int) readline('Please enter an option: ');
    }

    public function getInput():int{
        return $this->option;
    }

    public function showOption(array $options){
        echo "\n";
        foreach($options as $id => $option){
            echo "Press $id to - $option \n";
        }
        echo "\n";
    }
}