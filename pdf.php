<!-- <?php 

$koneksi = mysqli_connect("localhost","root","","person");
require 'vendor/autoload.php';

$query = mysqli_query($koneksi,"SELECT * FROM `tb_person`");

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml("<table border='1'>");
while ($row = mysqli_fetch_assoc($query)){
    $dompdf->loadHtml("
    <tr>
    <td>$row[id]</td>
    <td>$row[nama]</td>
    <td>$row[email]</td>
    </tr>
    ");
}
    $dompdf->loadHtml("</table>");
    
    
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

