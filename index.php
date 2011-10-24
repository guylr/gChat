<?php require_once('includes/preferences.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <title>gchat</title>
    
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.4.0/build/cssreset/reset-min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="js/jquery-1.6.3.min.js"></script>
    <script type="text/javascript" src="js/chat.js"></script>
    <script>
        <!-- setInterval (load_messages, <?php echo $CONFIG['refresh_rate']; ?>); -->
    </script>
</head>
<body>
    <div id="container">
        <div id="chatbox">
            <div id="header"></div>
            <div id="messages"></div>
            <div id="error"><span class="error_text"></span><span href="#" class="close"></span></div>
            <div id="form_container" method="" action="">
                <form id="chat_form" class="gform ginput">
                    <input type="hidden" value="post" name="q" />
                    <input type="text" class="gname normal" name="n" id="n" value="Name" maxlength="20" size="10" />
                    <input type="text" class="gmessage normal" name="m" id="m" value="Message" maxlength="5000" size="40" />
                    <input type="submit" class="gsubmit button" value="Submit" id="submitmsg" />
                </form>
            </div>
        </div>
    </div>
</body>
</html>
