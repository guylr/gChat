<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('default_charset', 'UTF-8');


require_once('includes/preferences.php');
require_once('includes/input.class.php');
require_once('includes/store.class.php');
require_once('includes/messagelog.class.php');

$SENT = array_merge($_GET, $_POST);

$rtrn['messages'] = '';
$rtrn['error'] = false;

if(isset($SENT['q'])){
    $mlog = new MessageLog();
    
    switch($SENT['q']){
        case 'display':
            $rtrn['messages'] = $mlog->print_messages();
            break;
        case 'post':
            if(isset($SENT['n']) && isset($SENT['m'])){            
                $name = new Input($SENT['n'], $CONFIG['max_name_len']);
                $message = new Input($SENT['m'], $CONFIG['max_message_len'], true);
                
                if($name->is_valid() && $message->is_valid()){
                    //name and message are validated so we add the message to the log
                    $mlog->new_message($name->encode(), $message->encode());
                }else{
                    //name or message are invalid so we return an error message
                    $rtrn['error'] = true;
                    $rtrn['error_message'] = 'Name and/or message are not valid.';
                }
                
                $rtrn['messages'] = $mlog->print_messages();
            }else{
                //not a valid request so we return an error message
                $rtrn['error'] = true;
                $rtrn['error_message'] = 'Invalid request.';
            }
            break;
        default:
            $rtrn['error'] = true;
            $rtrn['error_message'] = 'Invalid request.';
            break;   
    }

}else{
    //not a valid request so we return an error message
    $rtrn['error'] = true;
    $rtrn['error_message'] = 'Invalid request.';
}

echo json_encode($rtrn);



?>