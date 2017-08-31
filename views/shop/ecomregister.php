<?php
		$uname = "test";
		$pass = "test";
		$amount = 120;
		$failUrl= "http://failurl";
		$sign = sha1("$orderId:$amount:$description:$description:$orderId:$amount");
		$returnUrl = "http://sucessurl";
		
		
		$url = "https://mpi.gov.tm/payment/rest/register.do?currency=934&language=ru&pageView=DESKTOP&description=Toleg&orderNumber=".urlencode($orderId)."&failUrl=".$failUrl."&userName=".urlencode($uname)."&password=".urlencode($pass)."&amount=".urlencode($amount)."&returnUrl=".urlencode($returnUrl.'&sign='.$sign."&origOrderId=".$originalOrderId);
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_FAILONERROR,true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$retValue = curl_exec($ch);          
		curl_close($ch);
		$receivedData = json_decode($retValue,TRUE);
        
        if($receivedData!="")
        {
            //$response_status = $receivedData["errorCode"];
            //$ext_order_id = $receivedData["orderId"];
			//$form_url = $receivedData["formUrl"];
			//Делаешь что-то с заказом
			
		}
?>