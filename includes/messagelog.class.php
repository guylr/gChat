<?php

if(!defined('gChat')) die("Can't run this file seperately.");

class MessageLog extends Store{
    
    function __construct(){
        parent::__construct(CHAT_ROOT . LOG_DIR . '/log1');
    }
    
    //input should be checked before passing it here
    function new_message($name, $message){
        global $CONFIG;
        
        //get messages
        $messages = $this->read();
        if(count($messages) >= $CONFIG['max_messages_per_log']){
            //remove one message or move to new log
        }
        
        $new_mes['timestamp'] = $this->timestamp();
        $new_mes['mid'] = md5($new_mes['timestamp'] . $name);
        $new_mes['name'] = $name;
        $new_mes['message'] = $message;
        
        $messages[] = $new_mes;
        //array_push($messages, $new_mes);
        $this->write($messages);
    }
    
    function print_messages(){
        $messages = $this->read();
        $output = "";
        
        foreach($messages as $message){
            $output .= '<div class="post"><span class="name">' . $message['name'] . '</span><span class="message">' . $message['message'] . '</span></div>'."\r\n";
        }
        
        return $output;
    }
    
    function timestamp()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }


}


?>