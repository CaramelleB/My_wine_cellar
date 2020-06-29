<?php

namespace App\Model;

class WineModel extends Model{

      
    protected $limit;
    protected $actual;
    protected $nb_wines;


    public function all()
    {
        $all =  $this->db->query('
            SELECT * FROM wine 
            INNER JOIN wine_year 
            ON wine.year_id = wine_year.id 
            ORDER BY wine.id 
        ');
        return $all;
    }

  
    /**
     * @return array
     */
    public function slider()
    {
        $limit = 1;
        $total_return=$this->db->query('SELECT COUNT(*) AS total FROM wine'); 
        $r = $total_return[0];
        $total=$r->{'total'}; 
        $nb_wines=ceil($total/$limit);   
        if(isset($_GET['id']))
        {
            $actual=intval($_GET['id']);
            if($actual>$nb_wines) 
            {
                $actual=$nb_wines;
            }
        }
        else
        {
            $actual=1;  
        }        
        $firstEntry=($actual-1)*$limit; 
        $wineQuery=$this->db->query('
            SELECT * FROM wine 
            INNER JOIN wine_year 
            ON wine.year_id = wine_year.id 
            ORDER BY wine.id DESC LIMIT 
            '.$firstEntry.', '.$limit.'
        ');
        if($actual == 1)
        {  
           $prev = $nb_wines;
           $next = $actual + 1;
        } elseif($actual==$nb_wines)
        { 
            $prev = $actual - 1;
            $next = 1;
        } else 
        {
            $prev = $actual - 1;
            $next = $actual + 1;
        }
        $magic = rand(1,$nb_wines);  
        $buttons = [
            (object)[
                "prev" => (int)$prev,
                "next" => (int)$next,
                "magic" => $magic
            ]
        ];
        $wineReturn = [];
        $wineReturn['wine'] = $wineQuery;
        $wineReturn['buttons'] = $buttons;
        return $wineReturn;
    }
    
    
    public function stock($action, $value, $wineId, $stock)
    {
        $attributes = [];
        if($action == 'add')
        {
            $newStockValue = $stock + $value;
        }elseif($action == 'remove')
        {
            $newStockValue = $stock - $value;
        }
        $attributes[] = $newStockValue;
        $attributes[] = $wineId;
        $wine = $this->db->prepare("UPDATE wine SET number = ? WHERE id = ?", $attributes, true);
        return $wine;
    }
    
    public function delete($wineId)
    {
        $attributes[] = $wineId;
        $wine = $this->db->prepare("DELETE FROM wine WHERE id = ?", $attributes, true);
        return $wine;
    }

    public function add($wineInfo)
    {
        $sql_parts = [];
        $attributes = [];
        foreach($wineInfo as $k => $v)
        {
            $sql_parts[] = "$k = ?";
            $attributes[] = strip_tags($v);
        }
        $sql_part = implode(', ', $sql_parts);
        $results = $this->db->prepare("INSERT INTO wine SET $sql_part", $attributes, true);
        return $results;
    }

    public function yearId($year)
    {
        $yearExist = $this->db->prepare('SELECT ID FROM wine_year WHERE wine_year = ?', [$year], null, true);
        if($yearExist)
        {
            $yearId = $yearExist->ID;
        }else
        {
            $attributes[] = $year;
            $newYear = $this->db->prepare('INSERT INTO wine_year SET wine_year = ?', $attributes, true);
            $yearId = $this->db->lastInsertId();
        }
        return $yearId;
    }
   

}