<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Penjualan Barang</h3>
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
            <form method="post" id="form-quote" action="dashboard/savequote">
                <div class="form-group">
                  <div class="row">
                      <label class="control-label col-sm-1" for="email">No Faktur:</label>
                      <div class="col-sm-2">
                        <?php
                        use App\Model\AbstractDb;

                        $select = AbstractDb::getDB()->prepare("SELECT order_number FROM order_data ORDER BY order_number DESC LIMIT 1");
                        $select->execute();

                        $row = $select->fetch();
                        $ordernumber = $row['order_number'];

                        $noUrut = (int) substr($ordernumber, 3, 3);

                        $noUrut++;

                        $char = "N";
                        $newID = $char . sprintf("%05s", $noUrut);



                         ?>
                        <input type="hidden" class="form-control" id="order_number" name="order_number" value="<?php echo $newID; ?>" />
                        <?php echo $newID; ?>
                      </div>
                  </div>
                </div>
              <div class="form-group after-add-more">
                <div class="row">
                    <div class="col-md-3">
                        <label for="email">Kode Barang</label>
                        <input type="text" class="form-control" name="product_id" id="product_id">
                    </div>
                    <div class="col-md-3">
                        <label for="email">Nama Barang</label>
                        <input type="text" class="form-control" name="product_name" id="product_name">
                        <input type="hidden" class="form-control" name="base_price" id="base_price">
                    </div>
                    <div class="col-md-2">
                        <label for="email">Jumlah</label>
                        <input type="text" class="form-control" name="product_qty">
                    </div>
                    <div class="col-md-2">
                        <label for="email">Harga</label>
                        <input type="text" class="form-control" name="product_price" data-min="base_price">
                    </div>
                    <div class="col-md-2" style="margin-top: 25px;">
                        <button type="submit" class="btn btn-success add-more">Tambah</button>
                    </div>
                </div>
              </div>
            </form>


            <div class="temp-cart">
                <form class="" method="post" action="dashboard/saveorder">
                    <table class="table table-bordered table-condensed" style="margin-top: 50px;">
                        <thead class="danger">
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="result">
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary pull-right">Bayar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
$(document).ready(function() {
    $('#result').load('dashboard/dataquote');
    $.validator.addMethod("greaterThan",
    function (value, element, param) {
      var $element = $(element), $min;
      if (typeof(param) === "string") {
          $min = $(param);
      } else {
      	  $min = $("#" + $element.data("min"));
      }
      if (this.settings.onfocusout) {
        $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
          $element.valid();
        });
      }
      return parseInt(value) > parseInt($min.val());
  }, "Harga Harus Lebih Dari Harga Modal");
    $('#form-quote').validate({
        errorClass: "has-error", // initialize the plugin
        validClass: "has-success", // initialize the plugin
        rules: {
            product_id: {
                required: true
            },
            product_name: {
                required: true
            },
            product_qty: {
                required: true
            },
            product_price: {
                required: true,
                greaterThan: true
            }
        },
        messages: {
            product_id: {
                required: "Field ini wajib di isi"
            },
            product_name: {
                required: "Field ini wajib di isi"
            },
            product_qty: {
                required: "Field ini wajib di isi"
            },
            product_price: {
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
        url: "dashboard/deleteQuote/"+id,
        success: function() {
            $('#result').load('dashboard/dataquote');
            $('.loading').hide();
        }
    });
});
$(function(){
           $("#product_id").autocomplete({
               source:"data.php",
               minLength:2,
               select:function(event,data){
                   $('input[name=product_name]').val(data.item.product_name);
                   $('input[name=base_price]').val(data.item.product_price);
               }
           });
       });
</script>
