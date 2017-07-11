<!-- Main content -->
<section class="content">
    <?php
        foreach ($viewModel as $data):
        $category_id = $data->category_id;
        $category_name = $data->category_name;
        endforeach
        ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Rubah Data Kategori Menu</h3>
        </div>
        <div class="box-body">
            <form method="post" action="dashboard/updatecategory/<?php echo $category_id; ?>" id="form-category">
              <div class="form-group">
                <label for="email">Name Kategori :</label>
                <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category_name; ?>">
              </div>
              <input type="submit" class="btn btn-primary" value="Rubah Data" />
            </form>
        </div>
    </div>
</section>
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
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>
