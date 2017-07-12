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
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newModal">Add New Admin</button>
            </div>
            <table class="table table-hover" id="dataadmin">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Admin User</th>
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
                <h4 class="modal-title">Add New Admin</h4>
              </div>
              <div class="modal-body">
                  <form method="POST" id="formwordnewadmin">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="passwd">
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
    $('#dataadmin').dataTable({
        "bProcessing": true,
        responsive: true,
        "sAjaxSource": 'dashboard/getAdmin'
    });
    $('#formwordnewadmin').validate({
        errorClass: "has-error", // initialize the plugin
        validClass: "has-success", // initialize the plugin
        rules: {
            username: {
                required: true
            },
            passwd: {
                required: true
            }
        },
        messages: {
            username: {
                required: "This field is required"
            },
            passwd: {
                required: "This field is required"
            }
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            $.ajax({
                        type: 'POST',
                        url: "dashboard/saveAdmin",
                        data: $('#formwordnewadmin').serialize(),
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
                            else if (response.result=='duplicate'){
                                $('#message-box').addClass('alert-danger');
                                $('#message-type').html('Error !');
                                $('#message').html('The admin you have input already exists ! ');
                            }else {
                                $('#message-box').addClass('alert-danger');
                                $('#message-type').html('Error !');
                                $('#message').html('Something went wrong');
                            }
                            $('#formwordnewadmin')[0].reset();
                            $('#dataadmin').DataTable().ajax.reload();
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
});
</script>
