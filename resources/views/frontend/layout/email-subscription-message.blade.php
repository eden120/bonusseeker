@if(session()->has('emailSubscriptionSuccess'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success m-b-0 m-t-10" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                <strong>Thank You </strong> for subscribing.<br><br> Check your email in 5 minutes for a special bonus offer up to
                <strong>$40 FREE</strong> at NJ’s best online Casinos.<br><br>Make sure to check your junk folder!<br><br> Your subscribed email address:
                <strong>(
                    <script type="text/javascript">formData.display("email")</script>
                    )</strong>
            </div>
        </div>
    </div>
@endif