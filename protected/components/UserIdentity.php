<?php

class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        // авторизация для админа
        $adminUser=array(
            'admin'=>'GeCc7DtbbA',
        );
        if(isset($adminUser[$this->username]))
        {
            if($adminUser[$this->username]!==$this->password)
            {
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }
            else
            {
                $this->_id=0;
                $this->errorCode=self::ERROR_NONE;
            }

            return !$this->errorCode;
        }

        // авторизация для простых пользователей
        $record=User::model()->findByAttributes(array('email'=>$this->username));
        if($record===null)
        {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
        else if($record->password!==trim($this->password))
        {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else
        {
            $this->_id=$record->id;
            $this->setState('name', $record->name);
            $this->errorCode=self::ERROR_NONE;
        }

        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}