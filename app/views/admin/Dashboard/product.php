<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Menu</h3>
        </div>
        <div class="box-body">
            <div class="message">
                  <?php
                        if(!empty($_SESSION['message']))
                        {
                            $message = $_SESSION['message'];
                            echo '<div class="alert alert-danger">'.$message.'</div>';
                            $_SESSION['message'] = '';
                        }
                   ?>
            </div>
            <button data-toggle="collapse" data-target="#add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Barang</button>

            <div id="add" class="collapse">
                <div class="row">
                    <div class="col-md-6">
                        <form class="form-horizontal" method="post" id="form-product" action="dashboard/saveproduct">
                        <div class="form-group">
                          <label class="control-label col-sm-3" for="email">Kode Barang :</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="product_id" name="product_id">
                          </div>
                        </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Nama Kategori :</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="category">
                                  <?php
                                        use App\Model\Query;

                                        $selectData = Query::getData('category_product');
                                   ?>
                                    <?php foreach ($selectData as $data) : ?>
                                        <option value="<?php echo $data->category_id;?>"><?php echo $data->category_name; ?></option>
                                    <?php endforeach ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Nama Supplier :</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="supplyer_id">
                                  <?php

                                        $selectData = Query::getData('supplyer');
                                   ?>
                                    <?php foreach ($selectData as $data) : ?>
                                        <option value="<?php echo $data->entity_id;?>"><?php echo $data->supplyer_name; ?></option>
                                    <?php endforeach ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Tanggal Pembelian :</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="buy_from_supplyer" name="buy_from_supplyer">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Nama Barang :</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="product_name" name="product_name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Harga Modal :</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="product_price" name="product_price">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Stok Barang :</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="product_qty" name="product_qty">
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

            <div class="table-responsive">
                <table class="table table-hover" id="table-product">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Nama Supplier</th>
                        <th>Harga Dasar</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <?php $no=1; ?>
                    <?php foreach ($viewModel as $data): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data->product_id; ?></td>
                        <td><?php echo $data->product_name; ?></td>
                        <td><?php echo $data->category_name; ?></td>
                        <td><?php echo $data->supplyer_name; ?></td>
                        <td><?php echo number_format($data->product_price); ?></td>
                        <td><?php echo number_format($data->final_stock); ?></td>
                        <td>
                            <a class="btn btn-primary" href="dashboard/editproduct/<?php echo $data->product_id; ?>">Rubah Data</a>
                            <a class="btn btn-success" href="dashboard/addstock/<?php echo $data->product_id; ?>">Tambah Stok</a>
                            <a class="btn btn-danger" href="dashboard/deleteproduct/<?php echo $data->product_id; ?>">Hapus Data</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                 </table>
            </div>
        </div>
    </div>

</section>
<script type="text/javascript">
$(document).ready(function() {
    $("#table-product").dataTable();
});
</script>
<script type="text/javascript">
$(function() {
  $("#buy_from_supplyer").datepicker({ format: 'yyyy/mm/dd'});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#form-product').validate({
        errorClass: "has-error", // initialize the plugin
        validClass: "has-success", // initialize the plugin
        rules: {
            product_id: {
                required: true
            },
            product_name: {
                required: true
            },
            buy_from_supplyer: {
                required: true
            },
            product_price: {
                required: true,
                digits: true
            },
            product_qty: {
                required: true,
                digits: true
            }
        },
        messages: {
            product_id: {
                required: "Field ini wajib di isi"
            },
            product_name: {
                required: "Field ini wajib di isi"
            },
            buy_from_supplyer: {
                required: "Field ini wajib di isi"
            },
            product_price: {
                required: "Field ini wajib di isi",
                digits: "Mohon hanya isi angka"
            },
            product_qty: {
                required: "Field ini wajib di isi",
                digits: "Mohon hanya isi angka"
            }
        },
        submitHandler: function (form) {
            form.submit()
        }
    });
});
$(document).on('click','.btn-danger',function(){
    $('.loading').show();
    var id = $(this).attr("id");
    $.ajax({
        type: 'POST',
        cache: false,
        url: "dashboard/deleteproduct/"+id,
        success: function() {
            $('#table-product').load(document.URL + ' #table-product');
            $('.loading').hide();
        }
    });
});
</script>
