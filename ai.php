<?php

$koneksi = mysqli_connect("localhost","root","","person");
require 'vendor/autoload.php';
// query the database to get the data
$query = mysqli_query($koneksi,"SELECT * FROM `tb_person`");
use Dompdf\Dompdf;
// instantiate and use the dompdf class
$dompdf = new Dompdf();

// load the HTML content
$html = '<table><tr><td>ID</td><td>Nama</td><td>Email</td></tr>';
while($row = mysqli_fetch_assoc($query)) {
    $html .= '<tr><td>'.$row['id'].'</td><td>'.$row['nama'].'</td><td>'.$row['email'].'</td></tr>';
}
$html .= '</table>';
$dompdf->loadHtml($html);

// (Optional) Set the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to the browser
$dompdf->stream();

?>
