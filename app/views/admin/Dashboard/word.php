<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Word List Data</h3>
        </div>
        <div class="box-body">
            <div id="message-box" class="alert">
              <strong><span id="message-type"></span></strong> <span id="message"></span>
            </div>
            <div class="action-box">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newModal">Add New Word</button>
            </div>
            <table class="table table-hover" id="datatables">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Word</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
             </table>
        </div>

        <!-- Modal Section  -->
        <div id="newModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Word</h4>
              </div>
              <div class="modal-body">
                  <form method="POST" id="formwordnewdata">
                    <div class="form-group">
                      <label>Word</label>
                      <input type="text" class="form-control" name="list">
                    </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-info pull-right">Add</button>
                  </form>
              </div>
            </div>
          </div>
      </div>


    </div>
</section>
<script type="text/javascript">
$(document).ready(function(e) {
    $('#message-box').hide();
    $('#datatables').dataTable({
        "bProcessing": true,
        responsive: true,
        "sAjaxSource": 'dashboard/getWord'
    });
    $('#formwordnewdata').validate({
        errorClass: "has-error", // initialize the plugin
        validClass: "has-success", // initialize the plugin
        rules: {
            list: {
                required: true
            },
            level: {
                required: true
            }
        },
        messages: {
            list: {
                required: "This field is required"
            },
            level: {
                required: "This field is required"
            }
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            $.ajax({
                        type: 'POST',
                        url: "dashboard/saveData",
                        data: $('#formwordnewdata').serialize(),
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
                                $('#message').html('New Record Created Successfully');
                            }
                            else {
                                $('#message-box').addClass('alert-danger');
                                $('#message-type').html('Error !');
                                $('#message').html('Something went wrong');
                            }
                            $('#formwordnewdata')[0].reset();
                            $('#datatables').DataTable().ajax.reload();
                            $('#newModal').modal('hide');
                            $('#message-box').show();
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
    $(document).on('click','.delete',function(){
        var id = $(this).attr("data");
        $.confirm({
            title: 'Confirm!',
            content: 'Are you sure want to delete this word?',
            buttons: {
                confirm: function () {
                    deleteData(id);
                    $('#datatables').DataTable().ajax.reload();
                },
                cancel: function () {
                    // close();
                },
            }
        });
    });
    function deleteData(id) {
        var id = id;
        $.ajax({
            type: 'POST',
            cache: false,
            url: "dashboard/deleteData/"+id,
            success: function(result) {
                var url = "dashboard/deleteData/"+id;
                var response = $.parseJSON(result);
                if($('#message-box').hasClass('alert-success')) {
                    $('#message-box').removeClass('alert-success');
                }
                if($('#message-box').hasClass('alert-danger')) {
                    $('#message-box').removeClass('alert-danger');
                }
                if(response.result=='true'){
                    $('#message-box').addClass('alert-success');
                    $('#message-type').html('Deleted !');
                    $('#message').html('Record was deleted');
                }
                else {
                    $('#message-box').addClass('alert-danger');
                    $('#message-type').html('Error !');
                    $('#message').html('Something went wrong');
                }
                $('#message-box').show();
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
    }
});
</script>
