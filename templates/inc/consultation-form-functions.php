<?php

add_action('wp_head','trf_ajaxurl');
function trf_ajaxurl() {
?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
<?php
}

//Ajax Action get Categries
add_action( 'wp_ajax_maichimpSubscribe', 'maichimpSubscribe' );
add_action( 'wp_ajax_nopriv_maichimpSubscribe', 'maichimpSubscribe' );
function maichimpSubscribe() {
    
    $apiKey = $_POST['api_key'];
    $listId = $_POST['list_id'];
    $double_optin=false;
    $send_welcome=false;
    $email_type = 'html';
    $email = $_POST['email'];
    //replace us10 with your actual datacenter
    //$dataCenter = 'us10';
    $dataCenter = 'us5';
    $submit_url = "http://".$dataCenter.".api.mailchimp.com/1.3/?method=listSubscribe";
    $data = array(
        'email_address'=>$email,
        'apikey'=>$apiKey,
        'id' => $listId,
        'merge_vars' => array(
                    'FNAME'=>$_POST['fname'], 
                    'LNAME'=>$_POST['lname'],
                    'PHONE' => $_POST['phone'],
                    'CNAME'=>$_POST['cname'], 
                    'SERVICE'=>$_POST['service'], 
                    'MESSAGE'=>$_POST['message']            
        ),
        'double_optin' => $double_optin,
        'send_welcome' => $send_welcome,
        'email_type' => $email_type
    );
    $payload = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $submit_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));

    $result = curl_exec($ch);
   
    curl_close ($ch);
    $data = json_decode($result);
    
    if ($data->error){
        echo json_encode( array('error'=>$data->error) );
        die();
    } else {
        echo json_encode( array('ok'=>'Thank you! Your message has been sent.') );
        die();
    }
}


function getConsultationForm($mailchimpLsitID){
    
    $apiKey = get_option('maichimpApiKey') ? get_option('maichimpApiKey') : '';
       
    
?>
<div class="free-consultation">
    <div class="consult-form" id="consultation">
        <div class="action-btns">
            <div class="close">x</div>                    
        </div>
        <h1>Tell us about your firm and the challenges you are facing</h1>
        <div class="form">
            <form action="" method="post">
                <input id="apyKey" type="hidden" name="apiKey" value="<?php echo $apiKey; ?>" />
                <input id="listId" type="hidden" name="listID" value="<?php echo $mailchimpLsitID; ?>" />
                <input id="fname" class="required" name="fname" type="text" placeholder="First name*" />
                <input id="lname" class="required" name="lname" type="text" placeholder="Last name*" />
                <input id="email" class="required" name="email" type="email" placeholder="Email*" />
                <input id="phone" name="phone" type="tel" placeholder="Phone" />
                <input id="cname" class="required" name="cname" type="text" placeholder="Company name*" />
                <select id="service" name="service" class="arrow-icon">
                    <option value="">What service interests you most? </option>
                    <option value="s1">Service 1 </option>
                    <option value="s2">Service 2</option>
                </select>
                <textarea id="message" class="required" name="message" placeholder="Message*"></textarea>
                <div class="messages"></div>
                <!--<button type="button">Yes! I want a free <br/> 20-minute consultation </button>-->
                <button id="submitConsultationForm" name="SEND" type="button">Yes! I want a free <br/> 20-minute consultation </button>
            </form>
        </div>
    </div>
    <div class="open-form-btn">Get a Free Consultation</div>            
</div>
<?php
    
    
    
}