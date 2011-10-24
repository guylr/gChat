<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require_once('includes/preferences.php');
require_once('includes/store.class.php');
require_once('includes/messagelog.class.php');

//$test = new Store(CHAT_ROOT . '/log/log1.txt');
//echo $test->read();

//$test2 = new Input('', 20);
//if(!$test2->is_valid()) echo 'false';

//echo htmlspecialchars("<a href='test'>Test</a>\"", ENT_QUOTES, 'UTF-8');

$test = new MessageLog();
//for($i=0;$i<10;$i++){
    $test->new_message('a', 'a');
//}
echo $test->print_messages();
?>