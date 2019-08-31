<?php 
	SetCookie("cookie_id","",time(),"/");
	SetCookie("cookie_name","",time(),"/");
	SetCookie("cookie_sid","",time(),"/");
	
	echo '<script language="javascript">';
	echo 'alert("로그아웃 되었습니다.")';
	echo '</script>';

	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
?>