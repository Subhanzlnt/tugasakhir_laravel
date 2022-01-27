$(function(){

$("#quantity2").append('<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>');
$(".qtybutton").on("click", function () {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    var stok = $button.parent().find("span").text();
    console.log(stok);
    if ($button.hasClass("inc")) {
      var newVal = parseFloat(oldValue) + 1;
      if (newVal > stok) {
         newVal = oldValue;
          alert("stok tidak cukup");
      }
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 1;
        }
    }
    $button.parent().find("input").val(newVal);
    document.getElementById('qty3').value = newVal;
  });
});
