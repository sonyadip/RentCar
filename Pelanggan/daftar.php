<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    .panel-footer.panel-custom {
        padding: 10px 15px;
        background-color: #f5f5f5;
        border-top: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
    .panel-heading.panel-custom {
        padding: 10px 15px;
        background-color: #f5f5f5;
        border-top: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        .panel-body.panel-custom {
        padding: 10px 15px;
        background-color: white;
        border-top: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        body {
            margin-top: 10px;
            background-size:cover;
        }
    </style>

</head>
<body>
<div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="panel-heading panel-custom"><h3 class="text-center"><b>Daftar Akun Pelanggan </b></h3></div>
                        <div class="panel-body panel-custom">
                            <form method="post" action="Daftar_aksi.php" class="needs-validation" novalidate>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control form-control-sm" id="nama" placeholder="" autofocus="on" required>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" name="email" class="form-control form-control-sm" id="email" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_ktp">No. KTP</label>
                                    <input type="text" name="no_ktp" class="form-control form-control-sm" id="no_ktp" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No. Telepon</label>
                                    <input type="text" name="no_telp" class="form-control form-control-sm" id="not_elp" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control form-control-sm" id="alamat" placeholder="" required>
                                </div>
                                <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control form-control-sm" id="username" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control form-control-sm" id="password" placeholder="" required>
                                </div>
                                <button type="submit" class="btn btn-dark btn-block">Daftar</button>
                            </form>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>
</html>
