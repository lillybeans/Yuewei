<div id=login>
	<a class='login-trigger yellowbutton' href=#>登录/Sign in &nbsp;<span id=triangle>▼</span></a>
      <div id="login-content">
      
        <form action="core/login.php" method=post>
          <fieldset id="inputs">
            <input id="username" name="username" placeholder="用户名/Username" required><br>
            <input id="password" type="password" name="password" placeholder="密码/Password" required><br>
            <center>
            <a href=core/login.php><input id="submit" type="submit" value="登录"></a><a class=fade_link href=register.php target=iframe><input id="register" type=button value="注册"></a></center>
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