<?php

class Input {
    private $option;

    public function setInput(){
        $this->$option = (int) readline('Please enter an option: ');
    }

    public function getInput(){
        return $this->$option;
    }
}