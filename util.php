<?
	function dbconnect($host, $id, $pass, $db){
		$connect = mysqli_connect($host, $id, $pass);
		mysqli_select_db($db);
		return $connect;
	}
	
	function msg($msg){
		echo"
		<script>
			windows.alert('$msg');
			history.go(-1);
		</script>";
		exit;
	}
	
	function s_msg($msg){
		echo "
		<script>
			windows.alert('$msg');
		</script>
		";
	}
	
	function check_pass($pass, $c_pass){
		
		$ret = strcmp($pass, $c_pass);
		return $ret;
	}
?>