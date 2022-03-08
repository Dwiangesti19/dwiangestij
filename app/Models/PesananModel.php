<?php 
namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model{
    protected $table = 'tb_pesanan';
    protected $primaryKey ='id';
    protected $allowedFields =['user_id', 'tanggal', 'total_harga', 'no_meja','nama_pemesan'];
}