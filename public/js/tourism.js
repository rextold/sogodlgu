  $(document).ready(function(){
    // options
    var speed = 500; //transition speed - fade
    var autoswitch = true; //auto slider options
    var autoswitch_speed = 5000; //auto slider speed
    
    // add first initial active2 class
    $(".slide").first().addClass("active2");
    
    // hide all slides
    $(".slide").hide;
    
    // show only active2 class slide
    $(".active2").show();
    
    // Next Event Handler
    $('#next').on('click', nextSlide);// call function nextSlide
    
    // Prev Event Handler
    $('#prev').on('click', prevSlide);// call function prevSlide
    
    // Auto Slider Handler
    if(autoswitch == true){
      setInterval(nextSlide,autoswitch_speed);// call function and value 4000
    }
  
  // Switch to next slide
  function nextSlide(){
    $('.active2').removeClass('active2').addClass('oldactive2');
    if($('.oldactive2').is(':last-child')){
      $('.slide').first().addClass('active2');
    } else {
      $('.oldactive2').next().addClass('active2');
    }
    $('.oldactive2').removeClass('oldactive2');
    $('.slide').fadeOut(speed);
    $('.active2').fadeIn(speed);
  }
  
  // Switch to prev slide
  function prevSlide(){
    $('.active2').removeClass('active2').addClass('oldactive2');
    if($('.oldactive2').is(':first-child')){
      $('.slide').last().addClass('active2');
    } else {
      $('.oldactive2').prev().addClass('active2');
    }
    $('.oldactive2').removeClass('oldactive2');
    $('.slide').fadeOut(speed);
    $('.active2').fadeIn(speed);
  }
});
  