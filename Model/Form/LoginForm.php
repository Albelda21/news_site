<?php

namespace Model\Form;

use Library\Request;

class LoginForm
{
    
    public $email;
    public $password;
    
    public function __construct(Request $request)
    {
        $this->password = $request->post('password');
        $this->email = $request->post('email');
        
    }
    
    public function isValid()
    {
       return $this->password != '' && $this->email != '';
    }
    
    public function checkbox($value)
    {
        return $value === 'on';
    }
    
    public function checkboxChecked()
    {
        return $this->publishEmail ? "checked='checked'" : '';
    }
}