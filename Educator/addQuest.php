<?php
session_Start();
$data = json_decode(file_get_contents('php://input'), true);

$testId=$_SESSION['testId'];

$data_Curl=$data;
$data_Curl['testId']=$_SESSION['testId'];
$data_Curl['user_id']=$_SESSION['id'];	

//curl Request

$string = http_build_query($data_Curl);
//$ch=curl_init("https://web.njit.edu/~rs334/cs490/beta/rimi/questions/test01.php");
//$ch=curl_init("https://web.njit.edu/~rs334/cs490/beta/rimi/questions/test02.php");
$ch=curl_init("https://web.njit.edu/~rs334/cs490/beta/rimi/questions/test06a.php");
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//echo curl_exec($ch);
$res = curl_exec($ch);
curl_close($ch);

//echo json_encode($data_Curl);
$mid=get_object_vars(json_decode($res));

echo json_encode($mid);

?>