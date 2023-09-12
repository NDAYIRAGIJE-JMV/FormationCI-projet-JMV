<html>
    <header>
        <title> <?php echo $title ?></title>
    </header>

 <body>
    

<?php
use \App\Libraries\Menu_Lib ; ?>
<style>
    .active{
        color:green;

    border :1px solid green;
    border-radius 3px; 
    width: 50px;   
    }
</style>
<?PHP echo Menu_Lib::navigation();
?>
<h1> <?php echo $page_heading ?></h1>
 </body>
</html>