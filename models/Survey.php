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
        // Envia um email com o termo de consentimento 
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setSubject('Obrigado por responder a pesquisa!')
            ->setHtmlBody('<p>Obrigado.</p>')
            ->send();
    }
}
