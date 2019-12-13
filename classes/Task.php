<?php 
class Task extends DataRecordModel
{
    public $status;
    public $customer;
    public $languageOrigin;
    public $languageToDo;
    public $userFile;
    public $taskName;
    public $deadline;
     
    public function addTaskFromForm()
    {
        $this->commit();
    }    
   
}