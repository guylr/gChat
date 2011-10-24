var J = jQuery.noConflict();

function load_messages(){
    J.ajax({
        type: "POST",
        url: "gchat.php?q=display",  
        cache: false,
        dataType: "json",
        success: function(data){
            if(data.messages != ""){
                J("#messages").html(format_messages(data.messages)); //Insert chat log into the #chatbox div
            }
        }
    });
}

function format_messages(datain){
    output = "";
    for (var i = 0; i < datain.length; i++){
        output += 
            '<div class="message">' +
            '    <span class="mbody"><span class="name">' + datain[i].name + '</span>&nbsp;<span class="text">' + datain[i].message + '</span></span>' +
            '    <span class="time">' + format_date(datain[i].timestamp) + '</span>' +
            '</div>';
    }
    return output;
}

function format_date(timestamp){
  var dt = new Date(timestamp * 1000);
  return dt.getHours() + ":" + dt.getMinutes();
}

function error_message(er){
    J("#error").slideDown("fast");
    J(".error_text").text("Error: " + er);
}

J(document).ready(function(){
    J("input:text").each(function ()
    {
        // store default value
        var v = this.value;
    
        J(this).blur(function ()
        {
            // if input is empty, reset value to default 
            if (this.value.length == 0){
                this.value = v;
                J(this).addClass("normal");
            }
        }).focus(function ()
        {
            // when input is focused, clear its contents
            if (this.value == v){
                this.value = "";
                J(this).removeClass("normal");
            }
        }); 
    });
    
    //IE6/7 input border hack
    if (J.browser.msie === true) {
        J("input")
                .bind("focus", function() {
                        J(this).addClass("focusie");
                }).bind('blur', function() {
                        J(this).removeClass("focusie");
                });
    }

    load_messages();
    
    J(".close").click(function(){
        J("#error").slideUp("fast");
    });
    
    //alert(J("#chat_form").serialize());
    /* attach a submit handler to the form */
    J("#chat_form").submit(function(event) {
        
        J("#error").hide();
        
        if(J("#n").val() == "" || J("#n").val() == "Name"){
            error_message("You did not enter a name.");
            return false;
        }
        if(J("#m").val() == "" || J("#m").val() == "Message"){
            error_message("You did not enter a message.");
            return false;
        }
    
        /* stop form from submitting normally */
        event.preventDefault();
        
        J.ajax({
            type: "POST",
            url: "gchat.php",
            data: J("#chat_form").serialize(),
            cache: false,
            dataType: "json",
            success: function(data){
                if(data.error == false){
                    if(data.messages != ""){
                        J("#messages").html(format_messages(data.messages));
                    }
                }else{
                    error_message(data.error_message);
                }
            }
        });
        
        return false;
    });
});