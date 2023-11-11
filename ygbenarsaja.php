<?php


$koneksi = mysqli_connect("localhost","root","","person");
require 'vendor/autoload.php';

$query = mysqli_query($koneksi,"SELECT * FROM `tb_person`");

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
    <?php $dompdf->loadHtml(" ?>
    <?php while($row = mysqli_fetch_assoc($query)): ?>
        <tr>
            <td><?= $row[id] ?></td>
            <td><?= $row[nama] ?></td>
            <td><?= $row[email] ?></td>
        </tr>
        <?php endwhile; ?>

        <?php ") ?>
</table>
</body>
</html>
<?php
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>