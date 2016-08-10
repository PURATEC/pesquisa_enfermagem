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
            ->setHtmlBody('     
                <h1>AGRADECIMENTO PELA PARTICIPAÇÃO</h1>
                <p>Gostaríamos de agradecer a sua valiosa participação em nosso estudo intitulado
                <h3>Mudanças curriculares no Ensino de História da Enfermagem no Estado de São Paulo.</h3></p>
                <p>Continuamos à sua disposição para informações sobre a pesquisa ou sobre
                materiais/pesquisas ou ensino de História da Enfermagem pelo e-mail e telefone informados.</p>
                <p>Quando houver a defesa da dissertação, será encaminhado convite ao seu e-mail, caso
                haja interesse em participar presencialmente ou nos polos virtuais que serão divulgados.</p>
                <p>As novidades sobre as pesquisas e ensino em História da Enfermagem são
                constantemente publicadas em nosso grupo de pesquisa (www2.eerp.usp.br/laeshe e no
                Facebook no https://www.facebook.com/llaeshe). A partir de meados de setembro a evolução
                da presente pesquisa (quantidade de participantes, metas etc.) também será publicada.</p>
                <p>Após análise dos resultados e defesa da dissertação, espera-se que possamos realizar
                curso de capacitação e/ou atualização para o ensino de História da Enfermagem. Todos os
                desdobramentos ligados ao projeto serão informados a V.S.ª, com possibilidade de pedir
                remoção da lista de e-mails se assim o desejar.</p>
                <br>
                Atenciosamente,
                <br>
                <p><h3>Remetentes: Profª Drª Luciana Barizon Luchesi</h3> (Professora Doutora do Departamento de
                Enfermagem Psiquiátrica e Ciências Humanas da Escola de Enfermagem de Ribeirão Preto,
                USP, Centro Colaborador da OMS para o Desenvolvimento da Pesquisa em Enfermagem, 1ª
                Vice-Presidente da Academia Brasileira de História da Enfermagem (ABRADHENF)
                www.abradhenf.com.br e Líder do Laboratório de Estudos em História da Enfermagem
                (LAESHE- www2.eerp.usp.br/laeshe). luchesi@eerp.usp.br) e <h3>Carla Cristina da Cruz
                Almeida Lima</h3> ( Mestranda pela Escola de Enfermagem de Ribeirão Preto, USP- São Paulo,
                Brasil).</p>
                <p>Telefone para contato 016-3315 0535.</p>')
            ->send();
    }
}
