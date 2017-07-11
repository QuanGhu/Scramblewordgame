<section class="content">
    <?php
        foreach ($viewModel as $data):
        $product_id = $data->product_id;
        $entity_id = $data->entity_id;
        endforeach
        ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Stok Barang</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" method="post" action="dashboard/updatestock/<?php echo $product_id; ?>" id="form-product">
                <div class="form-group">
                  <div class="col-sm-9">
                    <input type="hidden" class="form-control" id="product_id" name="product_id" value="<?php echo $product_id; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="email">Nama Supplier :</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="supplyer_id">
                        <?php
                             use App\Model\Query;
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
                    <label class="control-label col-sm-3" for="email">Jumlah Stok :</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="new_stock" name="new_stock">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Keterangan :</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="status" name="status">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                      <input type="submit" class="btn btn-primary pull-right" value="Tambah Stok" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function() {
    $('#form-product').validate({
        errorClass: "has-error", // initialize the plugin
        validClass: "has-success", // initialize the plugin
        rules: {
            new_stock: {
                required: true,
                digits: true
            },
            status: {
                required: true
            }
        },
        messages: {
            new_stock: {
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
