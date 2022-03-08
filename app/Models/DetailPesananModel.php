<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetailPesananModel extends Model{
    protected $table = 'tb_detail_pesanan';
    protected $primaryKey ='id';
    protected $allowedFields =['menu_id', 'pesanan_id','jumlah'];
}