<?php

trait FilehandlerTrait {
    public function getItemsFromFile($filePath){
        $headingIndex = true;
        $fileData = [];
        if (($open = fopen($filePath, 'r')) !== FALSE) {
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


    public function insertNewItemIntoFile($filePath, $newItem) : bool{
        if (($open = fopen($filePath, 'a')) !== FALSE) {
            fputcsv($open, $newItem);
            fclose($open);
            return true;
        }
        return false;
        
    }

}