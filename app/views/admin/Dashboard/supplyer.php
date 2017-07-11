<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Supplier</h3>
        </div>
        <div class="box-body">
            <button data-toggle="collapse" data-target="#add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Supplier</button>

            <div id="add" class="collapse">
                <div class="row">
                    <div class="col-md-6">
                        <form id="form-supplyer" class="form-horizontal" method="post" action="">
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Nama Supplier :</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="supplyer_name" name="supplyer_name">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <input type="submit" class="btn btn-primary pull-right" value="Simpan" />
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-hover" id="table-supplyer">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($viewModel as $data): ?>
                       <tr>
                           <td><?php echo $no++; ?></td>
                           <td><?php echo $data->supplyer_name; ?></td>
                           <td>
                               <a class="btn btn-primary" href="dashboard/editsupplyer/<?php echo $data->entity_id; ?>">Rubah Data</a>
                               <a class="btn btn-danger" id="<?php echo $data->entity_id; ?>">Hapus Data</a>
                           </td>
                       </tr>
                    <?php endforeach ?>
                </tbody>
             </table>
        </div>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function() {
    $("#table-supplyer").dataTable();
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#form-supplyer').validate({
        errorClass: "has-error", // initialize the plugin
        validClass: "has-success", // initialize the plugin
        rules: {
            supplyer_name: {
                required: true
            }
        },
        messages: {
            supplyer_name: {
                required: "Field ini wajib di isi"
            }
        },
        submitHandler: function (form) {
            $('.loading').show(); // for demo
            $.ajax({
                        type: 'POST',
                        url: "dashboard/savesupplyer",
                        data: $('#form-supplyer').serialize(),
                        cache: false,
                        success: function() {
                            $('#form-supplyer')[0].reset();
                            $('#table-supplyer').load(document.URL + ' #table-supplyer');
                            $('.loading').hide();
                        }
                    });
            return false;
        }
    });
});
$(document).on('click','.btn-danger',function(){
    $('.loading').show();
    var id = $(this).attr("id");
    $.ajax({
        type: 'POST',
        cache: false,
        url: "dashboard/deletesupplyer/"+id,
        success: function() {
            $('#table-supplyer').load(document.URL + ' #table-category');
            $('.loading').hide();
        }
    });
});
</script>
