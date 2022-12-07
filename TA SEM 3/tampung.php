<?php
include "koneksi.php";

$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM admin_list");
while ($data = mysqli_fetch_assoc($query)) :
?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['nama_karyawan'] ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tbody>

<?php endwhile; ?>