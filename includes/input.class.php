<?php

if(!defined('gChat')) die("Can't run this file seperately.");

class Input{
    //global $CONFIG;
    
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
        $name = htmlspecialchars($this->val, ENT_QUOTES, 'UTF-8');
        if($this->bbcode) $name = $this->bbcode($name);
        return $name;
    }
    
    function bbcode($in){
        $bbcode = Array('[i]', '[/i]', '[b]', '[/b]', '[u]', '[/u]',);
        $html = Array('<i>', '</i>', '<strong>', '</strong>', '<u>', '</u>',);
        return str_replace($bbcode, $html, $in);
    }
    
    function tostr(){
        return $this->val;
    }

}

?>