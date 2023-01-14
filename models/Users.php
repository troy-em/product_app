<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $user_name
 * @property string $password
 * @property string $auth_key
 * @property string $date_created
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'first_name', 'last_name', 'user_name', 'password', 'auth_key'], 'required'],
            [['user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['user_name', 'auth_key'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'user_name' => Yii::t('app', 'User Name'),
            'password' => Yii::t('app', 'Password'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'date_created' => Yii::t('app', 'Date Created'),
        ];
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }
    public function getId()
    {
        return $this->id;
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
       throw new \yii\base\NotSupportedException();
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findByUsername($user_name){
        return self::findOne(['user_name'=>$user_name]);
    }

    public function validateAuthKey($auth_key)
    {
        return $this->auth_key === $auth_key;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

}
