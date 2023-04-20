count = 1;
$(document).on('click', '.btn-primary', function(e) {
    e.preventDefault();//prevent default of browser
    var parent = $(this).parent();
    parent.find("button#remove").prop('disabled', false);
    var add = parent.clone();
    add.attr("id","edu"+count);
    // add.find("#delete").attr("id","delete"+row);
    add.find("input").val("");
    add.find("select").val("");
    count++;
    $(".sub").append(add);
});      
row = 1;
$(document).on('click', '.btn-primary1', function(e) {
    e.preventDefault();//prevent default of browser
    var parent = $(this).parent();
    parent.find("button#delete").prop('disabled', false);
    var add = parent.clone();
    add.attr("id","exp"+row);
    // add.find("#delete").attr("id","delete"+row);
    add.find("input").val("");
    row++;
    $(".sub1").append(add);
});

$(document).on('click', '.btn-danger', function(e) {
    e.preventDefault();
    // Get the ID of the div to be removed
    $(this).parent().remove();
});
$(document).on('click','.present',function(){
    $(this).prev().val("Present");
    $(this).prev().toggle();
})

$(document).ready(function() {
  $("#myForm2").submit(function(event) {
    event.preventDefault(); // Prevent the default form submission
    var formData = $(this).serialize(); // Serialize the form data
    $.post("../user/Includes/insert.php",formData,function (data) {
        alert(data);
        if(data === "Inserted Successfully" || data === "Update Successfully"){
        window.location.href = "../user/details.php";
        }
  });
});
$("#myForm3").submit(function(event) {
    event.preventDefault(); // Prevent the default form submission
    var formData = $(this).serialize(); // Serialize the form data
    $.post("../user/Includes/insert1.php",formData,function (data) {
        alert(data);
        if(data === "Inserted Successfully" || data === "Update Successfully"){
        window.location.href = "../user/details.php";
        }
  });
});
$(document).on("focusin",".fromDate",function() {
    $(this).datepicker({
        format: 'yyyy-mm-dd',
        endDate: $(this).next().next().val()
    });
})

$(document).on("focusin",".toDate",function() {
    $(this).datepicker({
        format: 'yyyy-mm-dd',
        endDate:new Date(),
        startDate: $(this).prev().prev().val()
    });
})
});

