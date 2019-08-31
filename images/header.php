<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="Seung hak Bae" />
	<meta name="description" content="Term Project for COSE371 Database" />
    <title>
      나침반
    </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/print.css" type="text/css" media="print" /></head>
  <body>
    <div class="wrapper">
      <div class="container">
        <div id="searchBar"></div>
        <div class="icon">
          <img src="images/hand_logo.gif" width="140" height="98"
          alt="My fantastic Webdings Logo" />
        </div>
        <div id="title">
          <br><br>
          <h1>
            나침반
          </h1>
          <h2>
            책이란 넓디넓은 시간의 바다를 지나가는 배이다. 
          </h2>
        </div>
        <div id="navigation">
          <ul>
            <li>
              <a href="index.php" class="selected">홈</a>
            </li> 	  
            <li>
            <?php
            	if(!$_COOKIE[cookie_id] || !$_COOKIE[cookie_name]){
            		echo "<a href= 'login.php'> 로그인 </a>";
            	}
            	else
            	{
            		if($_COOKIE[cookie_admin] == 0){
            			echo "<a href= 'logout.php'> $_COOKIE[cookie_name] 로그아웃 </a>";
            		}
            		else
            		{
            			echo "<a href='book_create.php'> 책 등록 </a>";
            			echo "<a href = 'logout.php'> 관리자 로그아웃</a>";
            		}
            	}
            ?>
            </li>
            <li>
              <a href="book.list.php">책목록</a>
            </li>
            <li>
              <a href="orderlist.php">주문 목록</a>
            </li>
            <li>
              <a href="authorlist.php">작가 목록</a>
            </li>
          </ul>
        </div>
        <br class="clear" />
        <div id="body">
          <div class="sidebar">
            <h3>Categories</h3>
			<div class="content">
				<ul class="links">
				  <li><a href="#">홈</a></li>
				  <li><a href="#">로그인</a></li>
				  <li><a href="#">책목록</a></li>
				  <li><a href="#">주문 목록</a></li>
				  <li><a href="#">작가 목록</a></li>
				</ul>
			</div>
			<br>
			<script>
				function search_value_check(){
					var form = document.search_form;
					if(!form.search_word.value){
						alert("검색어를 입력하시기 바랍니다.");
						form.search_word.focus();
						return false;
					}else{
						return true;
					}
				}
			</script>
		
			<form name = "search_form" method = "post" onsubmit="return search_value_check()" action = 'book_list.php'>
				<h3> 책 검색 : 
				<input name = "search_word" type = "text" size = "12" maxlength = "50"/>
				<input type = "submit" name = "button" id = "button" value = "검색" />
				</h3>
			</form>
          </div>
          <div class="content">
