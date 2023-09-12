<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Ample Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="<?=base_url() ?>/https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url() ?>/plugins/images/favicon.png">
    <!-- Custom CSS -->
   <link href="<?=base_url() ?>/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    
<div class="col-lg-8 col-xlg-9 col-md-12">


                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" mathod="Post" id="FormPost">
                                <?php    
 if(isset($db)){
    foreach ($db as $key=>$data) {
        # code...
?>
                                    <div class="form-group mb-4">
                                        <label  class="col-md-12 p-0">Full Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                        <input type="text" id="name" name="name" 
                                            value="<?=$data['nom']; ?>"
                                            class="form-control p-0 border-0" 
                                          >
                                        <span id="spn1"></span> 
                                        </div>  
                                    </div>
                            <!--prenom  -->
                            <div class="form-group mb-4">
                                        <label  class="col-md-12 p-0"> LastName</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" id="firstname" name="firstname" placeholder="your name and FirstName"
                                            value="<?=$data['prenom']; ?>"
                                            class="form-control p-0 border-0"> <span id="spn1"></span> </div>
                                                <span id="spn2"></span>
                                    </div>
                                    <!-- Date naissance --->
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Date de Naissance</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input id="naiss" type="text" placeholder="" name="naissance"
                                            value="<?=$data['datenaissance']; ?>"
                                                class="form-control p-0 border-0">
                                                <span id="spn3"></span>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" placeholder="johnathan@admin.com"
                                            value="<?=$data['mail']; ?>"
                                                id="example-email">
                                                <span id="spn4"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Phone No</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="123 456 7890" name="phone"
                                                id="phone" 
                                                value="<?=$data['phone']; ?>"
                                                class="form-control p-0 border-0">
                                                <span id="spn5"></span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Select Gender</label>
                                    
                                        <div class="col-sm-12 border-bottom">
                                            <select id ="genre" name="genre" 
                                            value="<?=$data['genre']; ?>"
                                            class="form-select shadow-none p-0 border-0 form-control-line" >
                                                <option value="M">M</option>
                                                <option value="F">F</option>
                                              
                                            </select>
                                           
                                        </div>
                                    </div>
                            
                                   
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                        <button id="btn2" class="btn btn-danger btn-lg text-white"
                                          type="submit">VALIDE</button>
                                        </div>
                                    </div>

                                </form>
                                <?php
                         }
                        }
                    ?>
                            </div>
                        </div>
                    </div>
                  
                    <!-- Column -->
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script >
        $(function(){
        $('#FormPost').submit(function (e) { 
            e.preventDefault();
        

                    const values= new FormData(this);
                    if(($('#name').val()!="")&&($('#naiss').val()!="")&&($('#firstname').val()!="")&&
             (($('#example-email').val()!="")||($('#phone').val()!=""))
                  ){
                    $('#btn2').text("Registing...");
            $.ajax({
                type: "POST",
                url: "<?=base_url('/Dashboard/valide_update/'.$data['userid']) ?>",
                data: values,
                contentType: false,
                cache: false,
                 processData: false,
                dataType: "json",
                success: function (response) {
            
                    if(response.error){
                                    
                        swal({
                      title: "UnLoged!",
                      text: "You clicked the button!",
                       icon: "error",
                      button: "confirm!",
                      });
                        $("#btn2").text('Sign Up');
                    }
                   
                    else{
                
                            swal({
                      title: "Loged!",
                      text: "You clicked the button!",
                       icon: "success",
                      button: "confirm!",
                      });
                    }
                }
            });

        }
        else{
         if($('#name').val().length==0){
            $('#spn1').css("color","red");
            $('#spn1').text("Name is Required");
           }
          else{
            $('#name').css("border","1px solid black");
            }
         if($('#naiss').val()==""){
            $('#spn3').css("color","red");
            $('#spn3').text("Birth is Required");
           } 
          if($('#firstname').val()==""){
            $('#spn2').css("color","red");
            $('#spn2').text("password is Required");
          } 
        if(($('#example-email').val()=="")&&($('#phone').val()=="")){
            $('#spn4').css("color","red");
            $('#spn4').text("Mail is Required");
            $('#spn5').css("color","red");
            $('#spn5').text("phone is Required");
        } 

    }
    })
});
</script>
                    </body>
               </html>