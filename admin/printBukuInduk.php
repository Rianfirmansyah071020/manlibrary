<?php
    include('../functions/functions.php');
    require_once("../dompdf/autoload.inc.php");
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $query = mysqli_query($koneksi,"SELECT * FROM buku_induk ORDER BY judul");

    $kepalaPustaka = mysqli_query($koneksi, "SELECT * FROM admin WHERE bidang='kepala perpustakaan'");
    $kepalaPustaka = mysqli_fetch_assoc($kepalaPustaka);    
    $html = '<div style="background-color: #0984b2; color:white;"><center><h3>Data Buku Induk Pada Perpustakaan <br> MAN 1 PADANG PARIAMAN</h3></center></div>'.'<hr/>';
    $html .= '<table border="1" width="100%" cellpadding="5px" style="border-collapse: collapse; padding:5px; font-size:xx-small;">
    <thead>
    <tr style="text-align:center; background-color: #0984b2; color:white;">
    <th>NO</th>
    <th>TGL MASUK</th>
    <th>JUDUL BUKU</th>
    <th>PENGARANG</th>
    <th>PENERBIT</th>
    <th>TAHUN TERBIT</th>
    <th>BAHASA</th>
    <th>JUMLAH</th>
    <th>SUMBER</th>
    <th>HARGA</th>
    <th>KETERANGAN</th>
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
    <td style='text-align:center;'>".$row['tgl_masuk']."</td>
    <td>".$row['judul']."</td>
    <td>".$row['pengarang']."</td>
    <td>".$row['penerbit']."</td>
    <td style='text-align:center;'>".$row['th_terbit']."</td>
    <td>".$row['bahasa']."</td>
    <td style='text-align:center;'>".$row['jumlah']."</td>
    <td>".$row['sumber']."</td>
    <td style='text-align:center;'>".$row['harga']."</td>    
    <td>".$row['keterangan']."</td>    
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
$dompdf->setPaper('A4', 'lanskap');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_buku_induk.pdf', array("Attachment"=>0));
?>