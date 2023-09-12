<?php
namespace App\Libraries;
class Menu_Lib {

    public function __construct(){
     $this->CI=& get_instance();

    }

    public function navigation(){
         $menu=  array(
             array('text' =>'Home','url'=>'/Menu'),
             array('text' =>'PAGE1','url'=>'/Page1'),
             array('text' =>'PAGE2','url'=>'/Page2'),
             array('text' =>'PAGE3','url'=>'/Page3')
          ); 

          //$page2=uri->getsegment(2);
          $html="<ul>";
          foreach($menu as $data){
            $menu_active='';
            /*if($page2==$data['url']){
              $menu_active='active';
            }*/
            $html.="<li class='active'>";
            $html.=anchor($data['url'],$data['text']);
            $html.="</li>";
          }
          $html.="</ul>";
          return $html;
         }
}

?>