<?php

/**
 * @var $this yii\web\View
 * @var $model yeesoft\auth\models\forms\LoginForm
 */
use yeesoft\auth\widgets\AuthChoice;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

    <div id="login-wrapper">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= Yii::t('yee/auth', 'Authorization') ?></h3>
                    </div>
                    <div class="panel-body">

                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => ['autocomplete' => 'off'],
                            'validateOnBlur' => false,
                            'fieldConfig' => [
                                'template' => "{input}\n{error}",
                            ],
                        ])
                        ?>

                        <?= $form->field($model, 'username')->textInput(['placeholder' => $model->getAttributeLabel('username'), 'autocomplete' => 'off']) ?>

                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password'), 'autocomplete' => 'off']) ?>

                        <?= $form->field($model, 'rememberMe')->checkbox(['value' => true]) ?>

                        <?= Html::submitButton(Yii::t('yee/auth', 'Login'), ['class' => 'btn btn-lg btn-primary btn-block']) ?>

                        <div class="row registration-block">
                            <div class="col-sm-12">
                                <?=
                                AuthChoice::widget([
                                    'baseAuthUrl' => ['default/oauth'],
                                    'popupMode' => false,
                                ])
                                ?>
                            </div>
                        </div>

                        <div class="row registration-block">
                            <div class="col-sm-6">
                                <?= Html::a(Yii::t('yee/auth', "Registration"), ['default/signup']) ?>
                            </div>
                            <div class="col-sm-6 text-right">
                                <?= Html::a(Yii::t('yee/auth', "Forgot password ?"), ['default/reset-password']) ?>
                            </div>
                        </div>

                        <?php ActiveForm::end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$css = <<<CSS

#login-wrapper {
	position: relative;
	top: 30%;
}
#login-wrapper .registration-block {
	margin-top: 15px;
}
CSS;

$this->registerCss($css);
?>