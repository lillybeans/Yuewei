<?php 
include 'core/functions/init.php'; //imports all functions, connects to database


if (logged_in())
{
	$session_user_id=$_SESSION['user_id']; //grab current user's user_id
	$user_data=user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email');
	include 'core/loggedin.php';
}

else
{
	include 'core/loginform.php'; //include essentially functions the same as "insert".
}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>

<link href="layout.css" rel="stylesheet"/> 
<link href="flipper.css" rel="stylesheet"/>
<link href="login.css" rel="stylesheet"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>

<script type="text/javascript">

$(document).ready(function() {
    $(".fade_link").click(function(event){
        event.preventDefault(); 
        targetLink = this.href;
        $("#iframe").fadeOut('2000', redirectPage); 
    });
    
  	 function redirectPage() {
        $("#iframe").attr("src", targetLink).load(function(){$(this).fadeIn('2000');});
    }
});

/** Display log-in on click **/
$(document).ready(function(){
	  $('.login-trigger').click(function(){
	    $(this).next('#login-content').slideToggle();
	    $(this).toggleClass('active');          
	    
	    if ($(this).hasClass('active')) $(this).find('#triangle').html('&#x25B2;')
	     else $(this).find('#triangle').html('&#x25BC;')
	    })
	});

/** Display forgot password on click**/
$(document).ready(function(){
	  $('.forgot-trigger').click(function(){
	    $('#forgot-content').slideToggle();
	    $(this).toggleClass('active');   
	    
	    if ($(this).hasClass('active'))
	    {
			$('#username').removeAttr('required');
			$('#password').removeAttr('required');
	  	}
	    
	    else
	    {
	    	$('#username').attr('required', 'required');
			$('#password').attr('required', 'required');
	    }
		
	    })
	});
	
</script>


<table id=maincontainer>
	<tr>
		<td class=banner>
		<img src="layout/banner.png">
		<br><br>
		
		<nav>
		<ul id=links>
			<li>
			<div class="buttoncontainer">
 			<div class="button">
   			<div class="front"><a href=main.html class='navbuttonleft fade_link' target=iframe>主页</a></div>
    		<div class="front back"><a href=main.html class='navbuttonleft_back fade_link' target=iframe>Home</a></div>
 			</div>
 			</div>
 			
 			<li>
 			<div class="buttoncontainer">
 			<div class="button">
   			<div class="front"><a href=aboutus.html class='navbuttoncenter fade_link' target=iframe>关于我们</a></div>
    		<div class="front back"><a href=aboutus.html class='navbuttoncenter_back fade_link' target=iframe>About Us</a></div>
    		</div>
    		</div>
		
			<li>
			<div class="buttoncontainer">
 			<div class="button">
   			<div class="front"><a href=events.html class='navbuttoncenter fade_link' target=iframe>活动</a></div>
    		<div class="front back"><a href=events.html class='navbuttoncenter_back fade_link' target=iframe>Events</a></div>
    		</div>
    		</div>
    		
    		<li>
    		<div class="buttoncontainer">
 			<div class="button">
   			<div class="front"><a href=team.html class='navbuttoncenter fade_link' target=iframe>团队</a></div>
    		<div class="front back"><a href=team.html class='navbuttoncenter_back fade_link' target=iframe>Team</a></div>
    		</div>
    		</div>
    		
    		<li>
    		<div class="buttoncontainer">
 			<div class="button">
   			<div class="front"><a href=contact.html class='navbuttonright fade_link' target=iframe>联系</a></div>
    		<div class="front back"><a href=contact.html class='navbuttonright_back fade_link' target=iframe>Contact Us</a></div>
    		</div>
    		</div>
    		
		</ul>
		</nav>
		
		</td>
		
		<td class=foxshadow rowspan=2>
		</td>
	</tr>
	
	<tr>
		<td class=iframecontainer>
			<iframe id=iframe src=main.html></iframe>
		</td>
	</tr>
</table>

</body>
</html>

