<div class="main-content">
    <div class="container-a">
        <table>
            <tr>
                <th>No</th>
                <th>Nama Dokter</th>
                <th>Spesialis</th>
                <th>Hari</th>
                <th>Jam Praktik</th>
            </tr>

            <?php
            $no = 1;
            $data_doctor = $this->db->query("select * from doctors")->result();
            foreach ($data_doctor as $key => $value) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->name ?></td>
                    <td><?= $value->specialist_doctor ?></td>
                    <td><?= $value->name_day ?></td>
                    <td><?= $value->status ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>