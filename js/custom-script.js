 $(document).ready(function(){     
     
    $('.show-front-menu').on( 'click', function(){
        $('.page-menu').hide();
        $('.hide-menu').show();
    });
  
    $('.open-menu-btn').on('click', function(e){ 
        $(".left-sidebar").animate({"left":"0px"}, "slow");
    });
    
    $('.mobile-close').on('click', function(e){ 
        $(".left-sidebar").animate({"left":"-265px"}, "slow");
    }); 
    
    // Close Mobile menu onclick to outside of menu container
    $(document).mouseup(function(e){
        if (window.matchMedia('(max-width: 1170px)').matches) {
            var menu = $('.left-sidebar');
            if (!menu.is(e.target) // The target of the click isn't the container.
            && menu.has(e.target).length === 0) // Nor a child element of the container
            {
               menu.animate({"left":"-265px"}, "slow");
            }
        }
    });
   
    $('.portfolio-filter a').on('click', function(e){
        e.preventDefault();
        
        $('.portfolio-filter a').removeClass('selected');
        $(this).addClass('selected');
        
        var prtfolioItem = $('.portfolio-item');        
        var filterAttr = $(this).attr('data-filter');        
        prtfolioItem.show();
        
        if ( filterAttr == '*' ){
            prtfolioItem.show();
            return false;
        }
        
        $.each( prtfolioItem, function( i, val ) {         
            if( !$(this).hasClass(filterAttr) ){                
                $( this ).hide();
            }          
        });        
    });
    
    $('.portfolio-gallery .bxslider').bxSlider({
        pagerCustom: '.portfolio-gallery #bx-pager',
        responsive: true
    });
    
    //Consultation form open
    $('.open-form-btn').on( 'click', function(){
        $(this).hide();
        $(this).parent().find('.consult-form').show();
        
        if (window.matchMedia('(max-width: 767px)').matches) {
            var pos = $(window).scrollTop();
            if ( pos < 100 ){
                pos = pos + 100;
            }
            $('.free-consultation').css({"position":"absolute", 'top': pos+'px' });
        }
        
    });    
   
    //Consultation form close
    $('.consult-form .close').on( 'click', function(){
        $('.open-form-btn').css('display', 'inline-block');
        $('.consult-form').hide();
        
        if (window.matchMedia('(max-width: 767px)').matches) {
            var pos = $(window).scrollTop() + 100;
            if ( pos < 100 ){
                pos = pos + 100;
            }
            $('.free-consultation').css({"position":"fixed", 'top': '100px' });
        }
    });
    
     //left menu change styles for mobile
     
    ///var def = parseInt(sidebarH) - parseInt(screenH);
    var sidebarH = $('.left-sidebar').outerHeight();
    var screenH = $(window).height();
   
    if( sidebarH > screenH ){
        
        //var def = sidebarH - windTop;
        $('.left-sidebar').css({"position":"absolute"  });
        $('.left-sidebar').css({ "top":'0px' });
        $( window ).scroll(function(e) {
            e.preventDefault(); 
            var windTop = $(window).scrollTop();
            var def = windTop - (sidebarH - screenH);
            console.log( 'sidebarH ' + sidebarH  );
            console.log( 'ScrollT ' + windTop  );
            console.log( 'screenH ' + screenH  );
            console.log( 'def ' + def );
            
            if ( def <= 0 ){
                $('.left-sidebar').css({ "top":'0px' });
            }else{            
                $('.left-sidebar').css({ "top": (def) + 'px' });
            }
        });
    }
    
    //facebook Api share on click
    $(document).ready(function(){
        $('.share-btn').on( 'click', function(){
            
            FB.ui( {
                method: 'feed',
                name: $(this).attr('data-title'),
                link: $(this).attr('data-link'),
                picture: $(this).attr('data-image'),
                caption: $(this).attr('data-content')
            }, function( response ) {
                console.log( response );

            } );
            
        } );
    });
    
    
    //add error borders on blur when input value is empty
    $('#consultation #fname, #consultation #lname, #consultation #email, #consultation #cname, #consultation #message')
            .blur(function()  {
                if( !$(this).val() ) {
                    $(this).addClass('error-border');
                }
            });
    
    //remove error bordes on focus to input field
    $('#consultation #fname, #consultation #lname, #consultation #email, #consultation #phone, #consultation #cname, #consultation #message')
            .focus(function(){        
                $(this).removeClass('error-border');        
            });

    var postData = true;
    var inputErrorMessage = '';

    // load categories with open registraton form modal 
    $('#submitConsultationForm').on('click', function(event){           
        event.preventDefault();
        
        var api_key = $('#consultation #apyKey').val();
        var list_id = $('#consultation #listId').val();
        var fname = $('#consultation #fname').val();
        var lname = $('#consultation #lname').val();
        var email = $('#consultation #email').val();        
        var phone = $('#consultation #phone').val();
        var cname = $('#consultation #cname').val();
        var service = $('#consultation #service').val(); ///selected option
        var message = $('#consultation #message').val(); 
        
        $('#consultation .required') //red-borders
            .each(function(){
                if( !$(this).val() ) {
                    $(this).addClass('error-border');
                    inputErrorMessage = 'Please fill all required fields.<br/>';
                    postData = false;
                }
        });
        
        //check Phone if number
        if ( phone!='' && !isNumber(phone) ){
            inputErrorMessage = "Phone must contain only numbers.<br/>";
            $('#consultation #phone').addClass('error-border');
            postData = false;
        }
        
        
        if ( inputErrorMessage != '' ){
            $('#consultation .messages')
                        .addClass('error-message-bg')
                        .html(inputErrorMessage); 
        } else {
            $('#consultation .messages')
                        .removeClass('error-message-bg')
                        .html(''); 
        }
       
      
        if( postData ){
            
            $(this).addClass('disabledBtn');
            
            var action = 'maichimpSubscribe';
            var url = ajaxurl + '?action=' + action;
           
            var dataObj = {
                        'api_key': api_key,
                        'list_id': list_id,
                        'fname': fname,
                        'lname': lname,
                        'email': email,                        
                        'phone' : phone,
                        'cname': cname,                        
                        'service': service,
                        'message': message,                        
                    };
            console.log(dataObj);        
            jQuery.post(
                    url,
                    dataObj
                    )
                    .success( function( data ) { 
                                                
                        var obj = jQuery.parseJSON( data ); 
                        console.log(obj.ok);
                        if( obj.ok ){                              
                             $('#submitConsultationForm').removeClass('disabledBtn');
                             $('#consultation .messages')
                                    .removeClass('error-message-bg')
                                    .html(obj.ok);                            
                        } else {
                            $('#consultation .messages')
                                    .addClass('error-message-bg')
                                    .html(obj.error);                            
                        }
                        
                    })
                    dataType: "json"
        } 
        
    });
    
    
 });
 
 
 //input field validate from wild card
function isNumber(val) {
  var regex =  /^([0-9])+$/;
  return regex.test(val);
}