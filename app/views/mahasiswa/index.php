<!DOCTYPE html>
<html>

<head>

    <title>Data Mahasiswa</title>

    <style>
        table {

            border-collapse: collapse;
            width: 100%;

        }

        th,
        td {

            padding: 10px;
            border: 1px solid black;
            text-align: center;

        }

        th {

            background: #ddd;

        }
    </style>

</head>

<body>

    <h2>Data Mahasiswa</h2>

    <a href="<?= BASEURL ?>/mahasiswa/create">

        <button>
            Tambah Mahasiswa
        </button>

    </a>

    <?php $this->flash(); ?>

    <table>

        <tr>

            <th>No</th>
            <th>NPM</th>
            <th>Nama Lengkap</th>
            <th>Fakultas</th>
            <th>Jurusan</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Aksi</th>

        </tr>

        <?php if (!empty($mahasiswa)): ?>

            <?php
            $no = 1;
            foreach ($mahasiswa as $m):
            ?>

                <tr>

                    <td><?= $no++ ?></td>
                    <td><?= $m['npm'] ?></td>
                    <td><?= $m['nama_lengkap'] ?></td>
                    <td><?= $m['fakultas'] ?></td>
                    <td><?= $m['jurusan'] ?></td>
                    <td><?= $m['tempat_lahir'] ?></td>
                    <td><?= date('d-m-Y', strtotime($m['tanggal_lahir'])) ?></td>
                    <td><?= $m['jenis_kelamin'] ?></td>
                    <td><?= ($m['status_id'] == 1) ? 'Aktif' : 'Nonaktif' ?></td>
                    <td>

                        <a href="<?= BASEURL ?>/mahasiswa/edit/<?= $m['id'] ?>">

                            <button>Edit</button>

                        </a>


                        <a
                            href="<?= BASEURL ?>/mahasiswa/delete/<?= $m['id'] ?>"

                            onclick="return confirm(
'Yakin ingin menghapus data?'
)">

                            <button>Delete</button>

                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="9">
                    Data mahasiswa belum ada
                </td>
            </tr>

        <?php endif; ?>

    </table>

</body>

</html>