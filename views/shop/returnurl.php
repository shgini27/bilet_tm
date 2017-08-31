<?php
if(isset($_GET["sign"])&&isset($_GET["orderId"])&&isset$_GET["origOrderId"])){
               
			   
			   //напиши свою логику
               $this->load->model('checkout/order');
               $item = $this->model_checkout_order->getOrder($this->request->get["origOrderId"]);
               $extId = $item["comment"];
               $orderId = $item["order_id"] + $this->config->get('ikgateway_counter');
               $uname = $this->config->get('ikgateway_shop_id');
		       $pass = $this->config->get('ikgateway_sign_hash');
		       $amount = $item['total']*100;
		       $description = 'Toleg';
               
		       $verifySign = sha1("$orderId:$amount:$description:$description:$orderId:$amount");
               if($verifySign==$_GET["sign"])
               {
                    $url = "https://mpi.gov.tm/payment/rest/getOrderStatus.do?userName=$uname&password=$pass&orderId=$extId&language=ru";
	                $ch = curl_init($url);
		            curl_setopt($ch, CURLOPT_FAILONERROR,true);
		            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
		            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		            $retValue = curl_exec($ch);
		            curl_close($ch);
                    if($retValue!=""){
                        $data = json_decode($retValue,true);
		                $OrderStatus = $data["orderStatus"];
		                $ErrorCode = $data["errorCode"];

                        if(($ErrorCode === "0"&&$OrderStatus === "2")||($ErrorCode === 0 && $OrderStatus === 2))
		                {
							//Обрабатываешь заказ успешно
							
                        }else{
							// Заказ не обработан
						}
					}	
			 }
}