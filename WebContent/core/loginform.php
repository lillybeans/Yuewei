<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js">
</script>
<script type="text/javascript" >
$(function() {
	$("#submit").click(function() {

	event.preventDefault();

	var username = $("#username").val();
	var password = $("#password").val();
	var userInfo = $("#login_form").serialize();//serialize: so you can access by $_POST[fieldname1], $_POST[fieldname2] later...in this case fieldname1=username, fieldname2=password
		
	$.ajax({
		type: "POST",
		url: "core/login.php",
		data: userInfo,
	    contentType : "application/x-www-form-urlencoded; charset=UTF-8",
		success: function(msg){ //note: this "msg" here is the key! It is whatever the output the login.php file gives, in this case, print_r(error) is the msg here!
			if (msg == "success")
			{
				$('#error').html("success");
				$('#error').fadeIn(500).show();
				//remove "log in" button, show loggedin.php
			}

			else
			{
				$('#error').html(msg);
				$('#error').fadeIn(500).show();
			}

		//alert (userInfo);
		//$('.success').fadeIn(200).show();
		//$('#error1').fadeOut(500).hide();
		}
	});

return false; //so page doesn't reload
});

});
</script>

<div id=login>
	<a class='login-trigger yellowbutton' href=#>登录/Sign in &nbsp;<span id=triangle>▼</span></a>
      <div id="login-content">
      
        <form id=login_form action="core/login.php" method=post>
          <fieldset id="inputs">
          
          <span id="error">error message goes here</span>
          
            <input id="username" name="username" placeholder="用户名/Username" required><br>
            <input id="password" type="password" name="password" placeholder="密码/Password" required><br>
            <center>
            <input id="submit" type="submit" value="登录"><a class=fade_link href=register.php target=iframe><input id="register" type=button value="注册"></a></center>
            <a id="forgot" class=forgot-trigger href=#><center>忘了用户或密码？<br>Forgot User or Password?</center></a>
           </fieldset>
          </form>
          
          <form action=# method=post>
          <div id="forgot-content">
           <fieldset id="forgot_password">
            <center><font color=#564940>用户找回/User Retrieval</font></center>
            <input id="email" name="Email" placeholder="邮箱地址/E-mail" required><br>
            <center><input id="send" type="submit" value="发送到邮箱"></center>
           </fieldset>
           </div>
          </form>
          
      </div>                
</div>