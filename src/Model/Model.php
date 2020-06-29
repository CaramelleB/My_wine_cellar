<?php
namespace App\Model;

use App\Database\Database;

class Model
{

    protected $model;
    protected $db;
    
    public function __construct(Database $db)
    {
        $this->db = $db;
        if (is_null($this->model)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->model = strtolower(str_replace('Model', '', $class_name)) . 's';       
        }
    }
    
}