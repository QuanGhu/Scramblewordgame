<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Kategori Barang</h3>
        </div>
        <div class="box-body">

            <button data-toggle="collapse" data-target="#add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Kategori Barang</button>

            <div id="add" class="collapse">
                <div class="row">
                    <div class="col-md-6">
                        <form id="form-category" class="form-horizontal" method="post" action="">
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Nama Kategori Barang :</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="category_name" name="category_name">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-12">
                              <input type="submit" class="btn btn-primary pull-right" value="Simpan" id="btn-category" />
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-hover" id="table-category">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($viewModel as $data): ?>
                       <tr>
                           <td><?php echo $no++; ?></td>
                           <td><?php echo $data->category_name; ?></td>
                           <td>
                               <a class="btn btn-primary" href="dashboard/editcategory/<?php echo $data->category_id; ?>">Rubah Data</a>
                               <a class="btn btn-danger" id="<?php echo $data->category_id; ?>">Hapus Data</a>
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
    $("#table-category").dataTable();
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#form-category').validate({
        errorClass: "has-error", // initialize the plugin
        validClass: "has-success", // initialize the plugin
        rules: {
            category_name: {
                required: true
            }
        },
        messages: {
            category_name: {
                required: "Field ini wajib di isi"
            }
        },
        submitHandler: function (form) {
            $('.loading').show(); // for demo
            $.ajax({
                        type: 'POST',
                        url: "dashboard/savecategory",
                        data: $('#form-category').serialize(),
                        cache: false,
                        success: function() {
                            $('#form-category')[0].reset();
                            $('#table-category').load(document.URL + ' #table-category');
                            $('.loading').hide();
                        }
                    });
        }
    });
});
$(document).on('click','.btn-danger',function(){
    $('.loading').show();
    var id = $(this).attr("id");
    $.ajax({
        type: 'POST',
        cache: false,
        url: "dashboard/deletecategory/"+id,
        success: function() {
            $('#table-category').load(document.URL + ' #table-category');
            $('.loading').hide();
        }
    });
});
</script>
