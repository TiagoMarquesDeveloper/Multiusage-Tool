// Unit Select
$('.settings .gear').on('click', function() {
  $(this).parent().toggleClass('active');
})

var wUnit = 'c';

$('input[name="unit"]').on('change', function() {
  if ($(this).val() == 'f') {
    wUnit = "c";
  } else {
    wUnit = "c";
  }

});

$('input[name="unit"]').on('click', function() {
  weather($('.city h1').text(), '', wUnit);
})

// Geolocation

if ("geolocation" in navigator) {
  $('.js-geolocation').show();
} else {
  $('.js-geolocation').hide();
}

function GPS(){

  $('#weather').prepend('<div class="loading"></div>');
  navigator.geolocation.getCurrentPosition(function(geo) {
    weather(geo.coords.latitude + ',' + geo.coords.longitude, wUnit);
  });
};

// Initiate 
var theLocation = $('#location').val();

if (theLocation === '') {
  var theLocation = "Lisbon, Lisbon";
}

weather(theLocation, ' ', wUnit);

function obterTempo(){
  weather($('#location').val(), '', wUnit);
};

// Get the Weather! 
function weather(location, woeid, unit) {

  $.simpleWeather({
    location: location,
    woeid: woeid,
    unit: "c",
    success: function(w) {

      $('.loading').fadeOut();

      // Style background for hot/cold temps 
      if (w.units.temp === 'F') {
        if (w.temp > 80) {
          $('body').addClass('hot').removeClass('cold');
        } else if (w.temp < 40) {
          $('body').addClass('cold').removeClass('hot');
        } else {
          $('body').removeClass('hot cold');
        }
      }

      // If there isn't a region, show the country instead
      if (w.region === '') {
        w.region = w.country;
      }

      // Current conditions data
      var displayLoc = w.city + ', ' + w.region;
      $(".city h1").html(displayLoc);
      $('.current-icon').addClass('icon-' + w.code);
      $('.current-temp').html(w.temp + '&deg;' + w.units.temp);
      //$('.current-desc').html(w.currently);

      // 5 Day Forecast
      var future = "";
      var length = 5;

      $(".five-day").html(future);

      // Last updated
      var timestamp = moment(w.updated);
      $('.last-updated span').html(moment(timestamp).fromNow());

    },
    error: function(error) {
      $(".weather").html('<p>Erro! Reinicie a aplicação!</p>');
    }

  });

};