<html>
    <header>
        <title> <?php echo $title ?></title>
    </header>

 <body>
    

<?php
use \App\Libraries\Menu_Lib ; ?>
<style>
    .active{
   background-color:green;
        
    }
</style>
<?PHP echo Menu_Lib::navigation();
?>
<h1> <?php echo $page_heading ?></h1>
 </body>
</html>

