<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
<?php
    if(session()->getFlashdata('success')){
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
<?= session()->getFlashdata('success')?>
<button type="button" class="close" data-dismiss="alert" aria-labeb="close">success</button>
</div>
<?php
    }
?>  
<?php
?>
<div class="row">
    <div class="col-md-6">
        <form action="<?=base_url('pesanan')?>" method="post">
            <div class="card shadow mb-3 border-left-warning">
                <div class="card-body">
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="-">Silahkan pilih Menu</option>
                            <?php
                            foreach ($menus as $key => $val){
                            ?>
                              <option value="<?= $val['id']?>"><?= $val['Nama']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Masukkan Keranjang</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
    <form action="<?=base_url('pesanans')?>" method="post">
        <div class="card shadow mb-3 border-left-warning">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_pemesan">Nama Pemesan</label>
                    <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan">
                    </div>
                    <div class="Form-group">
                            <label for="no_meja">Nomor Meja</label>
                            <input type="number" class="form-control" name="no_meja" id="no_meja">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
<div class="card">
    <card class="header">
     <b><h3 class="card-title">Data Pesanan</b></h3>
<div class="table-resposiv">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total harga</th>
            <th>Option</th>
        </tr>
    </thead>
<tbody>
    <?php
    if($menu !=null){
        $no= 1;
        foreach($menu as $row){
    ?>
    <tr>
        <td><?=$no?></td>

        <td><?=$row['nama']?></td> 
        <td><?=$row['harga']?></td>
        <td><?=$row['jumlah']?></td>
        <td><?=$row['jumlah']*$row['harga']?></td>
        <td>
            <a href="<?=base_url('Pesanan/delete/'.$row['menu_id'])?>" class="btn btn-warning">Hapus</a>
        </td>
        </tr>
</div>
</td>
    </tr>
        <?php
            }
            }?>
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-warning">Bayar</button>
</div>
</td>
<?= $this->endSection()?>   