<?php
	session_start();
	$username=isset($_GET['username'])?$_GET['username']:'';
	$action=isset($_GET['action'])?$_GET['action']:'';
	$gender=isset($_GET['gender'])?$_GET['gender']:'';
	if($action=='login'){
		$_SESSION['username']=$username;
		$_SESSION['gender']=$gender;
		echo 'login';
	}else if($action=='logout'){//若为退出状态，销毁数据
		session_destroy();
		echo 'logout';
	}else{
		$username=isset($_SESSION['username'])?$_SESSION['username']:'';
		$gender=isset($_SESSION['gender'])?$_SESSION['gender']:'';
		//判断session里的值是否为空，若不为空，则返回里面的值
		if($username&&$gender){
			$arr=array(
				'username'=>$_SESSION['username'],
				'gender'=>$_SESSION['gender']
				);
			echo json_encode($arr,JSON_UNESCAPED_UNICODE);

		}else{//若为空则返回
			echo '';

		}
		

	}



?>