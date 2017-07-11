<section class="content">
    <?php
        foreach ($viewModel as $data):
        $product_id = $data->product_id;
        $category = $data->category;
        $supplyer_id = $data->supplyer_id;
        $buy_from_supplyer = $data->buy_from_supplyer;
        $product_name = $data->product_name;
        $product_price = $data->product_price;
        $base_stock = $data->base_stock;
        endforeach
        ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Rubah Data Barang</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" method="post" action="dashboard/updateproduct/<?php echo $product_id; ?>" id="form-product">
            <div class="form-group">
              <div class="col-sm-9">
                <input type="hidden" class="form-control" id="product_id" name="product_id" value="<?php echo $product_id; ?>">
              </div>
            </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Nama Kategori :</label>
                <div class="col-sm-9">
                  <select class="form-control" name="category">
                      <?php
                            use App\Model\Query;

                            $selectData = Query::getData('category_product');
                       ?>
                        <?php foreach ($selectData as $data) : ?>
                            <?php if($data->entity_id == $category) :?>
                                <option value="<?php echo $data->category_id;?>" selected="selected"><?php echo $data->category_name; ?></option>
                            <?php else : ?>
                                <option value="<?php echo $data->category_id;?>"><?php echo $data->category_name; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Nama Supplier :</label>
                <div class="col-sm-9">
                  <select class="form-control" name="supplyer_id">
                      <?php
                            $selectData = Query::getData('supplyer');
                       ?>
                        <?php foreach ($selectData as $data) : ?>
                            <?php if($data->entity_id == $supplyer_id) :?>
                                <option value="<?php echo $data->entity_id;?>" selected="selected"><?php echo $data->supplyer_name; ?></option>
                            <?php else : ?>
                                <option value="<?php echo $data->entity_id;?>"><?php echo $data->supplyer_name; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Tanggal Pembelian :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="buy_from_supplyer" name="buy_from_supplyer" value="<?php echo $buy_from_supplyer;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Nama Barang :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product_name;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Harga Dasar :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product_price;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Stok Awal:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="base_stock" name="base_stock" value="<?php echo $base_stock;?>" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <input type="submit" class="btn btn-primary pull-right" value="Rubah Data" />
                </div>
              </div>
            </form>
        </div>
    </div>
</section>
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
</script>
