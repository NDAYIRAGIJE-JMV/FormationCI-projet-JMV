
<?= $this->extend('layouts/base')  ;  ?>
<?= $this->section('content'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if(session()->getTempdata('error')){ ?>
    <div>
      <?= session()->getTempdata('error') ;?>
    </div>
    <?php } ?>

     <?php   if(isset($validatio))  { ?>
        <div>
          <?= $validatio->listError('errors'); } ?>

        </div>

<?php form_open() ; ?>
    <center>
    <form method="Post" action="<?=base_url(); ?>/Pass">
     <h1>CHANGE PASSWORD</h1>
    <label for="">new PASSWORD</label><br>
    <br><input type="password" name="pass" placeholder="Enter your password"><br>
    <span><?= isset($validation) ? display_error($validation,'pass'):''?></span>
    <br><input type="password" name="pass_conf" placeholder="confirm your password"><br>
    <span><?= isset($validation) ? display_error($validation,'pass_conf'):''?></span>
    <br><input type="submit" name="VAL" id="val" value="VALIDE"><br>
    </form>
    </center>
</body>
</html>