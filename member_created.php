<?php 
	include "config.php";
	include "util.php";
	
	$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
	
	$id = $_POST['input_id'];
	$pass = $_POST['input_passwd'];
	$c_pass = $_POST['input_c_passwd'];
	$name = $_POST['input_name'];
	$phone = $_POST['input_phone'];
	$address = $_POST['input_add'];
	
	//transaction 시작 (아래부분 추가)
	mysqli_query($conn, "set autocommit = 0");	// autocommit 해제
	mysqli_query($conn, "set transation isolation level serializable");	// isolation level 설정
	mysqli_query($conn, "begin");	// begins a transation

	
	$ret = mysqli_query($connect, "select member_id from member where member_id='$id'");
	$num = mysqli_num_rows($ret);
	
	if(!$ret){
		echo '<script language="javascript">';
		echo 'alert("DB에 문제가 있습니다.")';
		echo '</script>';
		mysqli_query($conn, "rollback"); // select member_id 실패 하였으므로 roll back (추가)
		echo "<meta http-equiv='refresh' content='0;url=member_create.php'>";
		
	}else{
		if($num) { 
			echo '<script language="javascript">';
			echo 'alert("이미 존재하는 아이디입니다.")';
			echo '</script>';
			echo "<meta http-equiv='refresh' content='0;url=member_create.php'>";
			
		}else if(check_pass($pass,$c_pass)!=0){ 
			echo '<script language="javascript">';
			echo 'alert("패스워드가 맞지 않습니다.")';
			echo '</script>';
			echo "<meta http-equiv='refresh' content='0;url=member_create.php'>";
			
		} else { 
			
			$insert_query = "insert into member (member_id, password, name, phone, address, admin) values ('$id','$pass','$name','$phone','$address', 0)";
			$insert_ret = mysqli_query($connect, $insert_query);
			
			if(!insert_ret) { 
				echo '<script language="javascript">';
				echo 'alert("DB에 문제가 있습니다.")';
				echo '</script>';
				mysqli_query($conn, "rollback"); // insert new member 실패 하였으므로 roll back (추가)
				echo "<meta http-equiv='refresh' content='0;url=member_create.php'>";
		
			} else { 
			echo '<script language="javascript">';
			echo 'alert("회원가입이 성공적으로 되었습니다!")';
			echo '</script>';	
			mysqli_query($conn, "commit"); // 작가 등록 성공적으로 수행.수행 내역 COMMIT
			echo "<meta http-equiv='refresh' content='0;url=login.php'>"; 
			} 
		}
	}
	mysqli_close($connect);
?>