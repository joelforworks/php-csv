<?php
require __DIR__ . '/../../db/entities/Nave.php';
use App\entities\Nave;

$id = $_POST['id'];

$obj = new Nave();
$data = $obj->getById($id) ?? [];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Naves</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <table>
        <tbody>
            <?php
                if ($data) {
                    $fields = [
                        'id' => 'ID',
                        'name' => 'Name',
                        'model' => 'Model',
                        'manufacturer' => 'Manufacturer',
                        'cost_in_credits' => 'Cost in Credits',
                        'length' => 'Length',
                        'max_atmosphering_speed' => 'Max Atmosphering Speed',
                        'crew' => 'Crew',
                        'passengers' => 'Passengers',
                        'cargo_capacity' => 'Cargo Capacity',
                        'consumables' => 'Consumables',
                        'hyperdrive_rating' => 'Hyperdrive Rating',
                        'MGLT' => 'MGLT',
                        'starship_class' => 'Starship Class',
                        'created' => 'Created',
                        'edited' => 'Edited',
                        'url' => 'URL'
                    ];

                    foreach ($fields as $key => $label) {
                        echo "
                            <tr>
                                <th>{$label}</th>
                                <td>{$data[$key]}</td>
                            </tr>
                        ";
                    }
                } else {
                    echo "<tr><td colspan='2'>No data found</td></tr>";
                }
            ?>
        </tbody>
    </table>
    
    
    <script src="../../public/js/script.js"></script>
</body>
</html>
