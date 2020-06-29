<?php

namespace App\Controller;

use \App\Model\LoginModel;
use \App\App;

class WinesController extends Controller{

    
    public function __construct()
    {
        parent::__construct();
        $user = new LoginModel(App::getInstance()->getDb());
        if(!$user->logged())
        {
            $this->forbidden();
        }
        $this->loadModel('Wine');
    }

    public function index()
    {
        $wines = $this->Wine->all();
        $this->render('all', compact('wines'));
    }

    public function stock()
    {
        if (isset($_POST['stock-select'])) {
            $action = $_POST['action'] ;
            $value = ($_POST['stock-select']);
            $wineId= $_GET['id'];
            $stock= $_GET['stock'];
            $wines = $this->Wine->stock($action, $value, $wineId, $stock);
        }
        header('Location: index.php?url=wines.index');
    }

    public function delete()
    {
        if (isset($_POST['delete']))
        {
            $wineId= $_GET['id'];       
            $wines = $this->Wine->delete($wineId); 
        }
        header('Location: index.php?url=wines.index');       
    }

    public function add()
    {
        $errors = '';
        if (isset($_POST['add']))
        {
            $name = $_POST['name'];
            $country = $_POST['country'];
            $region = $_POST['region'];
            $grape = $_POST['grape'];
            $description = $_POST['description'];
            $year = $_POST['year'];
            $nb = $_POST['nb'];
            if(empty($name) || empty($country) || empty($region) || empty($grape) || empty($description) || empty($year) || empty($nb))
            {
                $errors .= 'Merci de compléter tous les champs';
            }
            elseif(intval($year) < intval(1970) || intval($year) > intval(date('Y')))
            {
                $errors .= 'Merci de mettre une date valide';
            }
            else 
            {
                if (isset($_FILES['picture']) AND $_FILES['picture']['error'] == 0)
                {
                    if ($_FILES['picture']['size'] <= 1000000)
                    {
                        $infosfile = pathinfo($_FILES['picture']['name']);
                        $extension_upload = $infosfile['extension'];
                        $extensions_autorisation = array('jpg', 'jpeg', 'gif', 'png');
                        if (in_array($extension_upload, $extensions_autorisation))
                        {
                            move_uploaded_file($_FILES['picture']['tmp_name'], 'img/' . basename($_FILES['picture']['name']));
                            $picture = $_FILES['picture']['name'];
                        }
                    }
                } 
                else
                {       
                    $picture = 'generic.png';
                }
                $yearId = $this->Wine->yearId(strval($year));
                $newWine = $this->Wine->add([
                            'name' => $name,
                            'year_id' =>  $yearId,
                            'grape' => $grape,
                            'country' => $country,
                            'region' => $region,
                            'description' => $description,
                            'picture' => $picture,
                            'number' => $nb       
                ]);
                if($newWine)
                {
                    header('Location: index.php?url=wines.index');   
                }
            }
        }    
        $this->render('add', compact('errors'));  
    }
}