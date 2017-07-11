<!-- Main content -->
<section class="content">
    <?php
        foreach ($viewModel as $data):
        $entity_id = $data->entity_id;
        $supplyer_name = $data->supplyer_name;
        endforeach
        ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Rubah Data Supplier</h3>
        </div>
        <div class="box-body">
            <form method="post" action="dashboard/updatesupplyer/<?php echo $entity_id; ?>" id="form-supplyer">
              <div class="form-group">
                <label for="email">Name Supplier :</label>
                <input type="text" class="form-control" id="supplyer_name" name="supplyer_name" value="<?php echo $supplyer_name; ?>">
              </div>
              <input type="submit" class="btn btn-primary" value="Rubah Data" />
            </form>
        </div>
    </div>
</section>
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
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>
