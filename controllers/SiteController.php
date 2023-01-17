<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\ProductForm;
use yii\web\UploadedFile;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goBack();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }



    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goBack();
        }
        return $this->render('register');
    }

    public function actionSignUp()
    {
        $request = Yii::$app->request->post();

        $user = new User();
        $user->attributes = $request;
        $user->password = Yii::$app->getSecurity()->generatePasswordHash($user->password);//Hash password before storing to DB
        $session = Yii::$app->session;

        if($user->validate() && $user->save())
        {
            $session->setFlash('successMessage', 'Registration successful');
            return $this->redirect(['site/login']);
        }

        $session->setFlash('errorMessages', $user->getErrors());
        return $this->redirect(['site/register']);
    }




    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAddproduct()
    {
        if (Yii::$app->user->isGuest) {
            return $this->actionLogin();
        }
        return $this->render('addproduct');
    }


    public function actionPostProduct()
    {
        $model = new ProductForm();

        if ($model->load(Yii::$app->request->post())) {
            // assign user_id from session
            $model->user_id = Yii::$app->user->id;
            // assign created_at and updated_at
            $model->created_at = time();
            $model->updated_at = time();
            if ($model->validate()) {
                // create object of UploadedFile
                $model->product_images = UploadedFile::getInstances($model, 'product_images');
                // check if image is uploaded
                if ($model->product_images && $model->validate()) {
                    // upload the image
                    foreach ($model->product_images as $file) {
                        $file->saveAs('path/to/upload/' . $file->baseName . '.' . $file->extension);
                    }
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
}

}
