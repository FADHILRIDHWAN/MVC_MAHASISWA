<!DOCTYPE html>

<html>

<head>

    <title>Edit Mahasiswa</title>

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

    <h2>Edit Mahasiswa</h2>

    <form
        action="<?= BASEURL ?>/mahasiswa/update/<?= $mahasiswa['id'] ?>"
        method="POST">

        <input
            type="hidden"
            name="id"
            value="<?= $mahasiswa['id'] ?>">

        <label>NPM</label>

        <input
            type="text"
            name="npm"
            value="<?= $mahasiswa['npm'] ?>">

        <label>Nama Lengkap</label>

        <input
            type="text"
            name="nama_lengkap"
            value="<?= $mahasiswa['nama_lengkap'] ?>">

        <label>Fakultas</label>

        <input
            type="text"
            name="fakultas"
            value="<?= $mahasiswa['fakultas'] ?>">

        <label>Jurusan</label>

        <select name="jurusan">

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


        <label>Tempat Lahir</label>

        <input
            type="text"
            name="tempat_lahir"
            value="<?= $mahasiswa['tempat_lahir'] ?>">


        <label>Tanggal Lahir</label>

        <input
            type="date"
            name="tanggal_lahir"
            value="<?= $mahasiswa['tanggal_lahir'] ?>">


        <label>Jenis Kelamin</label>

        <input
            type="radio"
            name="jenis_kelamin"
            value="Laki-laki"

            <?= ($mahasiswa['jenis_kelamin'] == "Laki-laki")
                ? 'checked' : ''
            ?>>

        Laki-laki


        <input
            type="radio"
            name="jenis_kelamin"
            value="Perempuan"

            <?= ($mahasiswa['jenis_kelamin'] == "Perempuan")
                ? 'checked' : ''
            ?>>

        Perempuan

        <br><br>

        <button type="submit">

            Update Data

        </button>

    </form>

</body>

</html>