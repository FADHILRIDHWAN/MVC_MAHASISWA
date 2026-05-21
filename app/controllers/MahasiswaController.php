<?php

class MahasiswaController extends Controller
{

    public function index()
    {

        $mhs = $this->model('Mahasiswa');

        $search = isset($_GET['search'])
            ? $_GET['search']
            : '';

        $jurusan = isset($_GET['jurusan'])
            ? $_GET['jurusan']
            : '';

        if (!empty($search) || !empty($jurusan)) {

            $data['mahasiswa'] = $mhs
                ->searchAndFilter(
                    $search,
                    $jurusan
                );
        } else {

            $data['mahasiswa'] = $mhs
                ->getAll();
        }

        $data['search'] = $search;
        $data['jurusan'] = $jurusan;

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

    public function edit($id)
    {

        $mhs = $this->model('Mahasiswa');

        $data['mahasiswa'] = $mhs->find($id);

        if (!$data['mahasiswa']) {

            $this->setFlash(
                "Data tidak ditemukan",
                "danger"
            );

            header(
                "Location: " . BASEURL . "/mahasiswa"
            );

            exit;
        }

        $this->view(
            'mahasiswa/edit',
            $data
        );
    }


    public function update($id)
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
                    "Location: " . BASEURL . "/mahasiswa/edit/" . $id
                );

                exit;
            }

            $mhs->update($id, $data);

            $this->setFlash(
                "Data berhasil diubah",
                "success"
            );

            header(
                "Location: " . BASEURL . "/mahasiswa"
            );

            exit;
        }
    }


    public function delete($id)
    {

        $mhs = $this->model('Mahasiswa');

        $mhs->delete($id);

        $this->setFlash(
            "Data berhasil dihapus",
            "success"
        );

        header(
            "Location: " . BASEURL . "/mahasiswa"
        );

        exit;
    }
}
