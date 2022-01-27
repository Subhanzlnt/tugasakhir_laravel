var n = document.getElementById('jumlah').value;
var hargas = new Array();
for (var i = 0; i < n; i++) {
  hargas.push(document.getElementById('harga' + i).innerHTML.replace('Rp.', '').replace('.', '').replace('/Hari', ''));
}
var sum = eval(hargas.join("+"))

var number_string = sum.toString(),
  sisa = number_string.length % 3,
  rupiah = number_string.substr(0, sisa),
  ribuan = number_string.substr(sisa).match(/\d{3}/g);

if (ribuan) {
  separator = sisa ? '.' : '';
  rupiah += separator + ribuan.join('.');
}

$('#subtotal').text('Rp. ' + rupiah);
$('#subtotal2').val('Rp. ' + rupiah);

