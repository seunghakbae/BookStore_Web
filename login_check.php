<?php 
	include "config.php";
	include "util.php";
	
	$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
	
	$id = $_POST['ID'];
	$pass = $_POST['passwd'];

	$mem_result = mysqli_query($connect, "select * from member where member_id = '$id'");
	$mem_num = mysqli_num_rows($mem_result);
	
	if(!$mem_num){
		echo '<script language="javascript">';
		echo 'alert("잘못된 아이디 입니다.")';
		echo '</script>';
		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	}else{
		$mem_array = mysqli_fetch_array($mem_result);
		
		$db_name = $mem_array[name];
		$db_pass = $mem_array[password];
		$db_admin = $mem_array[admin];
		
		if($db_pass == $pass){
			SetCookie("cookie_id", $id,0,"/");
			SetCookie("cookie_name", $db_name,0, "/");
			SetCookie("cookie_admin", $db_admin,0, "/");
			echo "<meta http-equiv='refresh' content='0;url=book_list.php'>";
		}else{
			echo '<script language="javascript">';
			echo 'alert("잘못된 비밀번호 입니다.")';
			echo '</script>';
			echo "<meta http-equiv='refresh' content='0;url=login.php'>";
		}
	}
	mysqli_close($connect);
?>
