<?php

add_action( 'init', 'default_gl_titles' );

function default_gl_titles() {
    
    $deprecated = null;
    $autoload = 'no';
    
    add_option( 'standardLogo', 'wp-content/themes/treasurefy/images/headerLogo.png', $deprecated, $autoload );
    
    //social icons defoult links
    add_option( 'facebook', 'https://www.facebook.com/Treasurefy/', $deprecated, $autoload );
    add_option( 'facebook', 'https://www.facebook.com/Treasurefy/', $deprecated, $autoload );
    add_option( 'googlePlus', 'https://plus.google.com/+Treasurefy/posts', $deprecated, $autoload );
    add_option( 'twitter', 'https://twitter.com/treasurefy', $deprecated, $autoload );
    add_option( 'linkedIn', 'https://www.linkedin.com/company/2717539?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A2717539%2Cidx%3A1-1-1%2CtarId%3A1457681716881%2Ctas%3Atreasurefy', $deprecated, $autoload );
    add_option( 'mail', 'info@treasurefy.com', $deprecated, $autoload );
    
    //mailchimp Api 
    add_option( 'maichimpApiKey', 'd3d588e667b132c63371157a2c7d9ebf-us5', $deprecated, $autoload );
    add_option( 'maichimpDefaultList', 'c999352a2e', $deprecated, $autoload );
    add_option( 'maichimpPortfolioList', '6a7c1b25fa', $deprecated, $autoload );
    
    add_option( 'footerAddress', '817 Broadway, 5th Floor<br/>New York, NY 10003', $deprecated, $autoload );
    add_option( 'footerPhone', '(646) 775-2838', $deprecated, $autoload );
    add_option( 'footerMail', 'info@treasurefy.com', $deprecated, $autoload );
    add_option( 'footerCopy', '&copy; 2016 Treasurefy, All Rights Reserved', $deprecated, $autoload );
   
    add_option( 'footerCopy1', 'Web Design and Development', $deprecated, $autoload );
    
    
}


add_action('admin_menu' , 'gl_titles_settings');

function gl_titles_settings() {
    add_menu_page('Global Settings', 'Global Settings', 'manage_options', 'global-settings', 'gl_settings_callback', '', '25');
}

