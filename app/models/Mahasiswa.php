<?php

class Mahasiswa
{

    private $db;

    public function __construct()
    {

        $this->db = Database::getConnection();
    }

    public function getAll()
    {

        $query = "SELECT * FROM mahasiswa ORDER BY id DESC";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByNpm($npm)
    {

        $query = "SELECT * FROM mahasiswa WHERE npm=?";

        $stmt = $this->db->prepare($query);

        $stmt->execute([$npm]);

        return $stmt->fetch();
    }

    public function create($data)
    {

        $query = "INSERT INTO mahasiswa
(npm,nama_lengkap,fakultas,jurusan,tempat_lahir,tanggal_lahir,jenis_kelamin,status_id)

VALUES
(?,?,?,?,?,?,?,?)";

        $stmt = $this->db->prepare($query);

        return $stmt->execute([

            $data['npm'],
            $data['nama_lengkap'],
            $data['fakultas'],
            $data['jurusan'],
            $data['tempat_lahir'],
            $data['tanggal_lahir'],
            $data['jenis_kelamin'],
            1

        ]);
    }

    public function find($id)
    {

        $query = "SELECT * FROM mahasiswa WHERE id=:id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {

        $query = "UPDATE mahasiswa SET

    npm=:npm,
    nama_lengkap=:nama_lengkap,
    fakultas=:fakultas,
    jurusan=:jurusan,
    tempat_lahir=:tempat_lahir,
    tanggal_lahir=:tanggal_lahir,
    jenis_kelamin=:jenis_kelamin

    WHERE id=:id";

        $stmt = $this->db->prepare($query);

        return $stmt->execute([

            ':npm' => $data['npm'],
            ':nama_lengkap' => $data['nama_lengkap'],
            ':fakultas' => $data['fakultas'],
            ':jurusan' => $data['jurusan'],
            ':tempat_lahir' => $data['tempat_lahir'],
            ':tanggal_lahir' => $data['tanggal_lahir'],
            ':jenis_kelamin' => $data['jenis_kelamin'],
            ':id' => $id

        ]);
    }

    public function delete($id)
    {

        $query = "DELETE FROM mahasiswa WHERE id=:id";

        $stmt = $this->db->prepare($query);

        return $stmt->execute([

            ':id' => $id

        ]);
    }
}
