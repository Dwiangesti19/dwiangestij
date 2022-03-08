<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
<?php
    if (session()->getFlashdata('success')){
       ?>
       <div class= "alert alert-success  alert-dismissible fade show" role= "alert">
        <?= session()->getFlashdata('success')?>
        <button type ="button" class= "close" data-dissmiss= "alert" arial-label="close"></button>
    </div>
    <?php
    }
    ?>
<div class="container">
    <h3>Data Menu</h3>
    <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#addMenu">Tambah Menu</button>
   
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Stok</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($data as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['harga']?></td>
                <td><?=$row['jenis']?></td>
                <td><?=$row['stok']?></td>
                <td>
                <a href="#" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editMenu-<?=$row['id']?>" btn-sm btn-edit>Edit</a>
                <a href="<?= base_url ('menu/delete/'.$row['id'])?>" onclick="return confirm ('yakin mau dihapus')" class="btn btn-danger btn-sm btn-delete">Hapus</a>
                </td>
            </tr>

            <form action="<?=base_url('menu/edit/'.$row['id'])?>" method="post">
    <div class="modal fade" id="editMenu-<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <div class="form-gruop">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Menu" value= "<?=$row['nama']?>">
                    </div>
                    <div class="form-gruop">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="harga" value= "<?=$row['harga']?>">
                    </div>
                    <div class="form-gruop">
                            <label>Jenis</label>
                            <input type="" class="form-control" name="jenis" placeholder="jenis" value="<?=$row['jenis']?>">
                    </div>
                    <div class="form-gruop">
                            <label>Stok</label>
                            <input type="number" class="form-control" name="stok" placeholder="stok" value="<?=$row['stok']?>">
                    </div>    
                </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</form>
            <?php
            $no++;
            endforeach?>
        </tbody>
    </table>
<form action="<?=base_url('menu')?>" method="post">
    <div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <div class="form-gruop">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Menu">
                    </div>
                    <div class="form-gruop">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="harga">
                    </div>
                    <div class="form-gruop">
                        <label>Jenis</label>
                        <input type="text" class="form-control" name="jenis" placeholder="jenis">
                    </div>
                    <div class="form-gruop">
                        <label>Stok</label>
                        <input type="number" class="form-control" name="stok" placeholder="stok">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Add product -->

<?= $this->endSection()?>
