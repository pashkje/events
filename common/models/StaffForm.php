<?php
namespace common\models;

use yii\base\Model;
use common\models\Staff;

class StaffForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $phone;
    public $roles;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Admins', 'message' => 'Такой логин уже существует'],
            ['username', 'string', 'min' => 2, 'max' => 255],            
            
            ['phone', 'trim'],
            ['phone', 'required'],            
            ['phone', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],            

            ['roles', 'required'],
            
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Staff();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->roles = $this->roles;
        $user->phone = $this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
