<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{

function get_count(){
        //SQL for Counting rows in a query
        $sql = "SELECT COUNT(ID) as Count FROM users
        ";
    //Execute the query and assign the result to the $row variable
      $result = $this->db->query($sql);
       $row = $result->getRow();
   //Get the count from the $row variable and return the result to the caller
     return $count = $row->Count;   
 }
 function mail_Read(){
 
    $sql = "SELECT COUNT(ID) as Count FROM messages
    where read_mail= false";
  $result = $this->db->query($sql);
   $row = $result->getRow();
 return $count = $row->Count;   
}

function users_recent(){
 $builder = $this->db->table('users');
 $builder->select('Nom');
 $builder->orderBy("Create_at", "DESC");
 $builder->limit(5);
 $query = $builder->get();
 return $query;
}
function messages_recent(){
  /*$sql="SELECT Nom ,messages.Create_at,Body from messages,users 
  WHERE messages.FromA=users.ID
  ORDER BY messages.Create_at DESC LIMIT 5";*/
  $builder = $this->db->table('users');
  $builder->select('*');
  $builder->JOIN('messages',"messages.FromA=users.ID");
  $builder->orderBy("messages.Create_at", "DESC");
  $builder->limit(5);
  $query = $builder->get();
  return $query;
}
function video_recent(){
  $builder = $this->db->table('posts');
  $builder->select('*');
  $builder->orderBy("Created_at", "DESC");
  $builder->limit(5);
  $query = $builder->get();
  return $query;
 }

 function get_countVideo(){
    //SQL for Counting rows in a query
    $sql = "SELECT COUNT(ID) as Count FROM posts
    ";
//Execute the query and assign the result to the $row variable
  $result = $this->db->query($sql);
   $row = $result->getRow();
//Get the count from the $row variable and return the result to the caller
 return $count = $row->Count;   
}

public function Estime(){

$sql="SELECT MONTH(CURRENT_TIMESTAMP)";
$result = $this->db->query($sql);
$row = $result->getRow();

$tab = array(array(1,1,31) ,array(2,1,29),array(3,1,31),
       array(4,1,30),array(5,1,31),(array(6,1,30)),
       array(7,1,31) ,array(8,1,31),array(9,1,30),
       array(10,1,31),array(11,1,30),(array(12,1,31)));
       foreach($row  as $month){
       $debut;
       $fin;
       $tabstat=[];
       switch($month){

             case 1:
             $debut=$tab[0][1].'/1/2022' ; 
             $fin=$tab[0][2].'/1/2022';
             $nomb=$tab[0][2];
           
             break;
             case 2:
             $debut=$tab[1][1].'/2/2022' ; 
             $fin=$tab[1][2].'/2/2022';
             $nomb=$tab[1][2];

             break;
             case 3:
             $debut=$tab[2][1].'/3/2022' ; 
             $fin=$tab[2][2].'/3/2022';
             $nomb=$tab[2][2];
             $this->session->set('nombre',$nomb); 
             break;
             case 4:
                $debut=$tab[3][1].'/4/2022' ; 
                $fin=$tab[3][2].'/4/2022';
                $nomb=$tab[3][2];
               
                break;
                case 5:
                $debut=$tab[4][1].'/5/2022' ; 
                $fin=$tab[4][2].'/5/2022';
                $nomb=$tab[4][2];

                break;
                case 6:
                $debut=$tab[5][1].'/6/2022' ; 
                $fin=$tab[5][2].'/6/2022';
                $nomb=$tab[5][2];
              
                break;
                case 7:
                    $debut=$tab[6][1].'/7/2022' ; 
                    $fin=$tab[6][2].'/7/2022';
                    $nomb=$tab[6][2];
                   
                    break;
                    case 8:
                    $debut=$tab[7][1].'/8/2022' ; 
                    $fin=$tab[7][2].'/8/2022';
                    $nomb=$tab[7][2];
                     
                    break;
                    case 9:
                    $debut=$tab[8][1].'/9/2022' ; 
                    $fin=$tab[8][2].'/9/2022';
                    $nomb=$tab[8][2];
                  
                    break;
                    case 10:
                       $debut=$tab[9][1].'/10/2022' ; 
                       $fin=$tab[9][2].'/10/2022';
                       $nomb=$tab[9][2];
                      
                       break;
                       case 11:
                       $debut=$tab[10][1].'/11/2022' ; 
                       $fin=$tab[10][2].'/11/2022';
                       $nomb=$tab[10][2];
                  
                       break;
                       case 12:
                       $debut='2022/12/'.$tab[11][1] ; 
                       $fin='2022/12/'.$tab[11][2];
                       $nomb=$tab[11][2];
                    
                       break;
             default:
             echo "Your favorite color is neither red, blue, nor green!";
       }
  
     }

     $nombre  = "SELECT distinct (count(ID) ) from users  WHERE Create_at between '".$debut."' and   '".$fin."' ";
     $result = $this->db->query($nombre);
    $row = $result->getRow();
    return $row;
    }

    function chart_data(){
   

      $sql="SELECT MONTH(CURRENT_TIMESTAMP)";
      $result = $this->db->query($sql);
      $row = $result->getRow();
      
      $tab = array(array(1,1,31) ,array(2,1,29),array(3,1,31),
             array(4,1,30),array(5,1,31),(array(6,1,30)),
             array(7,1,31) ,array(8,1,31),array(9,1,30),
             array(10,1,31),array(11,1,30),(array(12,1,31)));
             foreach($row  as $month){
             $debut;
             $fin;
             $tabstat=[];
             switch($month){
      
                   case 1:
                   $debut=$tab[0][1].'/1/2022' ; 
                   $fin=$tab[0][2].'/1/2022';
                   $nomb=$tab[0][2];
                 
                   break;
                   case 2:
                   $debut=$tab[1][1].'/2/2022' ; 
                   $fin=$tab[1][2].'/2/2022';
                   $nomb=$tab[1][2];
      
                   break;
                   case 3:
                   $debut=$tab[2][1].'/3/2022' ; 
                   $fin=$tab[2][2].'/3/2022';
                   $nomb=$tab[2][2];
                   $this->session->set('nombre',$nomb); 
                   break;
                   case 4:
                      $debut=$tab[3][1].'/4/2022' ; 
                      $fin=$tab[3][2].'/4/2022';
                      $nomb=$tab[3][2];
                     
                      break;
                      case 5:
                      $debut=$tab[4][1].'/5/2022' ; 
                      $fin=$tab[4][2].'/5/2022';
                      $nomb=$tab[4][2];
      
                      break;
                      case 6:
                      $debut=$tab[5][1].'/6/2022' ; 
                      $fin=$tab[5][2].'/6/2022';
                      $nomb=$tab[5][2];
                    
                      break;
                      case 7:
                          $nomb=$tab[6][2];
                         
                          break;
                          case 8:
                          $nomb=$tab[7][2];
                           
                          break;
                          case 9:
                          $nomb=$tab[8][2];
                        
                          break;
                          case 10:
                             $nomb=$tab[9][2];
                             break;
                             case 11:
                             $nomb=$tab[10][2];
                             break;
                             case 12:
                             $nomb=$tab[11][2];
                             break;
                   default:
                   echo "Your favorite color is neither red, blue, nor green!";
             }
       }
       $datelimite=1;
       for($i=0;$i<=$nomb;$i++){

        if($datelimite<=$nomb){
          if($datelimite<10){
            $debut="2022/".$month."/0".$datelimite." 00:00:00";
            $fin="2022/".$month."/0".$datelimite." 23:59:59";
          }
          else{
          $debut="2022/".$month."/".$datelimite." 00:00:00";
          $fin="2022/".$month."/".$datelimite." 23:59:59";
          }
      $nombre= "SELECT COUNT(ID) AS count FROM users WHERE Create_at between '".$debut."'AND '".$fin."'";
      $result = $this->db->query($nombre);
      $row = $result->getRow();
    
     $tabstat[$i]=$row;
   
     
    }
        $datelimite++;
       }
       //$tabstat 
      return $tabstat;
   
   }
   
   function Estime_video(){
    $sql="SELECT MONTH(CURRENT_TIMESTAMP)";
    $result = $this->db->query($sql);
    $row = $result->getRow();
    
    $tab = array(array(1,1,31) ,array(2,1,29),array(3,1,31),
           array(4,1,30),array(5,1,31),(array(6,1,30)),
           array(7,1,31) ,array(8,1,31),array(9,1,30),
           array(10,1,31),array(11,1,30),(array(12,1,31)));
           foreach($row  as $month){
           $debut;
           $fin;
           $tabstat=[];
           switch($month){
    
                 case 1:
                 $debut=$tab[0][1].'/1/2022' ; 
                 $fin=$tab[0][2].'/1/2022';
                 $nomb=$tab[0][2];
               
                 break;
                 case 2:
                 $debut=$tab[1][1].'/2/2022' ; 
                 $fin=$tab[1][2].'/2/2022';
                 $nomb=$tab[1][2];
    
                 break;
                 case 3:
                 $debut=$tab[2][1].'/3/2022' ; 
                 $fin=$tab[2][2].'/3/2022';
                 $nomb=$tab[2][2];
                 $this->session->set('nombre',$nomb); 
                 break;
                 case 4:
                    $debut=$tab[3][1].'/4/2022' ; 
                    $fin=$tab[3][2].'/4/2022';
                    $nomb=$tab[3][2];
                   
                    break;
                    case 5:
                    $debut=$tab[4][1].'/5/2022' ; 
                    $fin=$tab[4][2].'/5/2022';
                    $nomb=$tab[4][2];
    
                    break;
                    case 6:
                    $debut=$tab[5][1].'/6/2022' ; 
                    $fin=$tab[5][2].'/6/2022';
                    $nomb=$tab[5][2];
                  
                    break;
                    case 7:
                        $debut=$tab[6][1].'/7/2022' ; 
                        $fin=$tab[6][2].'/7/2022';
                        $nomb=$tab[6][2];
                       
                        break;
                        case 8:
                        $debut=$tab[7][1].'/8/2022' ; 
                        $fin=$tab[7][2].'/8/2022';
                        $nomb=$tab[7][2];
                         
                        break;
                        case 9:
                        $debut=$tab[8][1].'/9/2022' ; 
                        $fin=$tab[8][2].'/9/2022';
                        $nomb=$tab[8][2];
                      
                        break;
                        case 10:
                           $debut=$tab[9][1].'/10/2022' ; 
                           $fin=$tab[9][2].'/10/2022';
                           $nomb=$tab[9][2];
                          
                           break;
                           case 11:
                           $debut=$tab[10][1].'/11/2022' ; 
                           $fin=$tab[10][2].'/11/2022';
                           $nomb=$tab[10][2];
                      
                           break;
                           case 12:
                           $debut='2022/12/'.$tab[11][1] ; 
                           $fin='2022/12/'.$tab[11][2];
                           $nomb=$tab[11][2];
                        
                           break;
                 default:
                 echo "Your favorite color is neither red, blue, nor green!";
           }
      
         }
    
         $nombre  = "SELECT distinct (count(ID) ) from posts WHERE Created_at between '".$debut."' and   '".$fin."' ";
         $result = $this->db->query($nombre);
        $row = $result->getRow();
        return $row;
   

}


}

?>
