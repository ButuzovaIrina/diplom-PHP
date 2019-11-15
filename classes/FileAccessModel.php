<?php
class FileAccessModel extends Config 
{
    protected $filename;
    protected $file;

    function __construct($filename) 
    {
        $this->filename = parent::DATABASE_PATH . $filename . '.json';
    }

    protected function connect($mode)
    {
        $this->file = fopen($this->filename, $mode);
    }

    protected function disconnect() 
    {
        fclose($this->file);
    }

    public function read() 
    {
        $this->connect("r+");
        $text = fread($this->file, 5000);
        $this->disconnect();
        return $text;
    }

    public function write($text) 
    {
        $this->connect('w+');
        fwrite($this->file, $text);
        $this->disconnect();
    }
}