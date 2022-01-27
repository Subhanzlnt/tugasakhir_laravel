$(function(){
var n = document.getElementById('jumlah').value;
var harga = [];
var totals = [];
var stok = [];
for (var i = 0; i < n; i++) {
 totals.push(parseInt($('#total'+i).html().replace('Rp.','').replace('.','').replace('/Hari','')));
 harga.push(parseInt($("#harga"+i).text().replace('Rp.','').replace('.','').replace('/Hari','')));
 stok.push(parseInt($("#stok_awal"+i).text()));
 //console.log(stok);
 $("#quantity"+i).append('<div class="dec qtybutton qtybutton'+i+'">-</div><div class="inc qtybutton qtybutton'+i+'">+</div>');
  $(".qtybutton"+i).on('click', {id: i}, function (e) {
   var $button = $(this);
   var old = $button.parent().find("input").val();
   if ($button.hasClass("inc")) {
     var newValue = parseFloat(old) + 1;
     if (old >= stok[e.data.id]) {
        newValue = old;
         alert("stok tidak cukup");
     }
   } else {
       // Don't allow decrementing below zero
       if (old > 1) {
           var newValue = parseFloat(old) - 1;
       } else {
           newValue = 1;
       }
   }
   $button.parent().find("input").val(newValue);
   var total = harga[e.data.id]*newValue;
   totals = Object.assign([], totals, {[e.data.id]: total});
   var	number_string = total.toString(),
    sisa 	= number_string.length % 3,
     rupiah 	= number_string.substr(0, sisa),
     ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

     if (ribuan) {
       separator = sisa ? '.' : '';
       rupiah += separator + ribuan.join('.');
     }

    $('#total'+e.data.id).text('Rp. '+rupiah);
    $('#total-input'+e.data.id).val(total);
    var sum_durasi = $("#durasi").val();

    // console.log(sum_durasi);
    var sumTotal = eval(totals.join("+"))*sum_durasi;
    var	numbers = sumTotal.toString(),
      sisas 	= numbers.length % 3,
      rupiahs 	= numbers.substr(0, sisas),
      ribuans 	= numbers.substr(sisas).match(/\d{3}/g);

      if (ribuans) {
        separator = sisas ? '.' : '';
        rupiahs += separator + ribuans.join('.');
      }
        $('#totals').text('Rp. '+rupiahs);
        $('#total_semua').val(sumTotal);
        $('#total_awal').val('Rp. '+rupiahs);
   });
 }
});
