<?php  require_once("../core/includes.php");
    // unique html head vars
    $title = 'Home Page';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");

?>

    <div class="container">
        <div id="contact_info">

                <h2>Contact Us</h2>
                <?php

                if( !empty($_POST) ){

                    echo '<div id="errorMsg">';

                    if( empty($_POST['name']) ){
                        echo '* Name field is empty<br>';
                    }
                    if( empty($_POST['subject']) ){
                        echo '* Last subject field is empty<br>';
                    }
                    if( empty($_POST['email']) ){
                        echo '* Email field is empty<br>';
                    }
                    if( empty($_POST['message']) ){
                        echo '* Message field is empty<br>';
                    }

                    echo '</div>';

                    // the message

                    echo '<div id="successMsg">';

                    if( !empty($_POST['name']) && !empty($_POST['subject']) && !empty($_POST['email']) && !empty($_POST['message'])){


                        require_once '../elements/html_email.php';

                        $messagePrinted = 'Thank you, '.$_POST['name'].' for your feedback!!<br>';

                        // send email
                        echo $messagePrinted;

                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        mail('elaine.polanik@gmail.com', 'kcarisse@digitalartschool.com', $msg, $headers);

                    }

                    echo '</div>';
                }

                ?>
                <form method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name">
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label>Subject</label>
                                <input class="form-control" type="text" name="subject">
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="form-control" type="text" name="email">
                            </div><!-- .form-group -->

                              <div class="form-group">
                                <label for="exampleFormControlTextarea1">Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="message"></textarea>
                              </div><!-- .form-group -->
                              <input class="btn btn-success" type="submit" value="Submit">
                        </div><!-- .col-md-6 -->

                        <div class="col-md-6">
                            <div id="contact-group" class="form-group">
                                <h3>Contact Info:</h3>
                                <h5>Manager-Elaine Polanik</h5>
                                <p>250-300-1791</p>
                                <p>thecanadianfibretrail.com</p>
                            </div>
                        </div><!-- .col-md-4 -->
                    </div><!-- .row -->
                </form><!-- .post -->
        </div><!-- .contact_info -->
    </div><!-- .container -->





<?php require_once("../elements/footer.php");
