<section class="content">
    <div class="container">
        <div class="box-content">
            <div id="message-box" class="alert">
              <strong><span id="message-type"></span></strong> <span id="message"></span>
            </div>
            <div id="score" class="score-box">
                <span id="score-value" class="white"></span>
            </div>
            <div class="start-box">
                <h2 id="word" class="text1 mg80"></h2>
                <form method="post" id="formanswer">
                    <div class="form-group">
                        <label for="email" class="white">Please input your answer here:</label>
                        <input type="text" class="form-control" name="answer"/>
                     </div>
                     <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                getWord();
                $('#message-box').hide();
                $('#formanswer').validate({
                    errorClass: "has-error", // initialize the plugin
                    validClass: "has-success", // initialize the plugin
                    rules: {
                        answer: {
                            required: true
                        },
                    },
                    messages: {
                        answer: {
                            required: "This field is required"
                        },
                    },
                    submitHandler: function (form,e) {
                        e.preventDefault();
                        $.ajax({
                                    type: 'POST',
                                    url: "home/submit",
                                    data: $('#formanswer').serialize(),
                                    cache: false,
                                    success: function(result) {
                                        var message = $.parseJSON(result);
                                        $('#formanswer')[0].reset();
                                        if($('#message-box').hasClass('alert-success')) {
                                            $('#message-box').removeClass('alert-success');
                                        }
                                        if($('#message-box').hasClass('alert-danger')) {
                                            $('#message-box').removeClass('alert-danger');
                                        }
                                        if(message.message=='true'){
                                            $('#message-box').addClass('alert-success');
                                            $('#message-type').html('Congratulation !');
                                            $('#message').html('Your answer is correct !');
                                        }
                                        else {
                                            $('#message-box').addClass('alert-danger');
                                            $('#message-type').html('Opps !');
                                            $('#message').html('Your answer is wrong !');
                                        }
                                        $('#message-box').show()
                                        getScore();
                                        getWord();
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
                function getScore() {
                    $.ajax({
                                type: 'GET',
                                url: "home/getScore",
                                cache: false,
                                success: function(result) {
                                    var data = $.parseJSON(result);
                                    $('#score-value').html(data.score);
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    alert(thrownError);
                                }
                            });
                }
                function getWord() {
                    $.ajax({
                                type: 'GET',
                                url: "home/getWord",
                                cache: false,
                                success: function(result) {
                                    var data = $.parseJSON(result);
                                    $('#word').html(data.word);
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    alert(thrownError);
                                }
                            });
                }
            });
        </script>
    </div>
</section>
