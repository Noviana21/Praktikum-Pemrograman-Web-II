<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;
use CodeIgniter\HTTP\RedirectResponse;

class Form extends BaseController
{
    protected $modelBuku;

    public function __construct()
    {
        $this->modelBuku = new BukuModel();

        if (!session()->get('login')) {
            session()->set('redirect_url', current_url());
            header('Location: /login');
            exit;
        }
    }

    public function index()
    {
        $data['buku'] = $this->modelBuku->findAll();
        return view('form/index', $data);
    }

    public function show($id)
    {
        $data['buku'] = $this->modelBuku->find($id);
        return view('form/show', $data);
    }

    public function create()
    {
        return view('form/create');
    }

    public function store()
    {
        $rules = [
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|numeric|greater_than[1901]|less_than[2024]',
        ];

        if (!$this->validate($rules)) {
            return view('form/create', [
                'validation' => $this->validator,
                'old' => $this->request->getPost(),
            ]);
        }

        $data = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ];

        $this->modelBuku->save($data);

        return redirect()->to('/buku')->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['buku'] = $this->modelBuku->find($id);
        return view('form/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ];

        $this->modelBuku->update($id, $data);

        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        $this->modelBuku->delete($id);

        return redirect()->to('/buku')->with('success', 'Data berhasil dihapus');
    }
}