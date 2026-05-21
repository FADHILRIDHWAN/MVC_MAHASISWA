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
}
