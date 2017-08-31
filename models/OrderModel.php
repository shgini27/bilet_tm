<?php

namespace app\models;

use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class OrderModel
{
    private $name;
    private $email;
	
    private $show_id;
    private $show_name;
    private $show_date;
	private $show_time;
	
    private $cultural_place_id;
    private $cultural_place_category;
	private $place_name;
	
	private $seat_id;
	private $seat_row;
	private $seat_col;
	private $seat_value = array();
	private $rows = array();
	private $cols = array();
	private $sold_seats = array('row', 'col');
	private $auditorium_name;
	private $screening_id;
	
	private $reservation_id;
	private $ticket_id;
	private $ticket_regular_price;
	private $ticket_vip_price;
	private $total_amount;

	public function __construct($show_id, $lang_id){
		
		$this->name = Yii::$app->user->identity->email;
		$this->email = Yii::$app->user->identity->username;
		
		$this->total_amount = 0;
		
		$this->getOrderData($show_id, $lang_id);
	}
	
	private function getOrderData($show_id, $lang_id){
		
		//here we get proper shows*******************************************
		$show = Show::findOne($show_id);
		
		$show_translation = ShowTranslation::find()
												->where(['language_id' => $lang_id, 'show_id' => $show->id])
												->one();
		
		if($show->start_min === 0){
			$min = '00';
		}else{
			$min = $show->start_min;
		}
		
		$this->show_name = $show_translation->show_name;
		$this->show_id = $show->id;
		$this->show_time = $show->start_hour .':'. $min;
		$this->show_date = $show->begin_date;
		
		//here we get all categories with proper values**********************************
		$cultural_place = CulturalPlace::findOne($show->cultural_place_id);
											
		$this->cultural_place_id = $cultural_place->id;
		$this->cultural_place_category = $cultural_place->category_id;
		
		$cultural_place_translation = CulturalPlaceTranslation::find()
																	->where(['language_id' => $lang_id, 'cultural_place_id' => $cultural_place->id])
																	->one();
		
		$this->place_name = $cultural_place_translation->place_name;
		
		
		//*************************SEAT VALUES************************************************
		$auditorium = Auditorium::find()
										->where(['cultural_place_id' => $this->cultural_place_id])
										->all();
		
		$this->auditorium_name = $auditorium[0]->name;
		
		$screening = Screening::find()
									->where(['auditorium_id' => $auditorium[0]->id, 'show_id' => $this->show_id])
									->all();
		
		
		if(sizeof($screening) > 0){
			
			$this->screening_id = $screening[0]->id;
			$reservation = Reservation::find()->where(['screening_id' => $this->screening_id, 'reserved' => 1])->andWhere(['!=', 'active', 0])->all();
			
		}else{
			$this->screening_id = 0;
		}
		
		$seats = Seat::find()
							->where(['auditorium_id' => $auditorium[0]->id])
							->all();
							
		if(sizeof($seats) > 0 and $this->screening_id !== 0){
			
			$this->seat_id = $seats[0]->id;
			$this->seat_row = $seats[0]->row;
			$this->seat_col = $seats[0]->number;
			
			$reserv_size = sizeof($reservation);
			$reserv_ids = array();
			for($r_s = 0; $r_s < $reserv_size; $r_s++){
				array_push($reserv_ids, $reservation[$r_s]->id);
			}
			
			$sold = SeatReserved::find()
										->where(['seat_id' => $this->seat_id, 'screening_id' => $this->screening_id, 'reservation_id' => $reserv_ids])
										->all();
			$sold_size = sizeof($sold);
			if($sold_size > 0){
				
				for($s_s = 0; $s_s < $sold_size; $s_s++){
					array_push($this->rows, $sold[$s_s]->row);
					array_push($this->cols, $sold[$s_s]->colum);
				}
				
				$this->sold_seats['row'] = $this->rows;
				$this->sold_seats['col'] = $this->cols;
			
			}else{
				$this->sold_seats['row'] = 0;
				$this->sold_seats['col'] = 0;
			}
			
		}else{
			$this->seat_id = 0;
			$this->seat_row = 0;
			$this->seat_col = 0;
		}
		
		
		
		//***********************TICKET DATA*************************************
		$ticket = Ticket::find()
								->where(['show_id' => $show_id])
								->one();
		
		if(sizeof($ticket) > 0){
			
			$this->ticket_id = $ticket->id;
			
			
			$ticket_option_data_regular = TicketOptionData::find()
														->where(['ticket_id' => $this->ticket_id, 'ticket_option_id' => 1])
														->one();
			
			
			if($ticket_option_data_regular !== null){
				$this->ticket_regular_price = $ticket_option_data_regular->ticket_price;
			}else{
				$this->ticket_regular_price = 0;
			}
			
			$ticket_option_data_vip = TicketOptionData::find()
														->where(['ticket_id' => $this->ticket_id, 'ticket_option_id' => 2])
														->one();
			
			if($ticket_option_data_vip !== null){
				$this->ticket_vip_price = $ticket_option_data_vip->ticket_price;
			}else{
				$this->ticket_vip_price = 0;
			}
			
		}else{
			$this->ticket_id = 0;
			$this->ticket_regular_price = 0;
			$this->ticket_vip_price = 0;
		}
	}
	
	//getters and setters
	public function getName(){
		return $this->name;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getShowId(){
		return $this->show_id;
	}
	
	public function getShowName(){
		return $this->show_name;
	}
	
	public function getShowDate(){
		return $this->show_date;
	}
	
	public function getShowTime(){
		return $this->show_time;
	}
	
	public function getCulturalPlaceId(){
		return $this->cultural_place_id;
	}
	
	public function getCulturalPlaceCategory(){
		return $this->cultural_place_category;
	}
	
	public function getPlaceName(){
		return $this->place_name;
	}
	
	public function getAuditoriumName(){
		return $this->auditorium_name;
	}
	
	public function getScreeningId(){
		return $this->screening_id;
	}
	
	public function getSeatId(){
		return $this->seat_id;
	}
	
	public function getSeatRow(){
		return $this->seat_row;
	}
	
	public function getSeatCol(){
		return $this->seat_col;
	}
	
	
	public function getSoldSeats(){
		return $this->sold_seats;
	}
	
	public function setSeatValue($seat_row, $seat_col){
		array_push($this->seat_value, $seat_row .\Yii::t('app', 'row') .'-'. $seat_col .\Yii::t('app', 'col'));
		//$this->seat_value = $seat_row .\Yii::t('app', 'row') .'-'. $seat_col .\Yii::t('app', 'col');
	}
	
	public function emptyArray(){
		$this->seat_value = array();
		$this->rows = array();
		$this->cols = array();
	}
	
	public function getSeatValue(){
		return $this->seat_value;
	}
	
	public function setReservationId($reservation_id){
		$this->reservation_id = $reservation_id;
	}
	
	public function getReservationId(){
		return $this->reservation_id;
	}
	
	public function setTotalAmount(){
		$this->total_amount = sizeof($this->seat_value) * $this->ticket_regular_price;
	}
	
	public function getTotalAmount(){
		return $this->total_amount;
	}
	
	public function getTicketId(){
		return $this->ticket_id;
	}
	
	public function getRegularPrice(){
		return $this->ticket_regular_price;
	}
	
	public function getVipPrice(){
		return $this->ticket_vip_price;
	}
	
}
