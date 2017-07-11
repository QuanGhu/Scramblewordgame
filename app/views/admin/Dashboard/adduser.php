<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data User</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" method="post" action="" id="form-user">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Nama Pengguna :</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username">
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Password :</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email Address :</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Nama Depan :</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Nama Belakang :</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Privilage Pengguna :</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="role">
                          <option value="1">Administrator</option>
                          <option value="2">Pengguna Biasa</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                      <input type="submit" class="btn btn-primary pull-right" value="Registrasi" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function() {
    $('#form-user').validate({
        errorClass: "has-error", // initialize the plugin
        validClass: "has-success", // initialize the plugin
        rules: {
            username: {
                required: true
            },
            password: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            firstname: {
                required: true
            },
            lastname: {
                required: true
            }
        },
        messages: {
            username: {
                required: "Field ini wajib di isi"
            },
            password: {
                required: "Field ini wajib di isi"
            },
            email: {
                required: "Field ini wajib di isi",
                email : "Format Email Salah"
            },
            firstname: {
                required: "Field ini wajib di isi"
            },
            lastname: {
                required: "Field ini wajib di isi"
            }
        },
        submitHandler: function (form) {
            $('.loading').show(); // for demo
            $.ajax({
                        type: 'POST',
                        url: "dashboard/registeruser",
                        data: $('#form-user').serialize(),
                        cache: false,
                        success: function() {
                            $('#form-user')[0].reset();
                            $('.loading').hide();
                        }
                    });
            return false;
        }
    });
});
</script>
