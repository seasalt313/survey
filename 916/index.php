

    <div class="tytext col-md-12 col-lg-12">
      
        <h3 class="thankyou">Thank you for participating!</h3>

        <p class="intro">
          Our Spring Cleaning Survey promotion has ended. We want to thank our loyal fans and customers who participated, and we value all of your compliments and suggestions.
          <br />
          <br />
          Missed the promotion? There are still several ways to get the latest Heels.com promotions and coupons.
          <br/>
          <br/>
          1. Join our Email Newsletter and get the latest Heels.com promotions and coupons delivered straight to your email inbox. Signup below by entering your email address.
        </p>

        <div class="email_Area">

        <form action="" method="post" name="vee24_form" id="vee24_form">
            <label class="lab" for="email">Email Address</label>
            <input type="text" name="email" id="email" class="text" />
        </form>

        <div class="button_survey">
            <button type="submit" id="submit">
                Submit
            </button>
        </div>
        </div>

        <p class="intro">
          2. Become our
          <a href="http://www.facebook.com/weloveheels" title="Heels.com on Facebook" rel="nofollow" class="surv_link">Fan on Facebook</a> at <a href="http://www.facebook.com/weloveheels" title="Heels.com on Facebook" rel="nofollow" class="surv_link">facebook.com/weloveheels</a>. Check out the latest sneak peaks at upcoming styles, get exclusive coupons and promotions, and share your love of Heels with other fans!
        </p>

        <p class="intro">
          3. Follow us on <a href="http://www.twitter.com/highheels" title="Heels.com on Twitter" rel="nofollow" class="surv_link">Twitter @highheels</a> to get our latest Heels news, staff favorites, and special promotions exclusive to Twitter. Join the conversation today at <a href="http://www.twitter.com/highheels" title="Heels.com on Twitter" rel="nofollow" class="surv_link">twitter.com/highheels !</a>
        </p>
        </div>

<!-- by: Mariam Qasim and Erin Olson -->

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#submit', function (event) {
            event.preventDefault();
            $this = $(this);
            $('#top').animate({opacity: 0.5});
            $this.text("Wait..");
            url = "/survey/add/vee24";
            data = $('#vee24_form').serialize();
            $.post(url, data, function (response) {
                //display our html response....
                if (response.success) {
                    $('#top').animate({opacity: 1.0});
                    $('#top').html(response.html);
                } else {
                    alert(response.error);
                    $this.text("Submit");
                    $('#top').animate({opacity: 1.0});
                    $('#email').css({background: '#f9c'});
                }
            }, "json");
        });
    });
</script>
