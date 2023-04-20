calculateGrandTotal();
count = 1;
$(document).on('click', '.btn-primary', function(e) {
    e.preventDefault();//prevent default of browser
    var parent = $(this).parent().parent();
    parent.find("button#remove").prop('disabled', false);
    var add = parent.clone();
    add.attr("id","tr"+count);
    add.find("input").val("");
    add.find("select").val("");
    count++;
    $(".tbody").append(add);
});

$(document).on('click', '.btn-danger', function(e) {
    e.preventDefault();
    let parent = $(this).parent().parent();;
    let total = parseFloat(parent.find('.total').val()) || 0;
    let grandTotal = parseFloat($('#grandtotal').val()) || 0;
    let updatedtotal = grandTotal-total;
    $('#grandtotal').val(updatedtotal.toFixed(2));
    // Get the ID of the div to be removed
    $(this).parent().parent().remove();
});
$(document).on('input', '.quantity, .rate, .discount', function() {
// $('.quantity, .rate, .discount').on('input', function() {
    var $tr = $(this).closest('tr');
    var quantity = parseInt($tr.find('.quantity').val()) || 0;
    var rate = parseFloat($tr.find('.rate').val()) || 0;
    var discount = parseFloat($tr.find('.discount').val()) || 0;

    var total = (quantity * rate) - ((quantity * rate * discount) / 100);
    $tr.find('.total').val(total.toFixed(2));
    calculateGrandTotal();
});

$(document).ready(function(){
    $("#form-control").on('submit', function(event){
        event.preventDefault(); // Prevent the form from submitting normally
        
        var items = [];
        var quantities = [];
        var rates = [];
        var discounts = [];
        var totals = [];
        
        $("#tbody tr").each(function() {
            var item = $(this).find(".item").val();
            var quantity = $(this).find(".quantity").val();
            var rate = $(this).find(".rate").val();
            var discount = $(this).find(".discount").val();
            var total = $(this).find(".total").val();
            
            items.push(item);
            quantities.push(quantity);
            rates.push(rate);
            discounts.push(discount);
            totals.push(total);
        });
        
        var grandtotal = $("#grandtotal").val();
        
        formData ={
            items:items,
            quantities:quantities,
            rates:rates,
            discounts:discounts,
            totals:totals,
            grandtotal:grandtotal
        }
        // Do something with the collected data, such as send it to the server
        // using AJAX or submit the form normally

    $.post("../user/Includes/item1.php",formData,function (data) {
        alert(data);
        if(data === "Successfully"){
        window.location.href = "../user";
        }
  });
})
})


function calculateGrandTotal() {
    var grandTotal = 0;
    $('.total').each(function() {
        grandTotal += parseFloat($(this).val());
    });
    $('#grandtotal').val(grandTotal.toFixed(2));
}

