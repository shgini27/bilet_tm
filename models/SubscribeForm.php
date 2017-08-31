<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Subscribe is the model behind the sign up for subscribe.
 */
class SubscribeForm extends Model
{
	/** @var string */
    public $viewPath = '@app/views/mail';
	
	public $sender;
	
    public $email;
	public $agree = true;
    public $subject;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['email'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
    }


	/**
     * @return string
     */
    public function getWelcomeSubject()
    {
        if ($this->subject == null) {
            $this->setWelcomeSubject(Yii::t('app', 'Welcome, BiletTm'));
        }

        return $this->subject;
    }
	
	/**
     * @param string $welcomeSubject
     */
    public function setWelcomeSubject($welcomeSubject)
    {
        $this->subject = $welcomeSubject;
    }
	
    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function subscriberContact($view)
    {
        if ($this->validate()) {
			
			$mailer = Yii::$app->mailer;
			$mailer->viewPath = $this->viewPath;
			$mailer->getView()->theme = Yii::$app->view->theme;
			
			if ($this->sender === null) {
            $this->sender = isset(Yii::$app->params['adminEmail']) ?
                Yii::$app->params['adminEmail']
                : 'no-reply@example.com';
			}
			
			$this->subject = $this->getWelcomeSubject();
			
            Yii::$app->mailer->compose(['html' => $view, 'text' => 'text/' . $view])
                ->setTo($this->email)
                ->setFrom($this->sender)
                ->setSubject($this->subject)
                ->send();

            return true;
        }
        return false;
    }
}
