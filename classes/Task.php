<?php 
class Task extends DataRecordModel
{
    public $status;
    public $translator;
    public $customer;
    public $languageOrigin;
    public $languageToDo;
    public $deadline;
    public $manager;
    public $userText;
    public $translatedText;

     
    public function addTaskFromForm()
    {
        $this->commit();
    }    
   
}