<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card-container">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'formdiv', 'enctype'=>'multipart/form-data']]
    ); ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <br>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?> <br>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_price')->textInput() ?>

    <?= $form->field($model, 'selling_price')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'availability')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList([1=>'Active', 0=>'Inactive']) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'image')->fileInput() ?> <br>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
