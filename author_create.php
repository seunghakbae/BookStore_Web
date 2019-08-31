<? include ("header.php") ?>
	<div class = "marg">
		<form name = "form" action = "author_created.php" method = "post">
			<div align="center">[ 작가등록 ]</div>
			<table width="440" border="1" align = "center"> 
				<tr><th width="120" scope="row">작가이름</th> 
				<td width="332"><input type="text" name="input_name"/></td></tr> 
				<tr><th scope = "row">작가 설명</th>
				<td><input type="text" name="input_describe"/></td></tr> 
				<tr><th scope = "row">작가생년월일</th>
				<td><input type="text" name="input_birthday"/></td></tr> 
			</table>
		<label>
			<div align = "center">
				<input type = "submit" name = "send" value = "등록하기"/>
			</div>
		</label>
		</form>
	</div>
<? include ("footer.php") ?>