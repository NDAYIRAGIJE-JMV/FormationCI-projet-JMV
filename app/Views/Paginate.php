<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <title>Document</title>
</head>
<body>
   <div class="card">
     <div class="card-header">
    <h1>DATA TO PAGINATE</h1>
     </div>
    
     <div class="card-body table-responsive">
        <table class="table table-striped table-mod">
           <thead>
               <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenome</th>
                    <th>Telephone</th>
                    <th>City</th>
               </tr>
           </thead>
           <tbody>
            <?php if(isset($client)){
               foreach($client as $key=>$data){
                    
              ?>
           <tr>
               <td><?=$data->ID ;?></td>
               <td><?=$data->Nom ;?></td>
               <td><?=$data->Prenom;?></td>
               <td><?=$data->Telephone ;?></td>
               <td><?=$data->City;?></td>
           </tr>
          <?php }
            }  ?>
           </tbody>
        </table>
        <?= $pager->links() ?>
     </div>
   </div>  
</body>
</html>