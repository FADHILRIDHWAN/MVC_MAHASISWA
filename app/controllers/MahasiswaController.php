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

    public function exportCSV()
    {

        $mhs = $this->model('Mahasiswa');

        $search = $_GET['search'] ?? '';

        $jurusan = $_GET['jurusan'] ?? '';

        if (!empty($search) || !empty($jurusan)) {

            $data = $mhs->searchAndFilter(
                $search,
                $jurusan
            );
        } else {

            $data = $mhs->getAll();
        }

        header(
            'Content-Type:text/csv'
        );

        header(
            'Content-Disposition:attachment; filename=mahasiswa.csv'
        );

        $output = fopen(
            'php://output',
            'w'
        );

        fputcsv($output, [

            'ID',
            'NPM',
            'Nama Lengkap',
            'Fakultas',
            'Jurusan',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Status'

        ]);

        foreach ($data as $m) {

            fputcsv($output, [

                $m['id'],
                $m['npm'],
                $m['nama_lengkap'],
                $m['fakultas'],
                $m['jurusan'],
                $m['tempat_lahir'],
                $m['tanggal_lahir'],
                $m['jenis_kelamin'],
                $m['status_id'] == 1
                    ?
                    'Aktif'
                    :
                    'Nonaktif'

            ]);
        }

        fclose($output);

        exit;
    }

    public function exportPDF()
    {

        $mhs = $this->model(
            'Mahasiswa'
        );

        $search =
            $_GET['search']
            ?? '';

        $jurusan =
            $_GET['jurusan']
            ?? '';

        if (
            !empty($search)
            ||
            !empty($jurusan)
        ) {

            $data =
                $mhs
                ->searchAndFilter(
                    $search,
                    $jurusan
                );
        } else {

            $data =
                $mhs
                ->getAll();
        }

        $html = '

<h2 align="center">

Data Mahasiswa

</h2>

<table
border="1"
width="100%"
cellpadding="5"
cellspacing="0"
>

<tr>

<th>ID</th>
<th>NPM</th>
<th>Nama</th>
<th>Jurusan</th>
<th>Jenis Kelamin</th>

</tr>

';

        foreach (
            $data as $m
        ) {

            $html .= '

<tr>

<td>' . $m['id'] . '</td>

<td>' . $m['npm'] . '</td>

<td>' . $m['nama_lengkap'] . '</td>

<td>' . $m['jurusan'] . '</td>

<td>' . $m['jenis_kelamin'] . '</td>

</tr>

';
        }

        $html .= '</table>';

        $dompdf =
            new Dompdf\Dompdf();

        $dompdf
            ->loadHtml(
                $html
            );

        $dompdf
            ->setPaper(
                'A4',
                'landscape'
            );

        $dompdf
            ->render();

        $dompdf
            ->stream(
                'mahasiswa.pdf'
            );

        exit;
    }
}
