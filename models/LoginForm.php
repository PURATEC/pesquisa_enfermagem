<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 50],
            [['password'], 'string', 'max' => 64],
            ['password', 'validatePassword'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() 
    {
        return [
            'email' => 'E-mail',
            'password' => 'Senha',
        ];
    }
    
    /**
     * Finds user by email
     *
     * @return User|null
     */
    public function getUser() 
    {
        if ($this->_user === false) 
        {
            $this->_user = User::findByEmail(strtolower($this->email));
        }
        
        return $this->_user;
    }
    
    
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) 
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (isset($user)) 
            {
                // Verifica se o email armazenado é igual ao que foi digitado no campo
                if ($user->email == $this->email) 
                {
                    // Valida a senha
                    if (!$user || !$user->validatePassword(strtolower($this->password))) 
                    {
                        $this->addError($attribute, 'E-mail ou senha incorretos');
                    }
                }
            } 
            
            else 
            {
                $this->addError($attribute, 'E-mail ou senha incorretos');
            }
        }
    }

    /**
     * Logs in a user using the provided email and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login() 
    {
        if ($this->validate()) 
        {
            $user = $this->getUser();
            $userIdentity = Yii::$app->user->login($this->getUser($user));

            if ($user) 
            {
                // Armazena o email em uma sessão antes de logar
                Yii::$app->session->set('user.email', $user->email);
                return $userIdentity;
            }
        
        } 
        
        else 
        {
            return false;
        }
    }
}
