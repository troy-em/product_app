<?php 
 use yii\widgets\ActiveForm;
 use yii\bootstrap5\Html;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <?php
        $session = Yii::$app->session;
        $errors = $session->getFlash('errorMessages');
        $success = $session->getFlash('successMessage');
        if(isset($errors) && (count($errors) > 0))
        {
            foreach($session->getFlash('errorMessages') as $error)
            {
                echo "<div class='alert alert-danger' role='alert'>$error[0]</div>";
            }
        }

        if(isset($success))
        {
            echo "<div class='alert alert-success' role='alert'>$success</div>";
        }
    ?>

    <div class="card-container">
        <?php
        ActiveForm::begin([
            "action" => ["site/sign-up"],
            "method" => "post",
            'options' => ['class' => 'userformdiv'],
        ]);
        ?>
            <h2>Register</h2>
            <hr>
            <br>
            <div class="mb-4">
                <label class="form-label">Full Name</label>
                <input type="text" name="user" placeholder="Enter Full Name"  required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" placeholder="Enter Email"  required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" placeholder="Create Strong Password"  required>
                <br>
                <br>
                <p style='text-align:center;'>Already Have an Account? <span><a href="<?= \yii\helpers\Url::to(['/site/login']) ?>">Login</a></span></p>
            </div>
            <div style="display:flex; justify-content: center;"class="form-group">
                <button type="submit" class="regbutton btn btn-primary">Register</button>
            </div>

        <?php
        ActiveForm::end();
        ?>
    </div>
</body>
</html>
