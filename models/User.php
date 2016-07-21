<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property integer $person_id
 * @property string $email
 * @property string $password
 * @property string $type
 * @property boolean $tos
 * @property string $last_login
 * @property boolean $active
 * @property string $created_at
 *
 * @property Person $person
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'email', 'password', 'type', 'last_login', 'created_at'], 'required'],
            [['person_id'], 'integer'],
            [['tos', 'active'], 'boolean'],
            [['last_login', 'created_at'], 'safe'],
            [['email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 64],
            [['type'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'person_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'person_id' => 'Person ID',
            'email' => 'Email',
            'password' => 'Password',
            'type' => 'Type',
            'tos' => 'Tos',
            'last_login' => 'Last Login',
            'active' => 'Active',
            'created_at' => 'Created At',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return User::findOne($id);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'person_id']);
    }
}
