<!DOCTYPE html>
<html>
    <head>
        <title>CRUD codeigniter 3 - belajarphp.net</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <table class="table table-bordered">
            <tr><th>NIP</th><th>NAMA</th><th>JENIS KELAMIN</th></tr>
            <?php
            foreach ($dosens->result() as $dosen) {
            echo "<tr>
            <td>$dosen->nip</td>
            <td>$dosen->nama</td>
            <td>$dosen->jenis_kelamin</td>
            <td></td>
            </tr>";
            }
            ?>
        </table>
    </body>
</html>