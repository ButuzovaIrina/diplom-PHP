<?php 
class User extends DataRecordModel
{
    public $login;
    public $password;
    public $lastName;
    public $firstName;
    public $middleName;
    public $email;
    public $phone;
    public $status;
    
    public function addUserFromForm()
    {
        $this->commit();
    }
    public function showUserForm()
    {
        
    }
   
}