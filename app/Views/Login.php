<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset= "UTF-8">
    <meta http-equiv= "X-UA-Compatible" content= "IE= edge">
    <meta  name="viewport" content="width= device-width, intial-scale=1.0">
    <title>Form Login Cafe Dwi Angesti</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="<?=base_url()?>/assets/css/sb-admin-2.min.css" rel= "stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (session()->getFlashdata('msg')):?>
                <div class= "alert alert-danger"><?= session()->getFlashdata('msg')?></div>
                <?php endif ;?>
                <form action="<?= base_url('login')?>" method= "post">
                <div class = "card shadow mb-3 border-left-warning align-text-center">
                    <h3 class="card-title">Form Login</h3>
                    <div class="card-body">
                    <div class= "form-group">
                            <label for ="username">Username</label>
                            <input type="text" name="username" id= "username" class = "form-control">
                        </div>
                        <div clas="form-group">
                            <label for ="password">Password</label>
                            <input type="password" name="password" id= "password" class = "form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>