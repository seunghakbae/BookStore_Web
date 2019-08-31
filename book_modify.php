<? include("header.php") ?>
<div class="marg"> 
	<form enctype="multipart/form-data" name ="form" action="book_modified.php" method="post">
		<?php 
			include "config.php"; 
			include "util.php"; 
			$id = $_GET['id']; 
			$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
			$ret = mysqli_query($connect, "select * from book natural join author natural join category where book_id=$id");
			$row=mysqli_fetch_row($ret);
		?>
		
		<input type="hidden" name="book_id" value=$id/>
		<table width = "535" border = 1>
			<tr><th scope="row">제품 이미지</th><td> 
			<img src='./images/gallery/<?=$row[8]?>' width='90' height='90' /> 
			<input type="hidden" name="MAX_FILE_SIZE" value="134217728"/> 
			<input type="file" name="book_image" /></td></tr>
			<input type="hidden" name="book_old_image" value='<?=$row[8]?>'/>
			<tr><th width="100" scope="row">출판사</th><td width="317"> 
			<input type="text" name="book_company" size='60' value='<?=$row[3]?>' /></td></tr>
			<tr><th width="100" scope="row">책 이름</th><td width="317"> 
			<input type="text" name="book_name" size='60' value='<?=$row[4]?>' /></td></tr>
			<tr><th width="100" scope="row">책 설명</th><td width="317"> 
			<input type="text" name="book_dec" size='60' value='<?=$row[5]?>' /></td></tr>
			<tr><th width="100" scope="row">원 가격</th><td width="317"> 
			<input type="text" name="book_original_price" size='60' value='<?=$row[6]?>' /></td></tr>
			<tr><th width="100" scope="row">현 이름</th><td width="317"> 
			<input type="text" name="book_price" size='60' value='<?=$row[7]?>' /></td></tr>
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
			<input type="submit" name="send" value="수정하기"/> 
		</div>
	</form>
</div>
<? include("footer.php") ?>