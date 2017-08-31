<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\OrderModel;
use app\models\SeatForm;
use app\models\Reservation;
use app\models\SeatReserved;
use app\models\TicketHasOrder;
use app\models\Ticket;
use app\models\Order;

class ShopController extends \yii\web\Controller
{
    public function actionBuyTicket()
    {
		$this->setLanguage();
		
		if(Yii::$app->session->get('order') !== null){
			Yii::$app->session->remove('order');
		}
		
		$lang_id = Yii::$app->session->get('langId');
				
		//here we get id's of current category
		$show_id = Yii::$app->request->get('id');
		
		
		$order = new OrderModel($show_id, $lang_id);
		
		Yii::$app->session->set('order', $order);
		
		//here we render the view and pass data
        return $this->render('buy-ticket');
    }

	/**
     * Display seat selection view and get price.
     *
     */
	public function actionSeat()
    {
		//here we set language code and get it from session
		$this->setLanguage();
		$order = Yii::$app->session->get('order');
		
		if (Yii::$app->request->post()) {
			
			$model = Yii::$app->request->post('SeatForm');
			
			
			date_default_timezone_set("Asia/Ashgabat");
			
			$reserv = new Reservation();
			
			$reserv->reservation_type_id = 1;
			$reserv->user_id = 1;
			$reserv->screening_id = $order->getScreeningId();
			$reserv->reserved = 1;
			$reserv->ext_order_id = 'a-1';
			$reserv->paid = 0;
			$reserv->active = 1;
			$reserv->reserv_hour = date('H');
			$reserv->reserv_min = date('i');
			
			$reserv->save();
			$order->setReservationId($reserv->id);//we set here reservation_id for order, so later we can find and update paid value
			
			
			$rsrvd = Reservation::find()->where(['screening_id' => $order->getScreeningId(), 'reserved' => 1])->all();
			$rsrvd_size = sizeof($rsrvd);
			$rsrvd_ids = array();
			for($rsr = 0; $rsr < $rsrvd_size; $rsr++){
				array_push($rsrvd_ids, $rsrvd[$rsr]->id);
			}
			
			$check_seat = SeatReserved::find()->where(['screening_id' => $order->getScreeningId(), 'reservation_id' => $rsrvd_ids])->all();
			
			$selected_seat_size = sizeof($model['seats2']);
			for($m = 0; $m < $selected_seat_size; $m++){
				$row = substr($model['seats2'][$m], 0, strpos($model['seats2'][$m], '/'));
				$col = substr($model['seats2'][$m], (strlen($row) + 1));
				
				if($model['seats2'][$m] > 0){
					
					$checked_row = $row;
					$checked_col = $col;
					
					$check_seat_size = sizeof($check_seat);
					for($c_s = 0; $c_s < $check_seat_size; $c_s++){
						if($check_seat[$c_s]->row === intval($row) and $check_seat[$c_s]->colum === intval($col)){
							$checked_row = -1;
							$checked_col = -1;
						}
					}
					
					if($checked_row !== -1 and $checked_col !== -1){
						$seat_reserverd = new SeatReserved();
				
						$seat_reserverd->reservation_id = $reserv->id;
						$seat_reserverd->screening_id = $order->getScreeningId();
						$seat_reserverd->seat_id = $order->getSeatId();
						$seat_reserverd->row = $row;
						$seat_reserverd->colum = $col;
							
						$seat_reserverd->save();
							
						$order->setSeatValue($row, $col);
					}
				}
			}
			$order->setTotalAmount();
			
			if($order->getTotalAmount() > 0){
				
				return $this->render('seat2');
			}else{
				
				$model = new SeatForm();
			
				$error = true;
				//here we render the view and pass data
				return $this->render('seat', ['model' => $model, 'error' => $error]);
			}
            
        }else{
			$model = new SeatForm();
			
			$error = false;
			//here we render the view and pass data
			return $this->render('seat', ['model' => $model, 'error' => $error]);
		}
		
		
    }
	
	/**
     * Display seat selection view and get price.
     *
     */
	public function actionCheckout()
    {
		//here we set language code and get it from session
		$this->setLanguage();
		
		$lang_id = Yii::$app->session->get('langId');
		
		//get order from session
		$order = Yii::$app->session->get('order');
		
		
		if($lang_id === 1){
			$lang = 'ru';
		}else{
			$lang = 'tk';
		}
		
		$uname = Yii::$app->params['user'];
		$pass = Yii::$app->params['password'];
		$orderId = $order->getReservationId();// (reservation table's paid amount set to 0, after succesifully payment just update table and set paid value to 1, then isnsert original order)
		$amount = $order->getTotalAmount() * 100;//120(amoutn should be in tenne, so * amount with 100)
		$description = 'Payment';
		$failUrl= Yii::$app->urlManager->createAbsoluteUrl(['shop/fail']);//url that will be acie if payment is not successed
		//$sign = sha1("$orderId:$amount:$description:$description:$orderId:$amount");
		$returnUrl = Yii::$app->urlManager->createAbsoluteUrl(['shop/payed']);//url to redirect user after payment was made successfully
		
		$url = "https://mpi.gov.tm/payment/rest/register.do?currency=934&language=$lang&pageView=DESKTOP&description=Toleg&orderNumber=".urlencode($orderId)."&failUrl=".$failUrl."&userName=".urlencode($uname)."&password=".urlencode($pass)."&amount=".urlencode($amount)."&returnUrl=".urlencode($returnUrl);
		
		//$url = "http://192.168.50.116:8085/home/register?currency=934&language=$lang&pageView=DESKTOP&description=Toleg&orderNumber=".urlencode($orderId)."&failUrl=".$failUrl."&userName=".urlencode($uname)."&password=".urlencode($pass)."&amount=".urlencode($amount)."&returnUrl=".urlencode($returnUrl);//.'&sign='.$sign;//."&origOrderId=".$originalOrderId);
		
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_FAILONERROR,true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$retValue = curl_exec($ch);          
		curl_close($ch);
		
        
        if($retValue !== null or $retValue !== "")
        {
			$receivedData = json_decode($retValue,TRUE);
			//return $this->render('fail', ['received_data' => $receivedData]);
            $response_status = $receivedData["errorCode"];
            if($response_status === 5 or $response_status === '5'){
				
				return $this->render('fail', ['response_status' => $response_status]);
			}else{
				$ext_order_id = $receivedData["orderId"];
				$form_url = $receivedData["formUrl"];
				$reserve = Reservation::findOne($orderId);
				$reserve->ext_order_id = $ext_order_id;
				$reserve->update();
				
				//redirect client to fill up form for a payment
				return $this->redirect($form_url);
			}
			
			
		}else{
			//here we render the view and pass data
			return $this->render('fail', ['response_status' => 100]);
		}
    }
	
