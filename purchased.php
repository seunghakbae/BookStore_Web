<?php 
	include "config.php";
	include "util.php"; 
	
	function totalcost($tmparr,$tmparr2) {
		$total=0;
		for($i=0; $i<sizeof($tmparr); $i++) { 
			$total = $tmparr[$i]*$tmparr2[$i] + $total;
		}
		return $total;
	}
	
	$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
	
	$check_arr = $_POST['check_arr'];
	$price_arr = $_POST['price_arr'];
	$count = $_POST['count'];
	
	if(!$_COOKIE[cookie_id] || !$_COOKIE[cookie_name]) {
		echo '<script language="javascript">';
		echo 'alert("로그인 후 이용해주세요!!")';
		echo '</script>';
		echo "<meta http-equiv='refresh' content='0;url=purchase.php'>";
	}else{
		$id = $_COOKIE[cookie_id];
		$name = $_COOKIE[cookie_name];
		$dtime = time();
		$date = date('Y/m/d',$dtime);
		
		$sum = totalcost($count,$price_arr);
		
		
		//transaction 시작 (아래부분 추가)
		mysqli_query($conn, "set autocommit = 0");	// autocommit 해제
		mysqli_query($conn, "set transation isolation level serializable");	// isolation level 설정
		mysqli_query($conn, "begin");	// begins a transation
		
		
		$ret = mysqli_query($connect, "insert into purchase_list (member_id, purchase_date, total_cost) values ('$id','$date','$sum')");
		
		if(!$ret){
			echo '<script language="javascript">';
			echo 'alert("DB에 문제가 있습니다.")';
			echo '</script>';
			mysqli_query($conn, "rollback"); // insert purchase_list 실패 하였으므로 roll back (추가)
			echo "<meta http-equiv='refresh' content='0;url=purchase_list.php'>";
		}
		$numb = mysqli_insert_id($connect);
		
		for($i=0; $i<sizeof($check_arr); $i++) { 
			$ret2 = mysqli_query($connect,"insert into purchase_information (purchase_id, book_id, quantity) values ('$numb','$check_arr[$i]','$count[$i]')");
			
			echo "$numb";
			echo "check_arr[$i]";
			echo "$count[$i]";
		}
		
		
		if(!$ret2){
			echo '<script language="javascript">';
			echo 'alert("DB에 문제가 있습니다.")';
			echo '</script>';
			mysqli_query($conn, "rollback"); // insert purchase_information 실패 하였으므로 roll back (추가)
			echo "<meta http-equiv='refresh' content='0;url=purchase_list.php'>";
		}
		
		mysqli_query($conn, "commit"); // purchase 등록 성공적으로 수행.수행 내역 COMMIT
		echo "<meta http-equiv='refresh' content='0;url=purchase_list.php'>";
	}
?>