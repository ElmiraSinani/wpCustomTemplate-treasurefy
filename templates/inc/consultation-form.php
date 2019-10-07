
<?php
if( isset($_POST['SEND']) ){
    
       
    $apiKey = '93c753d9db04316c30ec5d7d511cedc8-us10';
    $listId = 'b7c05ff889';
    $double_optin=false;
    $send_welcome=false;
    $email_type = 'html';
    $email = $_POST['email'];
    //replace us2 with your actual datacenter
    $submit_url = "http://us10.api.mailchimp.com/1.3/?method=listSubscribe";
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
    var_dump($result);
    curl_close ($ch);
    $data = json_decode($result);
    if ($data->error){
        echo $data->error;
    } else {
        echo "Got it, you've been added to our email list.";
    }
    
}
   

?>
<div class="free-consultation">
    <div class="consult-form">
        <div class="action-btns">
            <div class="close">x</div>                    
        </div>
        <h1>Tell us about your firm and the challenges you are facing</h1>
        <div class="form">
            <form action="" method="post">

                <input name="fname" type="text" placeholder="First name*" />
                <input name="lname" type="text" placeholder="Last name*" />
                <input name="email" type="email" placeholder="Email*" />
                <input name="phone" type="tel" placeholder="Phone" />
                <input name="cname" type="text" placeholder="Company name*" />
                <select name="service" class="arrow-icon">
                    <option value="">What service interests you most? </option>
                    <option value="s1">Service 1 </option>
                    <option value="s2">Service 2</option>
                </select>
                <textarea name="message" placeholder="Message*"></textarea>

                <!--<button type="button">Yes! I want a free <br/> 20-minute consultation </button>-->
                <button name="SEND" type="submit">Yes! I want a free <br/> 20-minute consultation </button>
            </form>
        </div>
    </div>
    <div class="open-form-btn">Get a Free Consultation</div>            
</div>