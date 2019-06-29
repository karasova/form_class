<!DOCTYPE html>
<html>
<head>
    <title> Admin </title>
</head>
<body>
    <?php
        //error_reporting(0);
        
        include "form_class.php";
        $form = new Form;
        $form->delete();
    ?>
    <form method = "POST">
        <?php
        $form->read_from_db();
        ?>      
           
        <p><button type="submit">Удалить</button></p>
     </form>
</body>
</html>
