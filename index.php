<?php
require __DIR__ . '/db/entities/Nave.php';
use App\entities\Nave;

$model =  new Nave();
$data = $model->getAll() ?? [];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Naves</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach($data as $nave){
                echo "
                    <tr>
                        <td>".$nave['id']."</td>
                        <td>".$nave['name']."</td>
                        <td>
                            <i class='fas fa-eye show' data-id=".$nave['id']."></i>
                            <i class='fas fa-trash delete' data-id=".$nave['id']."></i>
                        </td>

                    </tr>
                ";
            }
        ?>
        </tbody>
    </table>
    <form class="showForm" action="public/html/page.php" method="POST" >
        <input type="text" name="id">
    </form>
    <form class="deleteForm" action="#" method="DELETE" >
        <input type="text" name="id">
    </form>
    
    
    <script src="public/js/script.js"></script>
</body>
</html>
