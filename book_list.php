<? include "header.php" ?>
	<form name='form' method='post' action='purchase.php'>
		<div class = "marg">
			<?php
			include "config.php";
			include "util.php";
	
			$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
			$query = "";
			
			if(array_key_exists("search_word", $_POST)){
				$search_word = $POST["search_word"];
				echo "검색어 : $search_word";
				$query = "select * from book natural join author natural join category where book_name like '%$search_word'";
			} else{
				$query = "select * from  book natural join author natural join category";
			}?>
			
			<table width="750" border="1">
				<tr> <td width="50" scope="col"></td> 
				<td width="100" scope="col">책 이미지</td> 
				<td width="240" scope="col">책 이름</td> 
				<td width="240" scope="col">작가</td>
				<td width="130" scope="col">출판사</td>
				<td width="80" scope="col">현가격</td>
				<td width="100" scope="col">분야</td>
				</tr>
			<?php
				$ret = mysqli_query($connect, $query);
				while($row = mysqli_fetch_array($ret)){
					echo "<tr>
					<td width='50'><input type = 'checkbox' name = 'check[]' value='$row[2]'/></td>
					<td width='100'><a href='book_info.php?id=$row[2]'><img src='./images/gallery/$row[8]'width='100'height='90'</a></td>
					<td width='240'><a href='book_info.php?id=$row[2]'>$row[4]</a></td>
					<td width='240'><a href='book_info.php?id=$row[2]'>$row[9]</a></td>
					<td width='130'>$row[3]</td>
					<td width='80'>$row[7]</td>
					<td width='100'>$row[12]</td>
					</tr>";
				}
			?>
			</table>
			<input type ="submit" name = "button" value = "구입하기"/>
		</div>
	</form>
<? include("footer.php") ?>