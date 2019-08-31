<?php include "header.php";?>
	<form name = "form" action = "login_check.php" method = "post">
		<p>
			<font size = "2"> Login: </font>
			<input name = "ID" type = "text" size = "15" />
		</p>
		<p> 
		<font  size="2">Passwd: </font> 
		<input name="passwd" type="password" class="marg" size="15" /> 
		</p>
		<p>
			<input type = "submit" name = "button2" value = "로그인"/>
			<a href = "member_create.php">회원가입</a>
		</p>
	</form>
<?php include "footer.php";?>