$(function(){
  $( "#datepicker" ).datepicker({
    locale:'id',
     //format:'DD/MMMM/YYYY',
     dateFormat: "yy-mm-dd",
    showOn: 'button',
     minDate: 0
  }).next('button').button({
icons: {
    primary: 'ui-icon-calendar'
}, text:false
});

$( "#datepicker2" ).datepicker({
  locale:'id',
   //format:'DD/MMMM/YYYY',
   dateFormat: "yy-mm-dd",
   showOn: 'button',
   minDate: 0
 }).next('button').button({
     icons: {
     primary: 'ui-icon-calendar'
    }, text:false
  });

  $("#datepicker2").change(function(){
    var hari = 24*60*60*1000;
    var kosong = "";
    var tgl_pinjam = $("#datepicker").val();
    console.log(tgl_pinjam);
    var tgl_awal = new Date($("#datepicker").val());
    var tgl_akhir = new Date($("#datepicker2").val());
    var a = tgl_awal.getTime();
    var b = tgl_akhir.getTime();
    var total_hari = Math.round(Math.round(b-a)/hari);
    var total_awal = $("#total_awal").val();
    var total_semua = $("#total_awal").val().replace('Rp.','').replace('.','').replace('.','').replace('/Hari','');

    console.log(total_semua);
    if (tgl_pinjam.length == 0) {
      $("#datepicker2").val(kosong);
      $("#durasi2").text(kosong);
      $("#durasi").val(1);
      $('#totals').text(total_awal);
      $('#total_semua').val(total_semua);
        alert("Masukan Tanggal Pinjam Terlebih dahulu");
    }
    else if (total_hari <= 1) {
      $("#datepicker2").val(kosong);
      $("#durasi2").text(kosong);
      $("#durasi").val(1);
      $('#totals').text(total_awal);
      $('#total_semua').val(total_semua);
      alert("Minimal Peminjaman harus 2 hari");
    }else if (total_hari > 3) {
      $("#datepicker2").val(kosong);
      $("#durasi2").text(kosong);
      $("#durasi").val(1);
      $('#totals').text(total_awal);
      $('#total_semua').val(total_semua);
      alert("Maksimal Peminjaman harus 3 hari");
    }else {
      $("#durasi").val(total_hari);
      $("#durasi2").text(total_hari+" Hari");
        var sumTotal = total_semua*total_hari;
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
    }
  });
});
