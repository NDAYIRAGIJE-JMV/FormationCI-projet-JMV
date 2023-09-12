<?php

namespace App\Controllers;
//use \App\Libraries\Menu_Lib ;
use App\Models\EtudModel;
use App\Models\UtilisateurModel;

class Home extends BaseController

{
    public $login;
    public $session;
    public $otp;
    public $client;

    public function __construct()
    {
       
        helper(['url', 'Form']);
        
        $this->client=new EtudModel();
        $this->login = new UtilisateurModel();
        $this->session = session();
        helper('cookie');
        //$this->load->library('Menu_Lib');
        //Librarie('Menu_Lib');
        
    }
    public function index()
    {
        set_cookie('nom', 10, '3600');


        $sessio = \Config\Services::session();

        $nom = [
            'IsLoggedIn' => 1
        ];
        $sessio->set($nom);
        $db = new EtudModel();
        $login = new UtilisateurModel();

        return view('Info');
    }

    /////*********************LOGIN *************************** */

    public function save()
    {
        $sessio = \Config\Services::session();



        if ($this->request->getMethod() == 'post') {


            $validat = [
                'mail' => 'required',
                'pass' => 'required|min_length[3]|max_length[10]'
            ];

            if ($this->validate($validat)) {
                $mail = $this->request->getVar('mail');
                $pass = $this->request->getVar('pass');
                $user = $this->login->verifyEmail($mail);

                $phone_number = $this->login->verifyPhone($mail);

                if ($user) {

                    echo 'vous utilisez le mail<br>';
                    $username = $user['pswd'];


                    if (password_verify($pass, $user['pswd'])) {

                        return view('Welcome_message');
                        $this->session->set('logged_user', $user['userid']);
                    } else {
                        $this->session->setTempdata('error', 'sorry! Wrong password Entered for that Email', 3);
                        return view('Info');
                    }
                } else {
                    if ($phone_number) {

                        echo 'vous utilisez le numero de telephone';

                        if (password_verify($pass, $phone_number['pswd'])) {

                            return view('Welcome_message');
                            $this->session->set('logged_user', $phone_number['userid']);
                        } else {
                            $this->session->setTempdata('error', 'sorry! Wrong password Entered for that Email', 3);
                            return view('Info');
                        }
                    } else {
                        $this->session->setTempdata('error', 'sorry! Email does not Exists', 3);
                        return view('Info');
                    }
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('Info', $data);
    }

    function Test_pass()
    {

        /* if(!session()->has('logged_user')){
            echo 'String';
            return redirect()->to('/');
        }*/
        return view('pass_oublie');
    }


    public function forgot_password()
    {

        $dat = [];
        //return view('pass_oublie');
        if ($this->request->getMethod() == 'post') {
            $valid = [
                'email' => 'required'
            ];
            
            if ($this->validate($valid)) {

                //return view('pass_oublie');
                $mail = $this->request->getVar('email');
                $verifyMail = $this->login->verifyEmail($mail);
                $verifyPhone = $this->login->verifyPhone($mail);

                if ($verifyMail) {
                    $otp = mt_rand(100000, 999999);
                    $session = \Config\Services::session();
                    $sess = [
                        'nom' => $otp
                    ];
                    $session->set($sess);
                    $email = \Config\Services::email();
                   
                    $email->setTo($mail);
                    $email->setFrom('ndayiragijejmv1@gmail.com', 'code de confirmation');
                    $email->setSubject('your code of confirm is :');
                    
                     $email->setMessage($otp);
     
                       if($email->send()){
                    //var_dump($session);
                    echo '<h1>your Otp as : ' . $session->get('nom') . '<h1>';
                    $this->session->set('logged_user', $verifyMail['userid']);
                    return view('Confirme_compte');
                       }

                       else{
                        echo "mail not sent";
                       }
                } elseif ($verifyPhone) {
                    $otp = mt_rand(100000, 999999);
                    $session = \Config\Services::session();
                    $sess = [
                        'nom' => $otp
                    ];
                    $session->set($sess);
                  //**************************************send otp */
                //$mail= \Config\Services::email();
                 // $mail=new PHPMailer(true) ;
                  /*$mail->isSMTP();
                  $mail->Host="smtp.gmail.com";
                  $mail->SMTPAuth=true;
                  $mail->Username="ndayiragijejmv1@gmail.com";
                  $mail->Password="kmgcqcxjleiqyzsy";
                  $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
                  $mail->port=587;
                  $mail->SMTPDebug = 5;
                  $mail->setFrom('ndayiragijejmv1@gmail.com');
                  $mail->setTo($this->request->getVar('email'));
                  $mail->setSubject("your code is :");
                  $mail->setMessage($otp);*/


                  $email = \Config\Services::email();

                //$email->setFrom('ndayiragijejmv1@gmail.com', 'code de confirmation');
                $email->setTo("ndayiragijejmv1@gmail.com");

               $email->setSubject('Email Test');
                $email->setMessage('Testing the email class.');

                  if($email->send()){
  

                    // var_dump($session);
                    echo 'visit your phone and confirm yor compte';

                    /* $re= $this->login->where('phone',$mail)->findAll();
           
            foreach($re as $a){

            }
              
             
            $data=['Token'=>$this->otp];
            $this->login->update($a['userid'],$data);
           echo $this->otp;*/
                    $this->session->set('logged_user', $verifyPhone['userid']);
                    echo '<h1>your Otp as : ' . $session->get('nom') . '<h1>';
                    return view('Confirme_compte');
                } 
                else{
                    //echo $email->printDebugger(['headers']);
                   
                    $this->session->setTempdata('error', 'sorry! otp does not sind', 3);
                }
            }
                else {
                    $this->session->setTempdata('error', 'sorry! Email does not Exists', 3);
                }
            } else {
                $dat['validati'] = $this->validator;
            }
        }

        return view('pass_oublie', $dat);
    }

    ////////////////////////*************************************************************************************** */
    public function confirm()
    {

        $session = \Config\Services::session();
        $a = $session->get('nom');

        $dat = [];
        if ($this->request->getMethod() == 'post') {
            $valid = [

                'email' => 'required'
            ];

            if ($this->validate($valid)) {

                $mail = $this->request->getVar('email');

                $ot = (string)$a;

                if (hash_equals($ot, $mail)) {

                    return view('Pass');
                } else {
                    $this->session->setTempdata('error', 'sorry! OTP NOT CORRECT', 3);
                    echo '<h1> your OTP as: ' . $a . '<h1>';
                }
            } else {
                $dat['validation'] = $this->validator;
                echo '<h1> your OTP as: ' . $a . '<h1>';
            }
        }
        return view('Confirme_compte', $dat);
    }


    /*************************************************************************************************************************** */
    function Test_conf()
    {

        if (!session()->has('logged_user')) {
            echo 'String';
            return redirect()->to('/');
        } else {
            return view('Confirme_compte');
        }
    }




    public function newPass()
    {
        // $cocie=\Config\Services::Cookie();

        echo get_cookie('nom');

        $data = [];
        if ($this->request->getMethod() == 'post') {
            $valid = [
                'pass' => 'required|min_length[2]|max_length[5]',
                'pass_conf' => 'required|min_length[2]|max_length[5]'
            ];

            if ($this->validate($valid)) {


                $pass = $this->request->getVar('pass');


                $pass_conf = $this->request->getVar('pass_conf');
                $passHash = password_hash($this->request->getVar('pass'), PASSWORD_BCRYPT);
                if (hash_equals($pass, $pass_conf)) {
                    $done = ['pswd' => $passHash];
                    $this->login->update(1, $done);
                    $re = $this->login->find(1);
                    // echo $re['pswd'];

                    /*if(password_verify($pass,$passHash))
   {
   // $done= ['pswd'=>$pass];
    //$this->login->update(1,$done);
   }
   else{
    echo 'pass not  verifier';
   }*/
                } else {
                    $this->session->setTempdata('error', 'sorry! Password NOT CONFIRMED', 3);
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('Pass', $data);
    }

    public function changePass()
    {
        if (!session()->has('logged_user')) {
            echo 'String';
            return redirect()->to('/');
        }
        return view('Pass');
    }
    public function logOut()
    {
       /* session_unset();
        session_destroy();
        return redirect()->to("/");*/
        //return view('Info');
    }

    public function pagination()
    {


        
        return view('Pagination');
       
    }


    function fetch()
    {
        
       /* $login = new UtilisateurModel();
        $this->login->select('*');
        $this->login->orderBy("userid", "ASC");
        $this->login->limit(0, 2);
        $query = $this->login->get();
       // echo $query->num_rows();
        foreach ($query as $key => $row) {
            print_r($query->getResult());
          
        }*/
        $i=0;
         $output = '';
        //$this->load->model('UtilisateurModel');
        $query =$this->client->fetch_data($this->request->getPost('limit'), $this->request->getPost('start'));
        $data=$query->getResult();
			foreach($data as $key=>$row)
           
			{
               
				$output .= '
				<div class="post_data">
					<h3 class="text-danger"><center>'.$i++.'<br>Nom: '.$row->Nom.'</center></h3>
					<h2><center>Prenom : '.$row->Prenom.'</center></h2>
				</div>
				';
			}
      return $output;
        
    }
    public function menuContenu(){
        $dat=array('title'=>'Dynamique man navigation',
          'page_heading'=>'Menu'
    );
        return view('Menu',$dat);

    }
 public function PAGE1(){
    $dat=array('title'=>'Dynamique man navigation',
    'page_heading'=>'Page1'
);
    return view('Page1');
 }
  public function PAGE2(){
    return view('Page2');

  }
  public function PAGE3(){
    return view('Page3');

  }

  public function make_Payment(){
  
   return view('Make_payment');

  }
  
 function teste(){
    $phone="F";
 $test= $this->login->testeSelect($phone);

 if($test){
   /* $data=[
        "userinfo"=>$test
    ];
    return view("Test",$data);*/
     return view("Test",array("data"=>$test));
 }
 else{
    $test="no database Selected";
    return view("Test",array("dat"=>$test));
 }


 }
}
