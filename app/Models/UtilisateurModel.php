<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'userid';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nom', 'prenom', 'datenaissance', 'phone', 'mail', 'genre', 'usering', 'pswd', 'Token'];

    protected $useTimestamps = true;
    protected $createdField  = 'DateCreation';
    protected $updatedField  = 'DateModification';
    protected $deletedField  = 'DateSuppression';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function verifyPhone($mail)
    {
        $build = $this->db->table('users');
        $build->select('pswd');
        $build->where('phone', $mail);
        $resul = $build->get();
        if (count($resul->getResultArray()) == 1) {
            return $resul->getRowArray();
        } else {
            return false;
        }
    }

    public function verifyEmail($mail)
    {
        $builder = $this->db->table('users');
        $builder->select('pswd');
        $builder->where('mail', $mail);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
            //return true;

        } else {

            return false;
        }
    }
     function get_count(){
            //SQL for Counting rows in a query
            $sql = "SELECT COUNT(userid) as Count FROM  users";

            //Execute the query and assign the result to the $row variable
            $result = $this->db->query($sql);
            $row = $result->getRow();
                      //Get the count from the $row variable and return the result to the caller
                      return $count = $row->Count;     

     }
   
     public function testeSelect($mail)
     {
         $builder = $this->db->table('users');
         $builder->select('*');
         $builder->where('genre', $mail);
         $result = $builder->get();
         if (count($result->getResultArray())>0) {
             return $result->getResult();
          //   return $result->getRowArray();
             
             //return true;
 
            }
         
         else {
 
             return false;
         }
     

}
}

?>
