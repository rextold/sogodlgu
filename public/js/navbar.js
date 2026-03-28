

var $navbar = $('#navbar').offset().top,
    $window = $(window);

$window.scroll(function() {
    if ( $window.scrollTop() >= 27 ) {
        $('#navbar').css({"top": 0, "width": "100%","right": 0}).animate(0);
        $('.navbar-brand').css({"display":"block"});
        console.log($navbar);
        console.log($window.scrollTop());
    }else{
        $('#navbar').css({"top": "27px", "width": "477px","right": "26px"}).animate(0);   
        $('.navbar-brand').css({"display":"none"});
    }
});