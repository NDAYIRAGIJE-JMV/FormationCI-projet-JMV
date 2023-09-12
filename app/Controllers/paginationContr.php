<?php
namespace App\Controllers;
use App\Models\EtudModel;
use App\Models\UtilisateurModel;
class paginationContr extends BaseController
{

  public $model;
 public function __construct(){
 $this->model=new EtudModel();
  }

     function index(){
          $data["client"]=$this->model->paginate(5);
          $data["pager"]=$this->model->pager;
          return view("Paginate.php",$data);
     }
     
}





?>

