<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <?php
        $session = Yii::$app->session;

        if($session->hasFlash('errorMessage'))
        {
            $errors = $session->getFlash('errorMessage');

            foreach($errors as $error)
            {
                echo "<div class='alert alert-danger' role='alert'>$error[0]</div>";
            }
        }

        if($session->hasFlash('successMessage'))
        {
            $success = $session->getFlash('successMessage');
            echo "<div class='alert alert-primary' role='alert'>$success</div>";
        }
    ?>
    <div class="card-container">
    <?php $form = ActiveForm::begin([
        'action' => ['site/login'],
        'id' => 'login-form',
        'layout' => 'horizontal',
        'options' => ['class' => 'userformdiv'],
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-7 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-7 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>
        <h2>Login</h2>
        <p>Please fill out the following fields to login</p>
        <hr>
        <?= $form->field($model, 'user')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"\">{input} {label}</div>\n<div class=\"\">{error}</div>",
        ]) ?>

        <p style='text-align:center;'>Don't Have an Account? <span><a href="<?= \yii\helpers\Url::to(['/site/register']) ?>">Sign Up</a></span></p>

        <div style="display:flex; justify-content: center;"class="form-group">
            
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary userbutton', 'name' => 'login-button']) ?>
            
        </div>

    <?php ActiveForm::end(); ?>
    </div>

    <div class="offset-lg-1" style="color:#999;">
        <!-- You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br> -->
        <!-- To modify the username/password, please check out the code <code>app\models\User::$users</code>. -->
    </div>
</div>
