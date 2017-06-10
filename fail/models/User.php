<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_user".
 *
 * @property integer $user_id
 * @property string $email_user
 * @property string $nama_user
 * @property integer $telpon_user
 * @property string $alamat_user
 * @property integer $charge_user
 * @property string $authKey
 * @property string $accessToken
 *
 * @property TabelBarang[] $tabelBarangs
 * @property TabelTransaksi[] $tabelTransaksis
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email_user', 'nama_user', 'telpon_user', 'alamat_user', 'password'], 'required'],
            [['telpon_user', 'charge_user'], 'integer'],
            ['nama_user','unique'],
            [['email_user', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['nama_user'], 'string', 'max' => 90],
            [['alamat_user'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'email_user' => 'Email User',
            'nama_user' => 'Nama User',
            'telpon_user' => 'Telpon User',
            'alamat_user' => 'Alamat User',
            'charge_user' => 'Charge User',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelBarangs()
    {
        return $this->hasMany(TabelBarang::className(), ['id_user_upload' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelTransaksis()
    {
        return $this->hasMany(TabelTransaksi::className(), ['id_user_beli' => 'user_id']);
    }

    public static function findByUsername($username)
    {
        $result = self::find()->where(['nama_user'=>$username])->one();
        return new static($result);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    public function getId()
    {
        return $this->user_id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

     public function getType()
    {
        return $this->Type;
    }

    public function validateType($type)
    {
        return $this->type === $type;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
}
