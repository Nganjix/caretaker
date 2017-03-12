$(document).ready(function(){
		setImageSize();
		$("#submit").click(function(event) {
			//console.log("in submit");
			usr = document.getElementById("username").value;
			passwrd = document.getElementById("password").value;
			if (usr != "" && usr != null && passwrd != null && passwrd != "")
			{
				sendData(escape(usr), escape(passwrd));
			}
			else
			{
				var errorMsg = document.getElementById('errmsg');
           		errorMsg.innerHTML = "Empty username or password !!";
			}

			/* Act on the event */
		});
		//console.log( (90/100)*$(window).height());
		//console.log($(document).height());
	});
$(window).resize(function() {
	setImageSize();
});
function setImageSize()
{
    $(".midpanels").css("min-height", (90/100)*$(window).height());
}

function sendData(usr, passwd)
{
	
	var sender; // The variable that makes Ajax possible!
     try{
          // Opera 8.0+, Firefox, Safari
           sender = new XMLHttpRequest();
         }
         catch (e)
           {
            // Internet Explorer Browsers
              try
                 {
                    sender = new ActiveXObject("Msxml2.XMLHTTP");
                 }
              catch (e) {
                         try
                           {
                            sender = new ActiveXObject("Microsoft.XMLHTTP");
                          }
                         catch (e)
                          {
// Something went wrong
                           alert(" browser does not support ajax");
                           return false;
                          }
                       }
           }
           
           //var queryString = "username=" + usr;
           var url = "validate.php";
           var params = "username="+usr+"&password="+passwd;
           //console.log("in senddata " + usr +" "+queryString);
           sender.open("POST",url, true);
           sender.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

           sender.onreadystatechange = function()
           {
           	if(sender.readyState == 4)
           	{
           		
           		if(sender.responseText == "200")
           		{
           			window.location.href = "index.php";
           			//sender.open("GET", "tester.php",true)
           			//sender.send(null);
           			
           			
           		}
           		else
           		{
           			var errorMsg = document.getElementById('errmsg');
           		    errorMsg.innerHTML = sender.responseText;
           		}

           	}
           }
           
           sender.send(params);

}
$(function () { $("[data-toggle='tooltip']" ).tooltip(); });
/*
http.setRequestHeader("Content-length", params.length);
http.setRequestHeader("Connection", "close");
*/
