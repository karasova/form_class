<!DOCTYPE html>
<html>
<head>
    <title> Admin </title>
</head>
<body>
    <?php
        //error_reporting(0);
        
        include "delete.php";
    ?>
    <form method = "POST">
        <table border = '1'>
            <thead>
                <tr>
                    <th> № </th>
                    <th> Дата создания</th>
                    <th> Удалить </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $i = 1;
                    $table = ''; 
                    $files = file_get_contents("data.txt");
                    $files = explode("\n", trim($files));
                    foreach ($files as $content){
                        $content = explode(" | ", trim($content));
                        if ($content[9] === 'active'){
                            $table .= "<tr><td>" . $i . "</td><td>". $content[7] . "</td><td> <input type = 'checkbox' name = 'deletes[]' value='" . $content[7]  . "'></td></tr>";
                            $i++;
                        }
                    }            
                    echo $table;   
                
                ?>
            </tbody>


        </table>
        <p><button type="submit">Отправить</button></p>
     </form>
</body>
</html>
