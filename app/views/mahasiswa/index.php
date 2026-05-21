<h2 class="mb-3">
    Data Mahasiswa
</h2>

<?php $this->flash(); ?>

<a
    href="<?= BASEURL ?>/mahasiswa/create"
    class="btn btn-primary mb-2">

    Tambah Mahasiswa

</a>

<a
    href="<?= BASEURL ?>/mahasiswa/exportCSV?search=<?= isset($search) ? $search : '' ?>&jurusan=<?= isset($jurusan) ? $jurusan : '' ?>"

    class="btn btn-success mb-2">

    Export CSV

</a>


<a
    href="<?= BASEURL ?>/mahasiswa/exportPDF?search=<?= isset($search) ? $search : '' ?>&jurusan=<?= isset($jurusan) ? $jurusan : '' ?>"

    class="btn btn-danger mb-2">

    Export PDF

</a>


<form method="GET" class="row mb-4">

    <div class="col-md-4">

        <input
            type="text"
            name="search"
            class="form-control"

            placeholder="Cari NPM / Nama"

            value="<?= isset($search) ? $search : '' ?>">

    </div>


    <div class="col-md-4">

        <select
            name="jurusan"
            class="form-select">

            <option value="">
                Semua Jurusan
            </option>


            <option
                value="Teknik Informatika"

                <?= (
                    isset($jurusan)
                    &&
                    $jurusan == "Teknik Informatika"
                )

                    ? 'selected' : ''
                ?>>

                Teknik Informatika

            </option>


            <option
                value="Sistem Informasi"

                <?= (
                    isset($jurusan)
                    &&
                    $jurusan == "Sistem Informasi"
                )

                    ? 'selected' : ''
                ?>>

                Sistem Informasi

            </option>

        </select>

    </div>


    <div class="col-md-4">

        <button
            type="submit"
            class="btn btn-success">

            Cari

        </button>

        <a
            href="<?= BASEURL ?>/mahasiswa"
            class="btn btn-secondary">

            Reset

        </a>

    </div>

</form>



<div class="table-responsive">

    <table
        class="table table-striped table-bordered">

        <thead class="table-dark">

            <tr>

                <th>No</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Fakultas</th>
                <th>Jurusan</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

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

                        <td>

                            <?= date(
                                'd-m-Y',
                                strtotime($m['tanggal_lahir'])
                            )
                            ?>

                        </td>

                        <td><?= $m['jenis_kelamin'] ?></td>

                        <td>

                            <?= ($m['status_id'] == 1)
                                ?
                                'Aktif'
                                :
                                'Nonaktif'
                            ?>

                        </td>

                        <td>

                            <a
                                href="<?= BASEURL ?>/mahasiswa/edit/<?= $m['id'] ?>"
                                class="btn btn-warning btn-sm">

                                Edit

                            </a>


                            <a
                                href="<?= BASEURL ?>/mahasiswa/delete/<?= $m['id'] ?>"

                                class="btn btn-danger btn-sm"

                                onclick="return confirm(
'Yakin ingin menghapus data?'
)">

                                Delete

                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>

                    <td colspan="10"
                        class="text-center">

                        Data tidak ditemukan

                    </td>

                </tr>

            <?php endif; ?>

        </tbody>

    </table>

</div>