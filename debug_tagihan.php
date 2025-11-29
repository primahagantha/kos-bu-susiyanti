<?php
include 'koneksi.php';
$result = $conn->query("SELECT * FROM tagihan");
echo "<table border='1'><tr><th>No</th><th>No Kamar</th><th>Jumlah</th><th>Ket</th><th>Tgl</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['no'] . "</td>";
    echo "<td>" . $row['no_kamar'] . "</td>";
    echo "<td>" . $row['jumlah_tagihan'] . "</td>";
    echo "<td>" . $row['keterangan_pembayaran'] . "</td>";
    echo "<td>" . $row['tanggal_jatuh_tempo'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
