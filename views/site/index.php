<?php

/** @var yii\web\View $this */

$this->title = 'Sneakerz';
use yii\bootstrap5\Html;
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">SNEAKERZ</h1>

        <p class="lead">Check Out Our Products</p>
        <h2 class="title  text-center">Featured Items</h2>

    </div>
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <?php
             foreach($products as $product) {
            ?>
            <div class="col-sm-4" style="margin: 1.5em;">
                <div class="product-image-wrapper" >
                    <div class="single-products">
                        <div class="productinfo text-center">
                        <?= Html::img("uploads/{$product->image}", ['alt' => $product->name, 'height' => '300em']) ?>
                        <br>
                        <br>
                        <h2>$ <?= $product->selling_price?></h2>
                            <p><?= $product->name?></p>
                            <a href="http://" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>$ <?= $product->selling_price?></h2>
                                <p><span style="font-size:18px;font-weight: 800; color: #FDD771;"><?= $product->name?></span><br><?= $product->description?></p>
                                <a href="http://" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                    <div class="choose">

                    </div>

                </div>
            </div>
            <?php
             }
            ?>
        </div>
    </div>
</div>
