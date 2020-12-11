<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<!-- bradcam_area_start -->
<div class="bradcam_area utoflat_bg">
    <h3>Reservation</h3>
</div>
<!-- bradcam_area_end -->

<!-- ================ contact section start ================= -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-none d-sm-block mb-5 pb-4">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=Ewet%20Housing%20Estate%20Uyo%2C%20Nigeria&t=&z=7&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <a href="https://google-map-generator.com">google map generator</a>
                        </div>
                        <style>
                            .mapouter{position:relative;text-align:right;height:400px;width:100%;}
                            .gmap_canvas {overflow:hidden;background:none!important;height:400px;width:100%;}
                        </style>
                    </div>  
                </div>
            </div>
        </div>
        <?php
 
            //response generation function
            $response = "";
 
            //function to generate response
            function my_contact_form_generate_response($type, $message){
 
                global $response;
 
                if($type == "form-success") $response = "<div class='form-success'>{$message}</div>";
                else $response = "<div class='form-error'>{$message}</div>";
 
            }

            //response messages
            $not_human       = "Human verification incorrect.";
            $missing_content = "Please supply all information.";
            $email_invalid   = "Email Address Invalid.";
            $message_unsent  = "Message was not sent. Try Again.";
            $message_sent    = "Thanks! Your message has been sent.";
            
            //user posted variables
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $message = isset($_POST['message']) ? $_POST['message'] : '';
            $human = isset($_POST['human']) ? $_POST['human'] : '';
            $submitted = isset($_POST['submitted']) ? $_POST['submitted'] : '';
            
            //php mailer variables
            $to = get_option('admin_email');
            $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
            $headers = 'From: '. $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

            if(!$human == 0){
                if($human != 2) my_contact_form_generate_response("form-error", $not_human); //not human!
                else {
               
                    //validate email
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                        my_contact_form_generate_response("form-error", $email_invalid);
                    else {
                        //validate presence of name and message
                        if(empty($name) || empty($message) || empty($subject)){
                            my_contact_form_generate_response("form-error", $missing_content);
                        }
                        else {
                            $sent = wp_mail($to, $subject, strip_tags($message), $headers);
                            if($sent) my_contact_form_generate_response("form-success", $message_sent); //message sent!
                            else my_contact_form_generate_response("form-error", $message_unsent); //message wasn't sent
                        }
                    } 
                }
            }
            else if ($submitted) my_contact_form_generate_response("form-error", $missing_content);
        ?>

        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Get in Touch</h2>
            </div>
            <div class="col-lg-8">
                <?php echo $response; ?>
                <form class="form-contact contact_form" action="<php the_permalink(); ?>" method="post" id="contactForm" novalidate="novalidate">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" value="<?php echo esc_attr( $message ); ?>" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" value="<?php echo esc_attr( $name); ?>" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name *">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" value="<?php echo esc_attr( $email ); ?>" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email *">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" value="<?php echo esc_attr( $subject ); ?>" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input class="form-control valid" name="human" id="human" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Human Verification'" placeholder="Human Verification *">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            + 3 = 5
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="submited" value="1" type="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>11251 Richmond Avenue F 104 -105, Houston, TX 77082, USA</h3>
                        <br>
                        <h5>Ewet Housing Estate, Uyo</h5>
                        <p>C/O Destiny International Missions</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>+234 803 565 2365</h3>
                        <p>Week days from 9am to 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>admin@utoessienofficial.com.ng</h3>
                        <p>Regards all queries</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

<?php get_footer(); ?>