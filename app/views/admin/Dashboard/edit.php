<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Word List Data</h3>
        </div>
        <div class="box-body">
            <div id="message-box" class="alert">
              <strong><span id="message-type"></span></strong> <span id="message"></span>
            </div>
            <div class="col-md-3">
                <form method="POST" id="formwordupdatedata" action="dashboard/updateData">
                  <div class="form-group">
                    <label>Word</label>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $viewModel[0]; ?>">
                    <input type="text" class="form-control" name="list" value="<?php echo $viewModel[1]; ?>">
                  </div>
                  <button type="submit" class="btn btn-info pull-right">Submit</button>
                 </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
$(document).ready(function(e) {
    $('#message-box').hide();
    $('#formwordupdatedata').validate({
        errorClass: "has-error", // initialize the plugin
        validClass: "has-success", // initialize the plugin
        rules: {
            list: {
                required: true
            }
        },
        messages: {
            list: {
                required: "This field is required"
            }
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            $.ajax({
                        type: 'POST',
                        url: "dashboard/updateData",
                        data: $('#formwordupdatedata').serialize(),
                        cache: false,
                        success: function(result) {
                            var response = $.parseJSON(result);
                            if($('#message-box').hasClass('alert-success')) {
                                $('#message-box').removeClass('alert-success');
                            }
                            if($('#message-box').hasClass('alert-danger')) {
                                $('#message-box').removeClass('alert-danger');
                            }
                            if(response.result=='true'){
                                $('#message-box').addClass('alert-success');
                                $('#message-type').html('Added !');
                                $('#message').html('Record Updated You will bring back in 3 seconds');
                            }
                            else {
                                $('#message-box').addClass('alert-danger');
                                $('#message-type').html('Error !');
                                $('#message').html('Something went wrong');
                            }
                            $('#formwordupdatedata')[0].reset();
                            $('#message-box').show();
                            setTimeout(function(){location.href = "dashboard/word";},3000);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            if($('#message-box').hasClass('alert-success')) {
                                $('#message-box').removeClass('alert-success');
                            }
                            if($('#message-box').hasClass('alert-danger')) {
                                $('#message-box').removeClass('alert-danger');
                            }
                            $('#message-box').addClass('alert-danger');
                            $('#message-type').html('Opps !');
                            $('#message').html(thrownError);
                        }
                    });
            return false;
        }
    });
});
</script>
