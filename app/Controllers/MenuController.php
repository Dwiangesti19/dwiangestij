<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MenuModel;

class MenuController extends Controller{
    function __construct()
    {
        $this->menu  =  new MenuModel();
    }
    public function tampil()
    {
        $data['data'] = $this->menu->findAll();
        return view ('MenuList', $data);
    }
    public function simpan()
    {
        $data =  array (
            'nama'=>$this->request->getPost('nama'),
            'harga'=>$this->request->getPost('harga'),
            'jenis'=>$this->request->getPost('jenis'),
            'stok'=>$this->request->getPost('stok'),
        ) ;
        $this->menu->insert($data);
        return redirect('menu')->with('success', 'Data Berhasil di Simpan');
    }
    public function delete($id)
    {
        $this->menu->delete($id);
        return redirect('menu')->with('success', 'Data Berhasil di Hapus');
    } 
    public function edit($id)
    {
        #code
        $pass = $this->request->getPost('nama');
        if(empty($pass)){
            $data = array(
                'harga' => $this->request->getPost('harga'),
                'jenis' => $this->request->getPost('jenis'),
                'stok' => $this->request->getPost('stok'),
            );
        }else{
            $data = array(
                'nama' => $this->request->getPost('nama'),
                'harga' => $this->request->getPost('harga'),
                'jenis' => $this->request->getPost('jenis'),
                'stok' => $this->request->getPost('stok'),
            );
         }
         $this->menu->update($id,$data);
         return redirect('menu')->with('success', 'Data Berhasil Diedit');
    }
}