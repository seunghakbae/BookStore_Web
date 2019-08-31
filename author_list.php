<? include "header.php" ?>
	<div class = "marg">
		<?php
		include "config.php";
		include "util.php";

		$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
		$query = "";
		
		$query = "select * from  author";
		?>
		
		<table width="750" border="1">
			<tr> <td width="20" scope="col"></td> 
			<td width="20" scope="col">No.</td> 
			<td width="20" scope="col">작가 이름</td> 
			<td width="50" scope="col">작가 설명</td> 
			<td width="50" scope="col">작가</td>
			<td width="50" scope="col">작가 생년월일</td>
			</tr>
		
		<?php
			$ret = mysqli_query($connect, $query);
			while($row = mysqli_fetch_array($ret)){
				echo "<tr>
				<td width='20'><input type = 'checkbox' name = 'check[]'/></td>
				<td width='20'>$row[0]</td>
				<td width='50'>$row[1]</td>
				<td width='150'>$row[2]</td>
				<td width='50'>$row[3]</td>
				<td width='50'>$row[4]</td>
				</tr>";
			}
		?>
		</table>
	</div>
<? include("footer.php") ?>