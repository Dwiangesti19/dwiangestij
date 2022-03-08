<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class UserController extends controller{
    protected $REQUEST;
    function __construct()
    {
        $this->user = new UserModel();
    }
    public function index()
        {
            $data ['data'] = $this->user->findAll();
            return view ('UserList', $data);
        }
    public function create()
        {
            $data = array(
                'nama'=>$this->request->getPost('nama'),
                'username'=>$this->request->getPost('username'),
                'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
                'role'=>$this->request->getPost('role')
        );
            $this->user->insert($data);
            return redirect('user')->with('success', 'Data Berhasil Disimpan');
        }
        public function delete($id)
        {
            $this->user->delete($id);
            return redirect('user')->with('success','Data Berhasil Dihapus');
        }
        public function edit($id)
        {
            #code
            $pass = $this->request->getPost('password');
            if(empty($pass)){
                $data = array(
                    'nama' => $this->request->getPost('nama'),
                    'username'=> $this->request->getPost('username'),
                    'role' => $this->request->getPost('role')
                );
            }else{
                $data = array(
                    'nama' => $this->request->getPost('nama'),
                    'username' =>$this->request->getPost('username'),
                    'password' =>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
                    'role'=>$this->request->getPost('role')
                );
            }
            $this->user->update($id,$data);
            return redirect('user')->with('success', 'Data Berhasil Diedit');
        }
    public function tlogin()
    {
        return view('login');
    }
    public function login()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data = $this->user->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $cek_pass = password_verify($password, $pass);
            if ($cek_pass){
                $ses_data = [
                    'id'=>$data['id'],
                    'username'=>$data['username'],
                    'role'=>$data['role']
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            }else{
                $session->getFlashdata('msg', 'password keliru ditemukan');
                return redirect('login');
        }    
    }else{
        $session->getFlashdata('msg', 'username keliru ditemukan');
        return redirect('login');
    }
}
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect('login');
    }
    public function show ($id)
    {
     //code...
    }
}