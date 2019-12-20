<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $judul; ?></title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url('assets/login/fonts/material-icon/css/material-design-iconic-font.min.css'); ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('assets/login/css/style.css'); ?>">
</head>
<body>

    <div class="main">
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form action="<?= $url; ?>" method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Selamat Datang</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" placeholder="Username" value="<?= set_value('username'); ?>" />
                            <?= form_error('username'); echo $this->session->flashdata('pesan1'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" id="password" name="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            <?= form_error('password'); echo $this->session->flashdata('pesan2'); ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-submit" value="Login"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="<?= base_url('assets/login/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/login/js/main.js'); ?>"></script>
</body>
</html>