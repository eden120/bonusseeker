<script type="text/javascript">
    <!--
    (function() {
        var IE = /*@cc_on!@*/false;
        if(!IE) {
            return;
        }
        if(document.compatMode && document.compatMode == 'BackCompat') {
            if(document.getElementById("af-form-525895254")) {
                document.getElementById("af-form-525895254").className = 'af-form af-quirksMode';
            }
            if(document.getElementById("af-body-525895254")) {
                document.getElementById("af-body-525895254").className = "af-body inline af-quirksMode";
            }
            if(document.getElementById("af-header-525895254")) {
                document.getElementById("af-header-525895254").className = "af-header af-quirksMode";
            }
            if(document.getElementById("af-footer-525895254")) {
                document.getElementById("af-footer-525895254").className = "af-footer af-quirksMode";
            }
        }
    })();
    -->
</script>
<script type="text/javascript">document.getElementById('redirect_d2957ae939deadecbd82799eda226e4f').value = document.location;</script>

<script>
    $(document).ready(function() {
        $(document).ajaxStart(function() {
            $("#wait").css("display", "block");
        });
        $(document).ajaxComplete(function() {
            $("#wait").css("display", "none");
        });

        $('form').submit(function(event) {
            var formData = {
                'meta_web_form_id': $('input[name=meta_web_form_id]').val(),
                'meta_split_id': $('input[name=meta_split_id]').val(),
                'listname': $('input[name=listname]').val(),
                'redirect': $('input[name=redirect]').val(),
                'meta_redirect_onlist': $('input[name=meta_redirect_onlist]').val(),
                'meta_adtracking': $('input[name=meta_adtracking]').val(),
                'meta_message': $('input[name=meta_message]').val(),
                'meta_required': $('input[name=meta_required]').val(),
                'meta_forward_vars': $('input[name=meta_forward_vars]').val(),
                'meta_tooltip': $('input[name=meta_tooltip]').val(),
                'email': $('input[name=email]').val(),
                '_token': '{{ csrf_token() }}'
            };

            $.ajax({
                type: 'POST',
                url: '{{ route('front-end.section.aweber') }}',
                headers: {
                    'Access-Control-Allow-Origin': '*'
                },
                crossDomain: true,
                data: formData,
                dataType: 'json',
                encode: true
            }).done(function(data) {
                if(data[0]['email'] && data[0]['meta_web_form_id']) {
                    $('form').append('<div class="alert alert-success p-b-20"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Thank You for subscribing. Check your email for special bonus offers at NJ’s best online Casinos. Make sure to check your junk folder! Your subscribed email address: (<strong>' + data[0]['email'].toUpperCase() + '</strong>)</div>');
                }

                else if(data[0]['message'] === 'email: Subscriber already subscribed.') {
                    $('form').append('<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>You’re Already Subscribed!</strong> Thanks for signing up to our newsletter!</div>');
                }

                else if(data[0]['email']) {
                    $('form').append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>' + data[0]['email'] + '</strong></div>');
                }

                else {
                    $('form').append('<div class="alert alert-info"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Undefined Error</strong>: Please contact with support team.</div>');
                }

                //console.log(data);
            });

            event.preventDefault();
        });
    });
</script>