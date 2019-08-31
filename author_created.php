<?php 
	include "config.php";
	include "util.php";
	
	$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
	
	$name = $_POST['input_name'];
	$describe = $_POST['input_describe'];
	$birthday = $_POST['input_birthday'];
	
	//transaction 시작 (아래부분 추가)
	mysqli_query($conn, "set autocommit = 0");	// autocommit 해제
	mysqli_query($conn, "set transation isolation level serializable");	// isolation level 설정
	mysqli_query($conn, "begin");	// begins a transation
	
	$insert_query = "insert into author (author_name, author_describe, author_birthdate) values ('$name', '$describe', '$birthday')";
	$insert_ret = mysqli_query($connect, $insert_query);
		
	if(!insert_ret) { 
		//insert new author 실패
		echo '<script language="javascript">';
		echo 'alert("DB에 문제가 있습니다.")';
		echo '</script>';
		mysqli_query($conn, "rollback"); // insert new author 실패 하였으므로 roll back (추가)
		echo "<meta http-equiv='refresh' content='0;url=author_create.php'>";
	
	} else { 
	echo '<script language="javascript">';
	echo 'alert("작가가 성공적으로 등록되었습니다!")';
	echo '</script>';
	mysqli_query($conn, "commit"); // 작가 등록 성공적으로 수행.수행 내역 COMMIT
	echo "<meta http-equiv='refresh' content='0;url=author_create.php'>"; 
	}
	
	mysqli_close($connect);
?>