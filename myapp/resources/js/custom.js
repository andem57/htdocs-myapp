tgact = (function() { $('.test-list > a').click(function(){
  $(this).parent().toggleClass('active');
  });
  $('.test-list > a').not('li:has(ul) > a').css('text-decoration', 'none')
  .css('color', 'black').css('cursor', 'default');
});

$(document).ready(function(){
$("#btn-load").click(function (e) {
  if (!$("#theForm")[0].checkValidity()) {
    $('#divlist').html('<span style="color:red;" > Неправильный формат в поле Фон, необходим - (0-255,0-255,0-255)</span>');
    return false;
  }

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  e.preventDefault();
  var pData = {
            background: $('#bckgr').val(),
            depth: $('#dpth').val(),
        };
  var type = "POST";
  var ajurl= 'http://localhost/formlist.php';
  $.ajax({
        type: type,
        data: pData,
    dataType: 'json',
          url: ajurl,
          success: function (jsondata) {
//            console.log(jsondata);
            function mklist (jsdt) {
              var mlist = '<ul>';
              for (var i = 0; i < jsdt.length; i++) {
                mlist += '<li class="test-list"><a href="#">' + jsdt[i].name + '</a>'
                + ((jsdt[i].type == 1) ? mklist(jsdt[i].value) : ' - ' + jsdt[i].value) + '</li>';
              }
              mlist += '</ul>';
              return mlist;
            }
            var whtml = mklist(jsondata);
            $('#divlist').html('');
            $('#divlist').append(whtml);
          },
          error: function (jsondata) {
              console.log('error');
          }
      });

      setTimeout("tgact()", 50);
      $('#wbckgr').css('background-color','rgb'+pData.background);
const rgb2hex = (rgb) => `#${rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/).slice(1).map(n => parseInt(n, 10).toString(16).padStart(2, '0')).join('')}`
      var wvl = ''+$('#wbckgr').css('background-color');
      console.log(wvl);
      function invert(rgb) {
        rgb = Array.prototype.join.call(arguments).match(/(-?[0-9\.]+)/g);
        for (var i = 0; i < rgb.length; i++) {
          rgb[i] = (i === 3 ? 1 : 255) - rgb[i];
        }
        return 'rgb('+rgb.toString()+')';
      }
      wvl = invert(wvl);
      var whex = rgb2hex(wvl);
      $('#wbckgr').css('color',whex);

});
});
