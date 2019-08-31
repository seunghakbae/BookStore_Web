<?php
	include "config.php";
	include "util.php";
	
	$connect = mysqli_connect("localhost", "db2013210069", "seunghak456@naver.com", "db2013210069");
	
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
	
	if(move_uploaded_file($_FILES['book_image']['tmp_name'], $b_image)) { 
		
		//transaction 시작 (아래부분 추가)
		mysqli_query($conn, "set autocommit = 0");	// autocommit 해제
		mysqli_query($conn, "set transation isolation level serializable");	// isolation level 설정
		mysqli_query($conn, "begin");	// begins a transation

		$insert_query = "insert into book (company, book_name, book_describe, original_price, price, image, category_id, author_id) values ('$b_company','$b_name','$b_dec','$b_original_price','$b_price', '$b_imagename', '$b_category','$b_author')";
		$insert_ret = mysqli_query($connect, $insert_query);
		
		if(!$insert_ret) { 
			//insert new book실패
			echo '<script language="javascript">';
			echo 'alert("DB에 에러가 발생!")';
			echo '</script>';
			mysqli_query($conn, "rollback"); // insert new book 실패 하였으므로 roll back (추가)
			echo "<meta http-equiv='refresh' content='0;url=book_create.php'>";
			
		} else { 
			echo '<script language="javascript">';
			echo 'alert("성공적으로 입력 되었습니다")';
			echo '</script>';
			mysqli_query($conn, "commit"); // 책 등록 성공적으로 수행.수행 내역 COMMIT
			echo "<meta http-equiv='refresh' content='0;url=book_create.php'>";
		} 
	}else{ 
			echo '<script language="javascript">';
			echo 'alert("파일업로드 실패!")';
			echo '</script>';
			echo "<meta http-equiv='refresh' content='0;url=book_create.php'>";
	}
?>