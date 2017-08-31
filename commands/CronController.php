<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Reservation;
use app\models\SeatReserved;
use Yii;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CronController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {
        date_default_timezone_set("Asia/Ashgabat");
		$h = date('H');
		$m = date('i');
		
		if($m < 10){
			$mi = '0'.$m;
		}else{
			$mi = $m;
		}
		
		if($h < 10){
			
			if($h === 0){
				$hr = 23;
				$date_string = Yii::$app->formatter->asDate('yesterday', 'php:Y-m-d') .' ' .$hr.':'.$mi.':00';
			}else{
				$hr = '0'.($h - 1);
				$date_string = Yii::$app->formatter->asDate('now', 'php:Y-m-d') .' ' .$hr.':'.$mi.':00';
			}
			
		}else{
			$hr = ($h - 1);
			$date_string = Yii::$app->formatter->asDate('now', 'php:Y-m-d') .' ' .$hr.':'.$mi.':00';
		}
		
		
		
		// called every fifteen minutes
        $x = Reservation::find()->where(['paid' => 0, 'active' => 1, 'reserved' => 1])->andWhere(['>', 'reserv_date', $date_string])->all();
		
		echo 'date: ' .$date_string;
		$h_m = ($h * 60) + $m;
		
		
		$size = sizeof($x);
		if($size > 0){
			for($s = 0; $s < $size; $s++){
				$r_h_m = ($x[$s]->reserv_hour * 60) + $x[$s]->reserv_min;
				
				echo ' hour: '.$x[$s]->reserv_hour. ' ';
				echo 'min: '.$x[$s]->reserv_min. ',';
				echo 'hr'.$h .'min'.$m .', ';
				echo $r_h_m;
				
				if(($h_m - $r_h_m) >= 20){
					$seat = Reservation::findOne($x[$s]->id);
					$seat->active = 0;
					$seat->reserved = 0;
					$seat->update();
					
					SeatReserved::deleteAll(['reservation_id' => $seat->id]);
					$r_h_m = 0;
				}
			}
		}
    }
	
}
