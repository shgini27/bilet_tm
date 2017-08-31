<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submittttt', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>



<!-- main body contents starts here-->
<div class="container" style="margin-top: 5%;">
    <section class="contact text-center" id="contact">
        <div class="container" style="margin-top: 4%;">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <i class="fa fa-user-secret"></i> Register<br>
                    Already have an account? Please <a href="login.html">LogIn</a>
                </div>
                <div class="col-md-12 register">
                    <ul>	
                        <li><a href="#"><i class="fa fa-vk"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" id='facebookColor'></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" id='twitterColor'></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" id='googlePlusColor'></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container mx-width">
            <div class="row">
                <div class="done">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        Your information has been sent. Thank you!
                    </div>
                </div>

                <div class="col-md-offset-3 col-md-6">
                    <form id="register-form" method="post" action="register.php" role="form">
                        <fieldset class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-envelope-o"></span>
                                </div>
                                <input class="form-control" id="email" name="email" 
                                       placeholder="E-mail" type="text" required="required"/>
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-user-o"></span>
                                </div>
                                <input class="form-control" id="nickName" name="nickName" 
                                       placeholder="Nick Name" type="text" required/>
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-key"></span>
                                </div>
                                <input class="form-control" id="password" name="password" 
                                       placeholder="Password" type="password" required/>
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-key"></span>
                                </div>
                                <input class="form-control" id="confirmPassword" name="confirmation" 
                                       placeholder="Confirm Password" type="password" required/>
                            </div>
                        </fieldset>

                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <!-- Replace data-sitekey with your own one, generated at https://www.google.com/recaptcha/admin -->
                                <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"></div>
                            </div>
                        </div>

                        <input type="checkbox" name = "remember">
                        <h6>Remember me</h6>

                        <input type="checkbox" name = "signForNews" checked>
                        <h6>Sign up for news</h6>

                        <button type="submit" class="contact submit">Register</button>
                    </form>
                    <div class="pull-left" style="margin-top: 3%;">
                        <i class="glyphicon glyphicon-trash"> 
                            <b>Your e-mail will be protected from third parties.</b>
                        </i>
                    </div>
                </div>
			</div>
        </div>
    </section>

    <hr>
</div> 
<!-- /END OF container ******************************************************-->