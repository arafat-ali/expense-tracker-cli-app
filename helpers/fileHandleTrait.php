<?php

trait Filehandle {
    public function openFile(string $path, string $fileOpenMode){
        $openedFile = fopen($path, $fileOpenMode);
        return $openedFile;
    }
}