function  gl_settings_callback(){
    
    $facebook = $_POST['facebook'] ? $_POST['facebook'] : get_option('facebook'); 
    $googlePlus = $_POST['googlePlus'] ? $_POST['googlePlus'] : get_option('googlePlus'); 
    $twitter = $_POST['twitter'] ? $_POST['twitter'] : get_option('twitter'); 
    $linkedIn = $_POST['linkedIn'] ? $_POST['linkedIn'] : get_option('linkedIn'); 
    $mail = $_POST['mail'] ? $_POST['mail'] : get_option('mail'); 
    
    $standardLogo = $_POST['standardLogo'] ? $_POST['standardLogo'] : get_option('standardLogo'); 
    
    $footerAddress = $_POST['footerAddress'] ? $_POST['footerAddress'] : get_option('footerAddress'); 
    $footerPhone = $_POST['footerPhone'] ? $_POST['footerPhone'] : get_option('footerPhone'); 
    $footerMail = $_POST['footerMail'] ? $_POST['footerMail'] : get_option('footerMail'); 
    $footerCopy = $_POST['footerCopy'] ? $_POST['footerCopy'] : get_option('footerCopy'); 
    $footerCopy1 = $_POST['footerCopy1'] ? $_POST['footerCopy1'] : get_option('footerCopy1'); 
    
    $maichimpApiKey = $_POST['maichimpApiKey'] ? $_POST['maichimpApiKey'] : get_option('maichimpApiKey'); 
    $maichimpDefaultList = $_POST['maichimpDefaultList'] ? $_POST['maichimpDefaultList'] : get_option('maichimpDefaultList'); 
    $maichimpPortfolioList = $_POST['maichimpPortfolioList'] ? $_POST['maichimpPortfolioList'] : get_option('maichimpPortfolioList'); 
    
    
    
    $footerContacts = $_POST['footerContacts'] ? $_POST['footerContacts'] : get_option('footerContacts'); 
    $footerLogo = $_POST['footerLogo'] ? $_POST['footerLogo'] : get_option('footerLogo'); 
    
    
    
  
        
    if( isset($_POST['saveSettings'])){
       saveTitlesOptions($_POST);
    }
    
    
    ?>
            <style type="text/css">
                .cptItem label{font-weight:bold;display: block;}
                .cptItem input[type='text'],.cptItem input[type='email'], textarea {width: 60%;}
                 h1{ font-size: 17px; margin: 20px 0; color: #215988;}             
            </style>
            <form action="" method="post">
            <div class="form_container">
                <hr/>
                
                <h1>Social Icon Links</h1>
                <p class="cptItem">
                    <label for="fb">Facebook: </label>
                    <input id="fb" name="facebook" type="text" value="<?php echo $facebook; ?>" />
                </p>
                <p class="cptItem">
                    <label for="gp">Google +: </label>
                    <input id="gp" name="googlePlus" type="text" value="<?php echo $googlePlus; ?>" />
                </p>
                <p class="cptItem">
                    <label for="tw">Twitter: </label>
                    <input id="tw" name="twitter" type="text" value="<?php echo $twitter; ?>" />
                </p>
                <p class="cptItem">
                    <label for="in">LinkedIn: </label>
                    <input id="in" name="linkedIn" type="text" value="<?php echo $linkedIn; ?>" />
                </p>
                <p class="cptItem">
                    <label for="mail">Mail: </label>
                    <input id="mail" name="mail" type="text" value="<?php echo $mail; ?>" />
                </p>
                
                <h1>Mailchimp Settings</h1>
                <p class="cptItem">
                    <label for="maichimpApiKey"> Maichimp Api Key: </label>
                    <input id="maichimpApiKey" name="maichimpApiKey" type="text" value="<?php echo $maichimpApiKey; ?>" />
                </p>
                <p class="cptItem">
                    <label for="maichimpDefaultList">  Default Maichimp List ID: </label>
                    <input id="maichimpDefaultList" name="maichimpDefaultList" type="text" value="<?php echo $maichimpDefaultList; ?>" />
                </p>
                <p class="cptItem">
                    <label for="maichimpPortfolioList"> Portfolio Pages Maichimp List ID: </label>
                    <input id="maichimpPortfolioList" name="maichimpPortfolioList" type="text" value="<?php echo $maichimpPortfolioList; ?>" />
                </p>
                               
                <hr/>
                <h1>Header Block</h1>
                <p class="cptItem">
                    <label for="standardLogo">Header Logo: </label>
                    <input name="standardLogo" type="text" value="<?php echo $standardLogo; ?>" />
                </p>
                       
                <hr/>
                <h1>Footer Block</h1>   
                <p class="cptItem">
                    <label for="footerLogo">Footer Logo: </label>
                    <input type="text" id="footerLogo" name="footerLogo" value="<?php echo $footerLogo; ?>" />
                </p>
                <p class="cptItem">
                    <label for="footerAddress">Address: </label>
                    <textarea id="footerAddress" name="footerAddress"><?php echo stripslashes($footerAddress); ?></textarea>
                </p>
                
                <p class="cptItem">
                    <label for="footerPhone">Phone: </label>
                    <input name="footerPhone" type="text" value="<?php echo $footerPhone; ?>" />
                </p>
                <p class="cptItem">
                    <label for="footerMail">eMail Address: </label>
                    <input name="footerMail" type="text" value="<?php echo $footerMail; ?>" />
                </p>
                <p class="cptItem">
                    <label for="footerCopy">Copyrights: </label>
                    <input name="footerCopy" type="text" value="<?php echo $footerCopy; ?>" />
                </p>
                <p class="cptItem">
                    <label for="footerCopy1">Under Copy Text: </label>
                    <input name="footerCopy1" type="text" value="<?php echo $footerCopy1; ?>" />
                </p>
                
                
               
                <hr/>                
                <p class="cptItem">                   
                    <input name="saveSettings" type="submit" value="Save Settings" />
                </p>
            </div>
            </form>
    <?php
}
function saveTitlesOptions($data){
    
    extract($_POST);
    
    update_option( 'facebook', $facebook );
    update_option( 'googlePlus', $googlePlus );
    update_option( 'twitter', $twitter );
    update_option( 'linkedIn', $linkedIn );
    update_option( 'mail', $mail );
    
    update_option( 'maichimpApiKey', $maichimpApiKey );
    update_option( 'maichimpDefaultList', $maichimpDefaultList );
    update_option( 'maichimpPortfolioList', $maichimpPortfolioList );
    
    update_option( 'headerContacts', $headerContacts );    
    update_option( 'standardLogo', $standardLogo );    
    update_option( 'retinaLogo', $retinaLogo );
    update_option( 'breadcrumbBg', $breadcrumbBg );
    
    update_option( 'frontBlock1', $frontBlock1 );
    update_option( 'frontBlock2', $frontBlock2 );
    update_option( 'frontBlock3', $frontBlock3 );
    
    update_option( 'footerContacts', $footerContacts );
    update_option( 'footerLogo', $footerLogo );
    update_option( 'footerCopy', $footerCopy );
    update_option( 'footerCopy1', $footerCopy1 );
    update_option( 'footerMail', $footerMail );
    update_option( 'footerPhone', $footerPhone );
    update_option( 'footerAddress', $footerAddress );
    
    
    
        
    return false;
}




