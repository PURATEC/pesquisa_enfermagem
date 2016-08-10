<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "survey".
 *
 * @property integer $survey_id
 * @property string $type
 * @property boolean $active
 */
class Survey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'survey';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['active'], 'boolean'],
            [['type'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'survey_id' => 'Survey ID',
            'type' => 'Type',
            'active' => 'Active',
        ];
    }
    
    /**
     * Send email with conclusion survey message
     * @param string $email
     * @return email
     */
    public function sendMail($email)
    {
        return Yii::$app->mailer->compose(['html' => 'layouts/thanks'])
                ->setTo($email)
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setSubject('Agradecimento pela participação')
                ->send();
    }
}
