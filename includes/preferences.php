<?php
define('gChat', 1);
define('CHAT_ROOT', str_replace('\\', '/', dirname(dirname(__FILE__))));
define('LOG_DIR', '/log/');
define('CHAT_PREFIX', 'gChat_');

//the refresh rate in seconds
$CONFIG['refresh_rate'] = 5;

//Spam control
$CONFIG['spam_control'] = true;
$CONFIG['spam_timeout'] = 10;
$CONFIG['max_message_repeats'] = 3;
$CONFIG['max_messages_per_log'] = 100;
$CONFIG['max_message_len'] = 5000;

$CONFIG['max_name_len'] = 20;

$CONFIG['censored_words'] = 'meme,';

$CONFIG['default_name'] = 'Anon';

?>