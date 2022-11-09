<?php
    include('../functions/functions.php');
    require_once("../dompdf/autoload.inc.php");
    $tglAwal = $_GET['tglAwal'];
    $tglAkhir = $_GET['tglAkhir'];
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $query = mysqli_query($koneksi,"SELECT * FROM siswa INNER JOIN tb_pinjam_umum_siswa ON tb_pinjam_umum_siswa.id_siswa=siswa.id_siswa WHERE status='Disetujui' AND tb_pinjam_umum_siswa.tanggal BETWEEN '$tglAwal' AND '$tglAkhir' ORDER BY tb_pinjam_umum_siswa.id_pumum DESC");
    
    $kepalaPustaka = mysqli_query($koneksi, "SELECT * FROM admin WHERE bidang='kepala perpustakaan'");
    $kepalaPustaka = mysqli_fetch_assoc($kepalaPustaka);
    $html = '<div style="background-color: #0984b2; color:white; padding:15px;"><center><h3>Data Peminjaman Buku Umum Siswa Pada Perpustakaan <br> MAN 1 PADANG PARIAMAN</h3></center><br>Periode : '. $tglAwal . ' s/d ' . $tglAkhir.'</div>'.'<hr/>';    
$html .= '<table border="1" width="100%" cellpadding="5px"
    style="border-collapse: collapse; padding:5px; font-size:small;">
    <thead>
        <tr style="text-align:center; background-color: #0984b2; color:white;">
            <th>NO</th>
            <th>NAMA</th>
            <th>KELAS</th>
            <th>JURUSAN</th>
            <th>JUDUL BUKU</th>
            <th>JUMLAH</th>
            <th>TGL PINJAM</th>
            <th>STATUS PENGEMBALIAN</th>
        </tr>
    </thead>
    ';
    $no = 1;
    while($row = mysqli_fetch_array($query))
    {
    if($row['pengembalian'] == 'Disetujui') {
    $pengembalian = 'Sudah dikembalikan';
    }else {
    $pengembalian = 'Belum dikembalikan';
    }

    $html .= "
    <tbody>
        <tr>
            <td style='text-align:center;'>".$no."</td>
            <td>".$row['nama']."</td>
            <td style='text-align:center;'>".$row['kelas']."</td>
            <td style='text-align:center;'>".$row['jurusan']."</td>
            <td>".$row['judul']."</td>
            <td style='text-align:center;'>".$row['jumlah']."</td>
            <td style='text-align:center;'>".$row['tanggal']."</td>
            <td style='text-align:center;'>".$pengembalian."</td>
        </tr>
    </tbody>
    ";
    $no++;
    }
    $html .= "<div style='float:right;'>
        <p style='font-weight: bold;'>Lubuk Alung " . date('d/m/Y') . " </p>
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
    $dompdf->stream('laporan_peminjaman_buku_umum_siswa.pdf', array("Attachment"=>0));
    ?>