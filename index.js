$(function() {
  var imageLoader = document.getElementById('imageLoader');
    imageLoader.addEventListener('change', handleImage, false);
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

var img = new Image();
function handleImage(e){
    var reader = new FileReader();
    reader.onload = function(event){
        
        img.onload = function(){
          if(img.width > 700 || img.height > 400){
            canvas.width = 700;
            canvas.height = 400;
            ctx.drawImage(img, 0, 0, canvas.width, canvas.height)
          }
          else{
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img,0,0);
          }
        }
        img.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);     
}

  var $reset = $('#resetbtn');
 
  var $color = $('#colorbtn');

  var $crossprocess = $('#crossprocessbtn');

  var $save = $('#savebtn');

  /* As soon as slider value changes call applyFilters */
  $('input[type=range]').change(applyFilters);

  function applyFilters() {
    var hue = parseInt($('#hue').val());
    var cntrst = parseInt($('#contrast').val());
    var vibr = parseInt($('#vibrance').val());
    var sep = parseInt($('#sepia').val());
    var bright = parseInt($('#brightness').val());

    Caman('#canvas', img, function() {
      this.revert(false);
      this.hue(hue).contrast(cntrst).vibrance(vibr).sepia(sep).brightness(bright).render();
    });
  }

  /* Creating custom filters */

  $reset.on('click', function(e) {
    $('input[type=range]').val(0);
    Caman('#canvas', img, function() {
      this.revert(false);
      this.render();
    });
  });

  /* In built filters */
  $color.on('click', function(e) {
    Caman('#canvas', img, function() {
      this.colorize(60, 105, 218, 10).render();
    });
  });

  $crossprocess.on('click', function(e) {
    Caman('#canvas', img, function() {
      this.crossProcess().render();
    });
  });


  /* You can also save it as a jpg image, extension need to be added later after saving image. */

  $save.on('click', function(e) {
    Caman('#canvas', img, function() {
      this.render(function() {
        this.save('png');
      });
    });
  });
});