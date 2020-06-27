jQuery.validator.addMethod('cnh', function(value, element) {
    var ret,
        cnh   = value,
        firstChar = cnh.charAt(0);

    if (cnh.replace(/[^\d]/g, '').length === 11 && firstChar.repeat(11) !== cnh) {

      var dsc = 0;

      for (var i = 0, j = 9, v = 0; i < 9; ++i, --j) {
        v += +(cnh.charAt(i) * j);
      }

      var vl1 = v % 11;
      if (vl1 >= 10) {
        vl1 = 0;
        dsc = 2;
      }

      for (i = 0, j = 1, v = 0; i < 9; ++i, ++j) {
        v += +(cnh.charAt(i) * j);
      }

      var x = v % 11,
        vl2 = (x >= 10) ? 0 : x - dsc;

      ret = '' + vl1 + vl2 === cnh.substr(-2);

    }

    if (ret !== true) return false;

    return true;

  }, 'CNH inválida');

  $(document).ready(function(){
      $("#formulario").validate({
          rules:{
          CampoCPF:{required: true, verificaCPF: true}
          },
          messages:{
          cnh_proprietario:{required: "Digite sua CNH", cnh: "CNH inválida"},
          },
      });
    });
