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
    <h3>Data User</h3>
    <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#addUser">Tambah Data</button>
   
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
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
                <td><?=$row['username']?></td>
                <td><?=$row['role']?></td>
                <td>
                <a href="#" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editUser-<?=$row['id']?>" btn-sm btn-edit>Edit</a>
                <a href="<?=base_url('user/delete/'.$row['id'])?>" onclick="return confirm('Yakin Akan Dihapus')" class="btn btn-danger btn-sm btn-hapus">Hapus</a>
                </td>
            </tr>

            <form action="<?=base_url('user/edit/'.$row['id'])?>" method="post">
    <div class="modal fade" id="editUser-<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" name="nama" placeholder="Nama User" value= "<?=$row['nama']?>">
                    </div>
                    <div class="form-gruop">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value= "<?=$row['username']?>">
                    </div>
                    <div class="form-gruop">
                            <label>Paswword</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    <div class="form-group">
                            <label>Role</label>
                            <div class ="form-check">
                                <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="kasir" <?=$row['role']=="kasir"? "checked":""?> >
                                <label class="form-check-label" for="flexRadioDefault1">Kasir</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="manager" <?=$row['role']=="manager"? "checked":""?>>
                                <label class="form-check-label" for="flexRadioDefault2">Manager</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3" value="Admin" <?=$row['role']=="admin"? "checked":""?>>
                                <label class="form-check-label" for="flexRadioDefault3">Admin</label>
                            </div>
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
<form action="<?=base_url('user')?>" method="post">
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" name="nama" placeholder="Nama User">
                    </div>
                    <div class="form-gruop">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                        <div class="form-gruop">
                            <label>Paswword</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <div class ="form-check">
                                <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="kasir">
                                <label class="form-check-label" for="flexRadioDefault1">Kasir</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="manager">
                                <label class="form-check-label" for="flexRadioDefault2">Manager</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3" value="Admin">
                                <label class="form-check-label" for="flexRadioDefault3">Admin</label>
                            </div>
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
