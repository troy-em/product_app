<?php

use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;


    $this->title = 'Add Product';
    $this->params['breadcrumbs'][] = $this->title;
?>

<!-- <div class="head-div">
    <h2>Hi <?= Yii::$app->user->identity->user ?>,</h2>
</div> -->

<div class="card-container">
    <?php
        ActiveForm::begin([
            "action" => ["site/post-product"],
            "method" => "post",
            'options' => ['class' => 'formdiv'],
        ]);
    ?>
    <h2>Add Product</h2>
    <p>Fill out your product details</p>
    <hr>
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br>
        <!-- <label for="code">Code:</label>
        <input type="text" id="code" name="code" readonly><br> -->
        <label for="product_category">Product Category:</label>
        <select id="product_category" name="product_category" required>
            <option value="category1">Category 1</option>
            <option value="category2">Category 2</option>
            <option value="category3">Category 3</option>
        </select><br><br>
        <label for="unit_price">Unit Price:</label>
        <span class="currencyinput"
            style="display: inline; background: #f5f5f5;
                border: 1px solid #e5e5e5;
                font-size:.8em;
                padding: .8em .5em;
                border-radius: 5px;">
                $
            <input type="number" id="unit_price" name="unit_price" style="border: 0; display: inline; width: 94%;" required>
        </span>
        <br>
        <label for="selling_price">Selling Price:</label>
        <span class="currencyinput"
            style="display: inline; background: #f5f5f5;
                border: 1px solid #e5e5e5;
                font-size:.8em;
                padding: .8em .5em;
                border-radius: 5px;">
                $
            <input type="number" id="selling_price" name="selling_price" style="border: 0; display: inline; width: 94%;" required>
        </span>
        <br>
        <label for="reorder_level">Reorder Level:</label>
        <input type="number" id="reorder_level" name="reorder_level"><br>
        <label for="product_images">Product Images: <span style="font-size: .8em; font-style: italic;">Atleast 3</span></label>
        <input type="file" id="product_images" name="product_images[]" multiple accept="image/*" required><br>
        <label for="active">Active:</label>
        <label class="switch">
            <input type="checkbox" id="active" name="active" value="1" required>
            <span class="slider round"></span>
        </label>
        <br>
        <div style="display:flex; justify-content: center;"class="form-group">
            <input type="submit" value="Add Product" class="add-button btn-primary btn">
        </div>
        <?php
        ActiveForm::end();
        ?>

</div>
