<?php
// session_start();
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
//     header('Location: login.php');
//     exit();
// }
?>

<h2>Hi <?= Yii::$app->user->identity->user_name ?>,</h2>
<h2><?= Yii::$app->user->identity->password ?></h2>
<form action="add_product.php" method="post">
    <label for="product_name">Product Name:</label>
    <input type="text" id="product_name" name="product_name" required>
    <br>
    <label for="code">Code:</label>
    <input type="text" id="code" name="code" required>
    <br>
    <label for="product_category">Product Category:</label>
    <input type="text" id="product_category" name="product_category" required>
    <br>
    <label for="unit_price">Unit Price:</label>
    <input type="text" id="unit_price" name="unit_price" required>
    <br>
    <label for="selling_price">Selling Price:</label>
    <input type="text" id="selling_price" name="selling_price" required>
    <br>
    <label for="reorder_level">Reorder Level:</label>
    <input type="text" id="reorder_level" name="reorder_level" required>
    <br>
    <label for="active">Active:</label>
    <input type="checkbox" id="active" name="active" value="1">
    <br>
    <input type="submit" value="Add Product" class="p-btn btn-primary btn">
</form>
