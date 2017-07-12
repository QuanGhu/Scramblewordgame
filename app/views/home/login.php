<section class="content background-grand">
    <div class="login-page start-box">
        <h3 class="text-center"> Admin Login </h3>
        <div id="message-box" class="alert">
          <strong><span id="message-type"></span></strong> <span id="message"></span>
        </div>
        <form method="post" id="formlogin">
            <div class="form-group">
                <label for="email">Username</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></div>
                    <input type="text" class="form-control" name="username" placeholder="Enter Your Username">
                </div>
             </div>
            <div class="form-group">
                <label for="email">Password</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></div>
                    <input type="password" class="form-control" name="passwd" placeholder="Enter Your Password">
                </div>
             </div>
             <button type="submit" class="btn btn-default">Login</button>
        </form>
    </div>
    <script type="text/javascript">

    $(document).ready(function(e) {
        $('#message-box').hide();
        $('#formlogin').validate({
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
                            url: "home/doLogin",
                            data: $('#formlogin').serialize(),
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
                                    $('#message-type').html('Success !');
                                    $('#message').html('You will bring to admin page in 2 seconds');
                                }
                                else {
                                    $('#message-box').addClass('alert-danger');
                                    $('#message-type').html('Error !');
                                    $('#message').html('Your Credential is invalid');
                                }
                                $('#formlogin')[0].reset();
                                $('#message-box').show();
                                setTimeout(function(){location.href = "dashboard";},3000);
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
    </script>
</section>
