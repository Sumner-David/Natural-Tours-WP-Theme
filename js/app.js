


//Whever scrolled
jQuery(document).scroll(function() {
    //Toggle the class when the navbar.scrolltop is greater than the navbar's height. If true, stick it on. If false, remove it
    jQuery('.navbar').toggleClass('scrolled', (jQuery(this).scrollTop() > jQuery('.navbar').height()))
})
