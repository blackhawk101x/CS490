	<?php
// decoding the JSON file
$data = json_decode(file_get_contents('php://input'), true);

$data_Curl=array('name'=>$data['username'],'pwd'=>$data['password']);

// sending the curl request
$string = http_build_query($data_Curl);
$ch=curl_init("https://web.njit.edu/~rs334/cs490/beta/rimi/draft11.php");
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//echo curl_exec($ch);
$res = curl_exec($ch);
curl_close($ch);

$mid=get_object_vars(json_decode($res));

if($mid['valid']){ // checking to see if it is a valid account
	// starting the session`
	session_start();
	
	// setting the session variables
	$_SESSION['UCID']=$data['username'];
	$_SESSION['valid']=$mid['role'];
	$_SESSION['id']=$mid['id'];
}

//echo json_encode($mid);
echo json_encode(array('valid'=>$mid['valid']));

?>