	/**
     * Display seat selection view and get price.
     *
     */
	public function actionPayed()
    {
		//here we set language code and get it from session
		$this->setLanguage();
		$lang_id = Yii::$app->session->get('langId');
		if($lang_id === 1){
			$lang = 'ru';
		}else{
			$lang = 'tk';
		}
		
		$order_id = Yii::$app->request->get('orderId');
		$uname = Yii::$app->params['user'];
		$pass = Yii::$app->params['password'];
		
		$rsrv = Reservation::find()->where(['ext_order_id' => $order_id])->one();
		
		//return $this->render('payed', ['orderId' => $order_id]);
		//$verifySign = sha1("$order_id:$amount:$description:$description:$order_id:$amount");
        if($rsrv->ext_order_id === $order_id){
            $url = "https://mpi.gov.tm/payment/rest/getOrderStatus.do?userName=$uname&password=$pass&orderId=$order_id&language=$lang";
	        //$url = "http://192.168.50.116:8085/home/getOrderStatus?userName=$uname&password=$pass&orderId=$order_id&language=$lang";
			
			$ch = curl_init($url);
		    curl_setopt($ch, CURLOPT_FAILONERROR,true);
		    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		    $retValue = curl_exec($ch);
		    curl_close($ch);
            
			if($retValue !== null or $retValue !== ""){
                $data = json_decode($retValue,true);
		        $orderStatus = $data["orderStatus"];
		        $errorCode = $data["errorCode"];
				$orderNumber = $data["orderNumber"];
				$amount = $data["amount"]/100;
				
                if(($errorCode === "0" and $orderStatus === "2")or($errorCode === 0 and $orderStatus === 2)){
					//Обрабатываешь заказ успешно
					
					//$approval_code = $data['approvalCode'];
					//$amount = $data['Amount'] / 100;//devide to 100 so we will get manat
					$order_model = Yii::$app->session->get('order');
					
					$ticket_count = sizeof($order_model->getSeatValue());
					
					$ordr = new Order();
					$ordr->user_id = 1;//Yii::$app->user->getId();
					$ordr->show_id = $order_model->getShowId();
					$ordr->ticket_count = $ticket_count;
					$ordr->amount = $amount;
					$ordr->confirmation_number = $order_id;
					$ordr->save();
					
					$rsrv->paid = 1;
					$rsrv->update();
					
					//insert row to ticket_has_order..........(ticket_id, order_id, seat_reserved_id)
					$seat_reserverd = SeatReserved::find()->where(['reservation_id' => $rsrv->id])->all();
					$ticket = Ticket::findOne($ordr->show_id);
					
					$seat_size = sizeof($seat_reserverd);
					if($seat_size > 0){
						for($s_s = 0; $s_s < $seat_size; $s_s++){
							$ticket_has_order = new TicketHasOrder();
							$ticket_has_order->ticket_id = $ticket->id;
							$ticket_has_order->order_id = $ordr->id;
							$ticket_has_order->seat_reserved_id = $seat_reserverd[$s_s]->id;
							$ticket_has_order->save();
						}
					}
					
					if(Yii::$app->session->get('order') !== null){
						Yii::$app->session->remove('order');
					}
					
					//here we render the view and pass data
					return $this->render('payed');
							
                }else{
					// Заказ не обработан
					
					$reserv->reserved = 0;
					$rsrv->paid = 0;
					$reserv->active = 0;
					$rsrv->update();
						
					SeatReserved::deleteAll(['reservation_id' => $rsrv->id]);
					
					
					if(Yii::$app->session->get('order') !== null){
						Yii::$app->session->remove('order');
					}
		
					//here we render the view and pass data
					return $this->render('fail');
				}
			}	
		}
    }
	
	
	/**
     * Display seat selection view and get price.
     *
     */
	public function actionFail()
    {
		//here we set language code and get it from session
		$this->setLanguage();
		
		//here we render the view and pass data
        return $this->render('fail');
    }
	
	
	/**
     * Display seat selection view and get price.
     *
     */
	public function actionSuccess()
    {
		//here we set language code and get it from session
		$this->setLanguage();
		
		//here we render the view and pass data
        return $this->render('success');
    }
	
	/**
     * Sets display Language.
     *
     */
    public function setLanguage(){
	
		if(Yii::$app->session->has('lang')){
			if(Yii::$app->session->get('lang') === 'RU'){
				Yii::$app->language = 'ru-RU';
			}else{
				Yii::$app->language = 'tk-TKM';
			}
		}else{
			Yii::$app->language = 'ru-RU';
			Yii::$app->session->set('langId', '1');
		}
    }
}
