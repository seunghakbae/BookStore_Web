<? include("header.php") ?>
<div class="marg"> 
	<form enctype="multipart/form-data" name ="form" action="book_created.php" method="post">
		<table width="433" border="1"> 
			<tr><th width="100" scope="row">출판사</th> 
			<td width="317"><input type="text" name="book_company" /></td></tr> 
			<tr><th width="100" scope="row">책 이름</th> 
			<td width="317"><input type="text" name="book_name" /></td></tr> 
			<tr><th scope="row">책 설명</th> 
			<td><textarea name="book_dec" ></textarea></td></tr>
			<tr><th scope="row">원 가격</th> 
			<td><input type="text" name="book_original_price"/></td></tr>
			<tr><th scope="row">중고 가격</th> 
			<td><input type="text" name="book_price"/></td></tr>
			<tr><th scope="row">책 이미지</th> 
			<td><input type="hidden" name="MAX_FILE_SIZE" value="134217728"/> <input type="file" name="book_image" /></td></tr> 
			<tr><th scope="row">분류</th> 
			<td><select name="book_category"> 
			<?php
				$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
				$ret = mysqli_query($connect, "select * from category");
				
				while($row=mysqli_fetch_array($ret)){
					echo "<option value = '$row[0]'>'$row[1]'</option>";
				}
			?>
			</select></td> 
			<tr><th scope="row">작가</th> 
			<td><select name="book_author"> 
			<?php
				$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
				$ret = mysqli_query($connect, "select * from author");
				
				while($row=mysqli_fetch_array($ret)){
					echo "<option value = '$row[0]'>'$row[1]'</option>";
				}
			?></tr>
		</table>
		<div align="center"> 
			<input type="submit" name="send" value="입력하기"/> 
		</div>
	</form>
</div>
<? include("footer.php") ?>