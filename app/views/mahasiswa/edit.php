<?php

/** @var array $mahasiswa */
?>

<h2 class="mb-4">

    Edit Mahasiswa

</h2>

<form
    action="<?= BASEURL ?>/mahasiswa/update/<?= $mahasiswa['id'] ?>"
    method="POST">

    <input
        type="hidden"
        name="id"
        value="<?= $mahasiswa['id'] ?>">

    <div class="mb-3">

        <label>NPM</label>

        <input
            type="text"
            name="npm"
            class="form-control"
            value="<?= $mahasiswa['npm'] ?>"
            required>

    </div>


    <div class="mb-3">

        <label>Nama Lengkap</label>

        <input
            type="text"
            name="nama_lengkap"
            class="form-control"
            value="<?= $mahasiswa['nama_lengkap'] ?>"
            required>

    </div>


    <div class="mb-3">

        <label>Fakultas</label>

        <input
            type="text"
            name="fakultas"
            class="form-control"
            value="<?= $mahasiswa['fakultas'] ?>"
            required>

    </div>


    <div class="mb-3">

        <label>Jurusan</label>

        <select
            name="jurusan"
            class="form-select">

            <option
                value="Teknik Informatika"

                <?= ($mahasiswa['jurusan'] == "Teknik Informatika")
                    ? 'selected' : ''
                ?>>

                Teknik Informatika

            </option>


            <option
                value="Sistem Informasi"

                <?= ($mahasiswa['jurusan'] == "Sistem Informasi")
                    ? 'selected' : ''
                ?>>

                Sistem Informasi

            </option>

        </select>

    </div>


    <div class="mb-3">

        <label>Tempat Lahir</label>

        <input
            type="text"
            name="tempat_lahir"
            class="form-control"
            value="<?= $mahasiswa['tempat_lahir'] ?>"
            required>

    </div>


    <div class="mb-3">

        <label>Tanggal Lahir</label>

        <input
            type="date"
            name="tanggal_lahir"
            class="form-control"
            value="<?= $mahasiswa['tanggal_lahir'] ?>"
            required>

    </div>


    <div class="mb-3">

        <label>Jenis Kelamin</label>

        <div class="form-check">

            <input
                class="form-check-input"
                type="radio"
                name="jenis_kelamin"
                value="Laki-laki"

                <?= ($mahasiswa['jenis_kelamin'] == "Laki-laki")
                    ? 'checked' : ''
                ?>>

            <label class="form-check-label">

                Laki-laki

            </label>

        </div>


        <div class="form-check">

            <input
                class="form-check-input"
                type="radio"
                name="jenis_kelamin"
                value="Perempuan"

                <?= ($mahasiswa['jenis_kelamin'] == "Perempuan")
                    ? 'checked' : ''
                ?>>

            <label class="form-check-label">

                Perempuan

            </label>

        </div>

    </div>


    <button
        class="btn btn-warning"
        type="submit">

        Update

    </button>


    <a
        href="<?= BASEURL ?>/mahasiswa"
        class="btn btn-secondary">

        Kembali

    </a>

</form>