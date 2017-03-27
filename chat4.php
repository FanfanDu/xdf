<?php
	$name=isset($_GET['name'])?$_GET['name']:'';
	$gender=isset($_GET['gender'])?$_GET['gender']:'';
	$msg=isset($_GET['msg'])?$_GET['msg']:'';

	//获取本机名
	$host_name=exec('hostname');
	//ip
	$pc_ip=gethostbyname($host_name);

	//要添加的数据
	$newobj=array(
		"name"=>$name,
		"gender"=>$gender,
		"createtime"=>time(),
		"content"=>$msg,
		"ipfrom"=>$pc_ip
		);

	//打开读取文件
	$url='../data/chat.json';
	$file=fopen($url,'r');
	$content=fread($file, filesize($url));
	//json字符串转化成数组
	$arr=json_decode($content,true);
	array_push($arr, $newobj);

	//写入
	$file=fopen($url,'w');
	fwrite($file, json_encode($arr,JSON_UNESCAPED_UNICODE));
	echo json_encode($newobj,JSON_UNESCAPED_UNICODE);





?>