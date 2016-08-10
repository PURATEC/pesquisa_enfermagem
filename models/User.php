<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
    
    public function behaviors() {
        return[
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => function() {
                    return date('Y-m-d H:i:s');
                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password', 'type', 'last_login'], 'required'],
            [['tos', 'active'], 'boolean'],
            [['last_login'], 'safe'],
            [['email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 64],
            [['type'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['person_id'], 'exist', 'skipOnError' => false, 'targetClass' => Person::className(), 
                'targetAttribute' => ['person_id' => 'person_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'ID usuário',
            'person_id' => 'ID pessoa',
            'email' => 'E-mail',
            'password' => 'Senha',
            'type' => 'Tipo de usuário',
            'tos' => 'Termo de consentimento',
            'last_login' => 'Último acesso',
            'active' => 'Estado do usuário',
            'created_at' => 'Data de criação',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'person_id']);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return User::findOne($id);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        
    }
    
    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        
    }
    
    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
    
    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email) 
    {
        // Verifica se a string é um E-mail válido
        if((filter_var($email, FILTER_VALIDATE_EMAIL)) !== false) 
        {
            return User::find()->where(['email' => $email])->one();
        } 
        
        else 
        {
            return null;
        }
    }
    
    /**
     * Send email with user password
     * @param string $email
     * @return email
     */
    public function sendMail($email, $password)
    {
        // Envia um email com o termo de consentimento 
        return Yii::$app->mailer->compose()
        ->setTo($email)
        ->setFrom(Yii::$app->params['adminEmail'])
        ->setSubject('Acesso do usuário')
        ->setHtmlBody(
                '<h3><center>CONVITE<center></h3>
                Ribeirão Preto, julho de 2016</p>
                <h4>Remetentes:</h4>
                <p style="text-align:justify"><strong>Profª Drª Luciana Barizon Luchesi</strong>> (Professora Doutora do Departamento de Enfermagem
                Psiquiátrica e Ciências Humanas da Escola de Enfermagem de Ribeirão Preto, USP, Centro
                Colaborador da OMS para o Desenvolvimento da Pesquisa em Enfermagem, 1ª Vice-
                Presidente da Academia Brasileira de História da Enfermagem (ABRADHENF)
                www.abradhenf.com.br e Líder do Laboratório de Estudos em História da Enfermagem
                (LAESHE- www2.eerp.usp.br/laeshe, luchesi@eerp.usp.br) e <strong>Carla Cristina da Cruz
                Almeida Lima</strong> (Mestranda pela Escola de Enfermagem de Ribeirão Preto, USP- São Paulo,
                Brasil). Telefone para contato 016-3315 0535.</p>

                <h4>Prezado(a) Professor(a) da disciplina ou conteúdo de História da Enfermagem</h4>

                <p style="text-align:justify">Gostaríamos de convidá-lo a participar de nosso estudo titulado <strong>Mudanças
                curriculares no Ensino de História da Enfermagem no Estado de São Paulo.</strong> Trata-se de
                projeto de mestrado, aprovado pelo Comitê de Ética em Pesquisa da Escola de Enfermagem
                de Ribeirão Preto, SP (CEP/EERP-USP), sob número 51719315.4.0000.5393, cujo objetivo é
                traçar o diagnóstico do Ensino de História da Enfermagem, nos currículos de Enfermagem,
                nos cursos de Bacharelado do Estado de São Paulo.
                <p>Se aceitar, sua participação será 100% on-line. Não haverá necessidade de envio de
                documentos em papel, assinaturas, ou encontros presenciais. Essa conduta foi aprovada pelo
                CEP/EERP-USP, em virtude do grande número de Cursos de Enfermagem sorteados para o
                estudo (119 cursos).</p>

                <p style="text-align:justify">Garantimos que seu nome e de sua instituição será mantido em sigilo e que as
                informações obtidas servirão para análise da situação do ensino de História da Enfermagem
                no Estado de São Paulo, e os resultados serão divulgadas na dissertação ora em curso, e em
                aulas, eventos e artigos de cunho científico.</p>

                <p style="text-align:justify">Vossa Senhoria poderá tirar dúvidas ou desistir da participação em qualquer
                momento que desejar, durante o período estabelecido para a coleta (ETAPA 1 – de 16 de
                agosto de 2016 a 16 de outubro de 2016), sem que isso lhe traga prejuízos. Lembramos que a
                participação é voluntária e não acarretará bônus ou ônus de qualquer natureza.</p>

                <p style="text-align:justify">Se Vossa Senhoria não for mais o(a) docente responsável pelo conteúdo de História da
                Enfermagem, pedimos a gentiliza de nos informar, e pedimos desculpas pelo transtorno. O
                seu e-mail foi obtido através de contato telefônico com o coordenador de seu curso, após
                explicação da pesquisa.</p>

                <p style="text-align:justify">A participação do professor da disciplina ou conteúdo de História da Enfermagem
                constará de respostas a um questionário com informações relacionadas ao seu currículo,
                estrutura da disciplina de História de Enfermagem nos currículo da instituição, na qual
                trabalha, e sua experiência como docente dessa disciplina ou conteúdo.</p>

                <p>Nos testes, o tempo necessário para responder ao questionário foi de 15 a 25 min, em
                plataforma on-line. Neste e-mail, Vossa Senhoria está recebendo uma senha de acesso. Para o
                acesso ao questionário, no campo “usuário”, deverá preencher seu e-mail, e no campo “senha”
                copiar a senha enviada no presente e-mail. No sistema deste questionário há a possibilidade de
                salvamento, que permite interromper, temporariamente, o preenchimento do questionário e
                voltar, posteriormente, caso haja alguma intercorrência, sem perder as informações registradas
                anteriormente. O sistema foi desenvolvido por uma empresa com experiência na área e
                inserido mecanismos de bloqueio para que as informações preenchidas sejam visíveis somente
                pelo usuário e pelo pesquisador.</p>

                <p style="text-align:justify">Para facilitar o preenchimento dos dados, nas questões finais, é necessário informar o
                programa da disciplina em que o conteúdo de História da Enfermagem é oferecido e a grade
                curricular do curso de Enfermagem de sua Instituição de Ensino. Recomendamos que tenha
                em arquivo, word ou pdf, a grade curricular do curso de Enfermagem (ou se preferir, somente
                o link do site institucional. Veja exemplo EERP-USP
                https://uspdigital.usp.br/jupiterweb/listarGradeCurricular?codcg=22&amp;codcur=22013&amp;codhab=0&amp;tipo=N ) 
                e do programa da disciplina onde os conteúdos de História da Enfermagem são
                ministrados (ou, se preferir, somente o link do site institucional, onde estão os dados). Os
                dados também poderão ser copiados e colados em local específico. O que for mais prático
                para Vossa Senhoria. Se houver algum problema, Vossa Senhoria também poderá escrever
                uma justificativa nesse campo e entraremos em contato para auxiliar, caso necessário.</p>

                <p style="text-align:justify">Sua participação será fundamental para o entendimento da atual situação do ensino
                do conteúdo de História da Enfermagem no Estado de São Paulo, dando visibilidade e
                fortalecimento aos docentes desse tema.</p>

                <p style="text-align:justify">Em longo prazo, as informações obtidas, além de fundamentarem a dissertação de
                mestrado, servirão de base para o desenvolvimento de proposta de atualização de professores
                de História da Enfermagem.</p>

                <p style="text-align:justify">Em caso de dúvidas, ou qualquer problema com o site, Vossa Senhoria poderá nos
                contatar a qualquer momento. Todos os convidados, independente da participação ou não,
                serão convidados para a defesa pública da dissertação, que deverá ocorrer entre 2017 e 2018,
                com possibilidade, também, de participação on-line em polos que serão divulgados.</p>

                <p style="text-align:justify">As novidades sobre as pesquisas e ensino em História da Enfermagem são
                constantemente publicadas em nosso grupo de pesquisa (www2.eerp.usp.br/laeshe e no
                Facebook no https://www.facebook.com/llaeshe).</p>

                <p style="text-align:justify"><strong>O telefone e o endereço para contato com o Comitê de Ética em Pesquisa da
                EERP-USP, responsável pela aprovação deste estudo, estão disponibilizados, a seguir,
                caso deseje confirmar alguma informação.<strong></p>

                <p style="text-align:justify">Desde já agradecemos sua atenção, colocando-nos novamente à disposição para
                qualquer esclarecimento, ou mesmo solicitação de informações ou dúvidas sobre o tema.</p>' . 
                
                '<p>' . Yii::t('app', 'Acesso a pesquisa:') . '</p>' .
                '<p>E-mail: ' . $email . '</p>' . 
                '<p>Senha: ' . $password . '</p>' . 
                '<p>' . \yii\helpers\Html::a('http://www.rehe.com.br', 
                        \yii\helpers\Url::to(['login'], 'http')) .'</p>' . 

                '<strong><center>Comitê de Ética em Pesquisa da Escola de Enfermagem de Ribeirão Preto – USP</center></strong>
                <strong><center>Horário de funcionamento: de segunda a sexta-feira, das 8 às 17h</center></strong>
                <strong><center>Telefone (16) 3315 9197</center></strong>
                <strong><center>Escola de Enfermagem de Ribeirão Preto – USP</center></strong>
                <strong><center>Avenida Bandeirantes, 3.900 – CEP 14.040-902</center></strong>')
        ->send();
    }
}
