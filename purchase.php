<? include ("header.php"); ?>
<form name='form' method='post' action='purchased.php'> 
	<div class="marg"> 
		<table width="540" border="1">
			 <tr> 
				 <th width="63" scope="col">ID</th>
				 <th width="144" scope="col">책이름</th> 
				 <th width="209" scope="col">가격</th> 
				 <th width="96" scope="col">수량</th>
			</tr>
			<?php 
			include "config.php"; 
			include "util.php"; 
			$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
			
			$check = $_POST['check'];
			
			for($i=0; $i<sizeof($check); $i++) { 
				$ret = mysqli_query($connect, "select * from book where book_id = $check[$i]");
				$row = mysqli_fetch_array($ret);
				echo " 
					<tr> 
					<th width='63' scope='col'>$row[0]</th> 
					<th width='144' scope='col'>$row[2]</th> 
					<th width='209' scope='col'>$row[5]</th> 
					<th width='96' scope='col'> 
						<input type='text' name='count[]' value = '1' size=‘5'/>개</th> 
					</tr> 
					<input type='hidden' name='check_arr[]' value='$row[0]'/> 
					<input type='hidden' name='price_arr[]' value='$row[5]'/> ";
			}
			?>
		</table> 
		<input type="submit" name="button" value="주문하기"/>
	</div>
</form>
<? include ("footer.php") ?>
