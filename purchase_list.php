<? include ("header.php") ?>
<?php 
	include "config.php"; 
	include "util.php"; 

	$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
	
	if(!$_COOKIE[cookie_id] || !$_COOKIE[cookie_name]) { 
		echo '<script language="javascript">';
		echo 'alert("로그인 후 이용해주세요!")';
		echo '</script>';
		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	} else {
		$id = $_COOKIE[cookie_id];
		$products = array();
		
		$result = mysqli_query($connect , "select * from purchase_list a,purchase_information b, book c where a.purchase_id = b.purchase_id and b.book_id = c.book_id and a.member_id = '$id'");
		$order_ret = mysqli_query($connect, "select * from purchase_list where member_id = '$id'");
		
		echo " <table border=2 width=540><tr>
			<th width=100><p align=center>주문번호</p></th> 
			<th width=100><p align=center>주문날짜</p></th> 
			<th width=240><p align=center>주문상품</p></th> 
			<th width=100><p align=center>전체금액</p></th></tr>";
		
		while($row=mysqli_fetch_array($result)){
			$index = $row[purchase_id];
			$products[$index]= $row[book_name].":".$row[quantity]."</br>".$products[$index];
		}
		
		while($row2=mysqli_fetch_array($order_ret)){
			$index = $row2[purchase_id];
			#echo "products[$index]";
			echo "<th width=100><p align=center>$row2[purchase_id]</p></th> 
			<th width=100><p align=center>$row2[purchase_date]</p></th> 
			<th width=240><p align=center>$products[$index]</p></th>
			<th width=100><p align=center>$row2[total_cost]</p></th></tr>";
		}
		echo "</table>";
	}
?>
<? include ("footer.php") ?>