<?php
    include('../functions/functions.php');
    require_once("../dompdf/autoload.inc.php");
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $query = mysqli_query($koneksi,"select * from siswa");
    
    $kepalaPustaka = mysqli_query($koneksi, "SELECT * FROM admin WHERE bidang='kepala perpustakaan'");
    $kepalaPustaka = mysqli_fetch_assoc($kepalaPustaka);    
    $html = '<div style="background-color: #0984b2; color:white;"><center><h3>Data Siswa Pada Perpustakaan <br> MAN 1 PADANG PARIAMAN</h3></center></div>'.'<hr/>';    
    $html .= '<table border="1" width="100%" cellpadding="5px" style="border-collapse: collapse; padding:5px; font-size:small;">
    <thead>
    <tr style="text-align:center; background-color: #0984b2; color:white;">
    <th>NO</th>
    <th>NAMA</th>
    <th>JURUSAN</th>
    <th>JENIS KELAMIN</th>
    <th>ALAMAT</th>
    <th>NOHP</th>
    </tr>
    </thead>
    ';
    $no = 1;
    while($row = mysqli_fetch_array($query))
    {
    $html .= "
    <tbody>
    <tr>
    <td style='text-align:center;'>".$no."</td>
    <td>".$row['nama']."</td>
    <td style='text-align:center;'>".$row['jurusan']."</td>
    <td style='text-align:center;'>".$row['jekel']."</td>
    <td>".$row['alamat']."</td>
    <td>".$row['nohp']."</td>
    </tr>
    </tbody>
    ";
    $no++;
    }
    $html .= "<div style='float:right;'>
    <p style='font-weight: bold;'>Lubuk Alung  " .  date('d/m/Y') . " </p>
    <p>Kepala Perpustakaan</p> <br> <br>
    <p>". $kepalaPustaka['nama']. "</p>
</div>"; 
$html .= "

</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_siswa.pdf', array("Attachment"=>0));
?>