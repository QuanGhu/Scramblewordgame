<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box-content">
                    <div class="start-box">
                        <h2 id="word" class="text1"></h2>
                        <form method="post" id="formanswer">
                            <div class="form-group">
                                <label for="email" class="white">Please input your answer here:</label>
                                <input type="text" class="form-control" name="answer"/>
                             </div>
                             <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                getWord();
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
                                        if(message.message=='true'){
                                            $('#message-box').addClass('alert-success');
                                            $('#message-type').html('Congratulation !');
                                            $('#message').html('Your answer is correct !');
                                            $.alert({
                                                title: 'Congratulation !!',
                                                type: 'blue',
                                                content: 'Your answer is correct, your score will increase by 1 !',
                                            });
                                        }
                                        else {
                                            $.alert({
                                                title: 'Ooops !!',
                                                type: 'red',
                                                content: 'Your answer is correct, your score will decrease by 1 !',
                                            });
                                        }
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
