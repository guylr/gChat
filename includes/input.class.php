<?php

if(!defined('gChat')) die("Can't run this file seperately.");

class Input{
    global $CONFIG;
    
    function __construct($in, $max_len, $bbcode=false){
        $this->val = $in;
        $this->max_len = $max_len;
        $this->bbcode = $bbcode; //true or false
    }
    
    function is_valid(){
        if($this->val == '') return false;
        if(strlen($this->val) > $this->max_len) return false;
        return true;
    }
    
    function encode(){
        //bbcode here
        $name = htmlspecialchars($this->val, ENT_QUOTES, 'UTF-8');
        return $name;
    }
    

}

?>