<!DOCTYPE html>

<html>

<head>

    <title>Tambah Mahasiswa</title>

    <style>
        input,
        select {

            width: 100%;
            padding: 8px;
            margin-bottom: 10px;

        }
    </style>

</head>

<body>

    <h2>Tambah Mahasiswa</h2>

    <?php $this->flash(); ?>

    <form
        action="<?= BASEURL ?>/mahasiswa/store"
        method="POST">

        <label>NPM</label>
        <input type="text" name="npm">

        <label>Nama Lengkap</label>
        <input type="text"
            name="nama_lengkap">

        <label>Fakultas</label>
        <input type="text"
            name="fakultas"
            value="FTI">

        <label>Jurusan</label>

        <select name="jurusan">

            <option value="Teknik Informatika">
                Teknik Informatika
            </option>

            <option value="Sistem Informasi">
                Sistem Informasi
            </option>

        </select>

        <label>Tempat Lahir</label>

        <input
            type="text"
            name="tempat_lahir">

        <label>Tanggal Lahir</label>

        <input
            type="date"
            name="tanggal_lahir">

        <label>Jenis Kelamin</label>

        <input
            type="radio"
            name="jenis_kelamin"
            value="Laki-laki"> Laki-laki

        <input
            type="radio"
            name="jenis_kelamin"
            value="Perempuan"> Perempuan

        <br><br>

        <button type="submit">

            Simpan

        </button>

    </form>

</body>

</html>