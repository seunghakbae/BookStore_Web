<? include ("header.php") ?> 
<form name='form' method='post' action='purchase.php'> 

	<div class="marg"> 
		<table width="535" border = 1>
			<?php include 
				"config.php";  
				include "util.php"; 
				$id = $_GET['id'];
				
				$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
				$ret = mysqli_query($connect,"select * from book natural join author natural join category where book_id=$id");
				
				while($row = mysqli_fetch_array($ret)){
					echo "<tr>
					<input type='hidden' name='check[]' value = '$row[0]' checked/>
					<th width='80' scope='col'>이미지</th>
					<th width='320' scope='col' align='center'><img src='./images/gallery/$row[8]' width='90' height='90' /></th></tr>";
					
					echo "<tr> <th width='80' scope='col'>출판사</th> 
					<th width='320' scope='col'>$row[3]</th></tr>";
					
					echo "<tr> <th width='80' scope='col'>책 이름</th> 
					<th width='320' scope='col'>$row[4]</th></tr>";
					
					echo "<tr> <th width='80' scope='col'>작가</th> 
					<th width='320' scope='col'>$row[9]</th></tr>";
					
					echo "<tr> <th width='80' scope='col'>작가 설명</th> 
					<th width='320' scope='col'>$row[10]</th></tr>";
					
					echo "<tr> <th width='80' scope='col'>책 설명</th> 
					<th width='320' scope='col'>$row[5]</th></tr>";
					
					echo "<tr> <th width='80' scope='col'>원 가격</th> 
					<th width='320' scope='col'>$row[6]</th></tr>";
					
					echo "<tr> <th width='80' scope='col'>현 가격</th> 
					<th width='320' scope='col'>$row[7]</th></tr>";
					
					echo "<tr> <th width='80' scope='col'>분야</th> 
					<th width='320' scope='col'>$row[12]</th></tr>";
					
				}
			?>
		</table>
		<input type="button" name="buyBtn" value="구입하기" onclick="submit()"/>
		<input type="button" name="modifyBtn" value="수정하기" onclick="modify()"/>
	</div>
</form>
<script> 
	var form = document.search_form;
	
	function submit () { 
		form.submit(); 
	} 
	
	function modify () { 
		form.action= "book_modify.php?id=<?=$id?>";
		submit(); 
	} 
</script>
<? include ("footer.php") ?>