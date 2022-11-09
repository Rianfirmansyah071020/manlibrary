<?php
    include('../functions/functions.php');
    require_once("../dompdf/autoload.inc.php");
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $query = mysqli_query($koneksi,"SELECT * FROM stok_buku_umum ORDER BY judul");

    $kepalaPustaka = mysqli_query($koneksi, "SELECT * FROM admin WHERE bidang='kepala perpustakaan'");
    $kepalaPustaka = mysqli_fetch_assoc($kepalaPustaka);    
    $html = '<div style="background-color: #0984b2; color:white;"><center><h3>Data Buku Umum Pada Perpustakaan <br> MAN 1 PADANG PARIAMAN</h3></center></div>'.'<hr/>';    
    $html .= '<table border="1" width="100%" cellpadding="5px" style="border-collapse: collapse; padding:5px; font-size:small;">
    <thead>
    <tr style="text-align:center; background-color: #0984b2; color:white;">
    <th>NO</th>
    <th>JUDUL BUKU</th>
    <th>KELAS</th>
    <th>JURUSAN</th>
    <th>TINGKATAN</th>
    <th>PENULIS</th>
    <th>PENERBIT</th>
    <th>TAHUN TERBIT</th>
    <th>JUMLAH</th>
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
    <td>".$row['judul']."</td>
    <td style='text-align:center;'>".$row['kelas']."</td>
    <td style='text-align:center;'>".$row['tingkatan']."</td>
    <td style='text-align:center;'>".$row['jurusan']."</td>
    <td>".$row['penulis']."</td>
    <td>".$row['penerbit']."</td>
    <td style='text-align:center;'>".$row['tahun_terbit']."</td>
    <td style='text-align:center;'>".$row['jumlah']."</td>    
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
$dompdf->stream('laporan_buku_umum.pdf', array("Attachment"=>0));
?>