<?php 
namespace App\Controllers;

use App\models\Menumodel;
use App\Models\Pesananmodel;
use App\Models\DetailPesananmodel;
use CodeIgniter\Controller;

class Pesanancontroller extends Controller{
    /**
         * instance of the main Request Object.
         * 
         * @var HTTP\IncomingRequest
         */
        protected $request;

    public function __construct()
    {
        $this->menu = new MenuModel();
        $this->session = session();
        $this->pesanan = new Pesananmodel();
        $this->detail = new DetailPesananmodel();
    }

    public function tampil()
    {
        $data ['menus'] = $this->menu->select('id, Nama')->findAll();
        if (session('cart') !=null)
        {   
            $data['menu'] = array_values(session('cart'));
        }else{
            $data['menu'] = null;
        }
        return view("PesananList", $data);
    }
    public function addCart()
    {
        $id =$this->request->getPost('menu_id');
        $jumlah =$this->request->getPost('jumlah');
        $menu =$this->menu->find($id);
        if($menu){
        }
        $isi = array(
            'menu_id' =>$id,
            'nama' =>$menu ['nama'],
            'harga' =>$menu ['harga'],
            'jumlah' =>$jumlah
        );

        if ($this->session->has('cart')){
        $index = $this->cek ($id);
        $cart = array_values (session('cart'));
        if ($index == -1) {
            array_push($cart, $isi);
    } else{
            $cart[$index]['jumlah']+=$jumlah;
    }
        $this->session->set('cart', $cart);
    } else{
        $this->session->set('cart', array($isi));
    }
    return redirect('pesanan')->with('success', 'Data berhasil ditambahkan'.$menu['nama']);
}
        public function cek($id)
        {
            $cart = array_values(session('cart'));
            for($i = 0; $i < count($cart); $i++){
                if ($cart[$i]['menu_id']==$id){
                return $i;
            }
        }
        return -1;
    }
    public function hapusCart($id)
    {
        #code...
        $index=$this->cek($id);
        $cart=array_values(session('cart'));
        unset($cart[$index]);
        $this->session->set('cart', $cart);
        return redirect('pesanan')->with('succsess', 'Data Berhasil Dihapus');
    }
    public function simpan(){
        if(session('cart') !=null){
            $datapesanan = array(
                'tanggal'=>date('Y/m/d'),
                'user_id'=>1,
                'no_meja'=>$this->request->getPost('no_meja'),
                'nama_pemesan'=>$this->request->getPost('nama_pemesan'),
                'total_harga' =>'0'
            );
            $id = $this->pesanan->insert($datapesanan);
            $cart = array_values(session('cart'));

            $tharga=0;
            foreach($cart as $row){
                $datadetail = array(
                    'pesanan_id'=>$id,
                    'menu_id'=>$row['menu_id'],
                    'jumlah'=>$row['jumlah']
                );
                $tharga +=$row['jumlah']*$row['harga'];
                $this->detail->insert($datadetail);
            }
            $tharga= array(
                'total_harga' =>$tharga
            );
            $this->pesanan->update($id, $tharga);
            $this->session->remove('cart');
            return redirect('pesanan')->with('success', 'Data Berhasil Disimpan');
        }
    }
}