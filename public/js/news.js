$(document).ready(function(){
    $(".linkfeat").hover(
        function () {
            $(".textfeat").show(500);
        },
        function () {
            $(".textfeat").hide(500);
        }
    );
});
$(function(){
  var tickerLength = $('.an ul li').length;
  var tickerHeight = $('.an ul li').outerHeight();
  $('.an ul li:last-child').prependTo('.an ul');
  $('.an ul').css('marginTop',-tickerHeight);
  function moveTop(){
    $('.an ul').animate({
        top : -tickerHeight
    },300, function(){
      $('.an ul li:first-child').appendTo('.an ul');
        $('.an ul').css('top','');
      });
    }
  setInterval( function(){
    moveTop();
  }, 6000);
});


var currentSection = 1;
var sections;

$('document').ready(function () {
  setCurrentSection();
  setSectionIndicator(1);
  $('.navigation').click(function () {
    if (this.id == "nav-left") { 
      if (currentSection != 1) {
        scrollToSection(currentSection - 1);
        $('#nav-left').prop('disabled', true);
      }
    }
    else  {
      if (currentSection+1 <= sections) {
        scrollToSection(currentSection + 1);
        $('#nav-right').prop('disabled', true);
      }
    }
  });

  $('.navigation').on('mouseover', function() {
    if (this.id == 'nav-left') {
      if (currentSection != 1) $(this).addClass('navigation-hover');
    } else {
      if (currentSection+1 <= sections) $(this).addClass('navigation-hover');
    }
  }).on('mouseout', function () {
    $(this).removeClass('navigation-hover');
  });

  $(window).resize(function() {
    setCurrentSection();
    setSectionIndicator(currentSection);
  });

});

function setCurrentSection() {
  var carouselWidth = $('.carousel').width();
  var projectWidth = $('.project').width() + parseInt($('.project').css('margin-right'));
  var projectsQtt = $('.project').size();
  var projectsPerSection = carouselWidth / projectWidth;
  sections = Math.round(projectsQtt / projectsPerSection);
  var rollLeft = Math.abs(parseInt($('.roll').css('left')));
  if (rollLeft === 0) currentSection = 1;
  else {
    currentSection = Math.round((rollLeft / carouselWidth) + 1);
  }
  $('#nav-left').prop('disabled', false);
  $('#nav-left').removeClass('navigation-hover');
  $('#nav-right').prop('disabled', false);
  $('#nav-right').removeClass('navigation-hover');
}

function scrollToSection(section) {
  var width = $('.carousel').width() * (Math.abs(currentSection - section));
  if (section < currentSection) {
    $('.roll').animate({left: '+='+width}, "slow", setCurrentSection);
  } else {
    $('.roll').animate({left: '-='+width}, "slow", setCurrentSection);
  }
  setSectionIndicator(section);
}

function setSectionIndicator(section) {
  $('.sections').html('');
  for (var i = 1; i <= sections; i++) {
    if (i == section) circleClass = 'fa fa-circle';
    else circleClass = 'fa fa-circle-thin';
    $('.sections').html($('.sections').html() + '<i class="'+circleClass+' indicator" data-id="'+i+'" aria-hidden="true"></i>');
  }
  $('.indicator').click(function() {
    scrollToSection($(this).attr('data-id'));
  });
}

