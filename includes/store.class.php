<?php

class Store{

    function __construct($dir){
        $this->dir = $dir;
    }

    function write($str){
        $fp = fopen($this->dir, 'ab+');
        
        if (flock($fp, LOCK_EX)) { // do an exclusive lock
            ftruncate($fp, 0);
            fwrite($fp, serialize($str));
            flock($fp, LOCK_UN); // release the lock
        }
        
        fclose($fp);
    }

    function read(){
        return unserialize(file_get_contents($this->dir));
    }

}




?>