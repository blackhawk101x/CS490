<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);

$data_Curl=$data;
$data_Curl['set_t']=true;
$data_Curl['user_id']=$_SESSION['id'];

/*
$string = http_build_query($data_Curl);
$ch=curl_init("https://web.njit.edu/~rs334/cs490/beta/draft10.php");
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//echo curl_exec($ch);
$res = curl_exec($ch);
curl_close($ch);

//echo var_dump(json_decode($res));
$mid=get_object_vars(json_decode($res));
*/

$_SESSION['testId']=$mid['testId'];
$_SESSION['testName']=$data['testName'];

//echo json_encode(array('good'=>true));
//echo json_encode($data_Curl);
echo json_encode($mid);
?>