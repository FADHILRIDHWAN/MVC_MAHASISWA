<h2 class="mb-4">

    Tambah Mahasiswa

</h2>

<?php $this->flash(); ?>

<form
    action="<?= BASEURL ?>/mahasiswa/store"
    method="POST">

    <div class="mb-3">

        <label>

            NPM

        </label>

        <input
            type="text"
            name="npm"
            class="form-control"
            required>

    </div>


    <div class="mb-3">

        <label>

            Nama Lengkap

        </label>

        <input
            type="text"
            name="nama_lengkap"
            class="form-control"
            required>

    </div>


    <div class="mb-3">

        <label>

            Fakultas

        </label>

        <input
            type="text"
            name="fakultas"
            class="form-control"
            value="FTI"
            required>

    </div>


    <div class="mb-3">

        <label>

            Jurusan

        </label>

        <select
            name="jurusan"
            class="form-select">

            <option value="Teknik Informatika">

                Teknik Informatika

            </option>

            <option value="Sistem Informasi">

                Sistem Informasi

            </option>

        </select>

    </div>


    <div class="mb-3">

        <label>

            Tempat Lahir

        </label>

        <input
            type="text"
            name="tempat_lahir"
            class="form-control"
            required>

    </div>


    <div class="mb-3">

        <label>

            Tanggal Lahir

        </label>

        <input
            type="date"
            name="tanggal_lahir"
            class="form-control"
            required>

    </div>


    <div class="mb-3">

        <label>

            Jenis Kelamin

        </label>


        <div class="form-check">

            <input
                class="form-check-input"
                type="radio"
                name="jenis_kelamin"
                value="Laki-laki">

            <label class="form-check-label">

                Laki-laki

            </label>

        </div>


        <div class="form-check">

            <input
                class="form-check-input"
                type="radio"
                name="jenis_kelamin"
                value="Perempuan">

            <label class="form-check-label">

                Perempuan

            </label>

        </div>

    </div>


    <button
        type="submit"
        class="btn btn-primary">

        Simpan

    </button>

    <a
        href="<?= BASEURL ?>/mahasiswa"
        class="btn btn-secondary">

        Kembali

    </a>

</form>