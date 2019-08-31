<? include("header.php") ?>
	<div class = "marg">
		<form name = "form" action = "member_created.php" method = "post">
			<div align="center">[ 회원등록 ]</div>
			<table width="440" border="1" align = "center"> 
				<tr><th width="120" scope="row">ID</th> 
				<td width="332"><input type="text" name="input_id"/></td></tr> 
				<tr><th scope = "row">Password</th>
				<td><input type="password" name="input_passwd"/></td></tr> 
				<tr><th scope = "row">Password 확인</th>
				<td><input type="password" name="input_c_passwd"/></td></tr> 
				<tr><th scope = "row">이름</th>
				<td><input type="text" name="input_name"/></td></tr> 
				<tr><th scope = "row">전화번호</th>
				<td><input type="text" name="input_phone"/></td></tr> 
				<tr><th scope = "row">주소</th>
				<td><input type="text" name="input_add"/></td></tr> 
			</table>
		<label>
			<div align = "center">
				<input type = "submit" name = "send" value = "가입하기"/>
			</div>
		</label>
		</form>
	</div>
<? include("footer.php") ?>