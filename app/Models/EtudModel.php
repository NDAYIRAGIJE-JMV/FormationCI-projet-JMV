<?php

namespace App\Models;

use CodeIgniter\Model;

class EtudModel extends Model
{
    protected $table      = 'Client';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['Nom','Prenom','Code','Telephone','Nationalite','City', 'Sex'];

    protected $useTimestamps = true;
    protected $createdField  = 'date_creation';
    protected $updatedField  = 'date_modification';
    protected $deletedField  = 'date_suppression';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    function fetch_data($limit, $start)
    {
        $builder = $this->db->table('Client');
        $builder->select('*');
        $builder->orderBy("ID", "ASC");
        $builder->limit($limit, $start);
        $query = $builder->get();
        return $query;
    }
 function count_mail_not_read(){
        //SQL for Counting rows in a query
        $sql = "SELECT COUNT(matricule) as Count FROM  etudiant
        where read_mail= false";

    //Execute the query and assign the result to the $row variable
      $result = $this->db->query($sql);
       $row = $result->getRow();
   //Get the count from the $row variable and return the result to the caller
     return $count = $row->Count;   
 }

 function datafetch()
 {
     $builder = $this->db->table('Client');
     $builder->select('*');
     $builder->orderBy("ID", "ASC");
     $query = $builder->get();
     return $query->getResult();
 }
}