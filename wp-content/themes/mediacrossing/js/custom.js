$(document).ready(function(){  

	/* Scroll doux entre les strates */
    $('a[href*="#"]').click(function(){  
        var theId = $(this).attr("href"); // Récupère l'url
        theId = theId.split("#"); // Garde que la valeur après #
        theId = theId[1];
      
        $('html, body').animate({  // Scroll jusqu'à la section désignée
            scrollTop:$('#'+theId).offset().top  
        }, 'slow');  
        return false;  
    });  

    /* Menu sticky */
    $(window).scroll(function(){
    	console.log($(window).scrollTop());

    	var hauteur = $(window).scrollTop();
    	if(hauteur >= 80){
    		$('#masthead').addClass('sticky');
    	}else{
    		$('#masthead').removeClass('sticky');
    	}
    	
    });

});