<?php
	include "config.php";
	include "util.php";
	
	$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
	
	$b_id = $POST['book_id'];
	$b_company = $_POST['book_company'];
	$b_name = $_POST['book_name'];
	$b_dec = $_POST['book_dec'];
	$b_original_price = $_POST['book_original_price'];
	$b_price = $_POST['book_price'];
	$b_category = $_POST['book_category'];
	$b_author = $_POST['book_author'];
	$pathimg = "/home/db2019/2013210069/public_html/book_sites/images/gallery/";
	$b_image = $pathimg.basename($_FILES["book_image"]["name"]);
	$b_imagename = basename($_FILES["book_image"]["name"]);
	
	#echo $b_id;
	echo $b_company;
	
	
	if($b_imagename != '') 
		$is_image_modify = true;
	
	
	if($is_image_modify){ 
		if(!move_uploaded_file($_FILES['book_image']['tmp_name'], $b_image)) { 
			echo '<script language="javascript">';
			echo 'alert("이미지 파일 업로드 실패!")';
			echo '</script>';
			echo "<meta http-equiv='refresh' content='0;url=book_modify.php'>";
		}
	}else{
		$b_imagename = $_POST['book_old_image'];
	}
	
	//transaction 시작 (아래부분 추가)
	mysqli_query($conn, "set autocommit = 0");	// autocommit 해제
	mysqli_query($conn, "set transation isolation level serializable");	// isolation level 설정
	mysqli_query($conn, "begin");	// begins a transation
	
	$insert_query = "update book set company = '$b_company', book_name = '$b_name', book_describe = '$b_dec', original_price ='$b_original_price', price ='$b_price', image ='$b_imagename', category_id ='$b_category', author_id ='$b_author' where book_id = '$b_id'";
	$insert_ret = mysqli_query($connect, $insert_query);
	
	if(!$insert_ret) { 
			//update book 실패
			echo '<script language="javascript">';
			echo 'alert("DB에 에러가 발생!")';
			echo '</script>';
			mysqli_query($conn, "rollback"); // update book 실패 하였으므로 roll back (추가)
			echo "<meta http-equiv='refresh' content='0;url=book_list.php'>";
	} else { 
			echo '<script language="javascript">';
			echo 'alert("성공적으로 수정 되었습니다")';
			echo '</script>';
			mysqli_query($conn, "commit"); // 책 수정 성공적으로 수행.수행 내역 COMMIT

			echo "<meta http-equiv='refresh' content='0;url=book_list.php'>";
	}
?>