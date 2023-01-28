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
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?><br>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?><br>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?> <br>

    <?= $form->field($model, 'category')->dropDownList($model->getCategories()) ?> <br>

    <?= $form->field($model, 'unit_price')->textInput() ?>

    <?= $form->field($model, 'selling_price')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'availability')->dropDownList($model->getAvailability()) ?>

    <?= $form->field($model, 'active')->dropDownList($model->getStatus()) ?><br>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'image')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
