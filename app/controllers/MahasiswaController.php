<?php

class MahasiswaController extends Controller
{

    public function index()
    {

        $mhs = $this->model('Mahasiswa');

        $data['mahasiswa'] = $mhs->getAll();

        $this->view(
            'mahasiswa/index',
            $data
        );
    }

    public function create()
    {

        $this->view(
            'mahasiswa/create'
        );
    }

    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $mhs = $this->model('Mahasiswa');

            $data = $_POST;

            if (empty($data['npm'])) {

                $this->setFlash(
                    "NPM wajib diisi",
                    "danger"
                );

                header(
                    "Location: " . BASEURL . "/mahasiswa/create"
                );

                exit;
            }

            if ($mhs->findByNpm($data['npm'])) {

                $this->setFlash(
                    "NPM sudah digunakan",
                    "danger"
                );

                header(
                    "Location: " . BASEURL . "/mahasiswa/create"
                );

                exit;
            }

            if ($mhs->create($data)) {

                $this->setFlash(
                    "Data berhasil ditambah",
                    "success"
                );

                header(
                    "Location: " . BASEURL . "/mahasiswa"
                );

                exit;
            }
        }
    }
}
