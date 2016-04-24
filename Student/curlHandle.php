<?php
function curlCall($path,$data){
		$string = http_build_query($data);
		$ch=curl_init($path);
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$string);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		//echo curl_exec($ch);
		$res = curl_exec($ch);
		curl_close($ch);
		//echo var_dump(json_decode($res));
		//echo "Hello";
		$mid = json_decode($res);
		return $mid;
}

?>