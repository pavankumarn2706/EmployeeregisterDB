$(document).ready(function() {
  // validation for phone number
    $("#phone").on("input", function() {
      var mobileNumber = $(this).val();
      var pattern = /^[0-9]{10}$/;
      if (pattern.test(mobileNumber)) {
        $("#mobileError").text("");
      } else {
        $("#mobileError").text("Please enter a valid 10 digit mobile number");
      }
    });

    $(document).ready(function() {
      // validation for firstname
        
      $("#firstname").on("input", function() {
          var pattern = /^[a-zA-Z]+$/;
          if(!pattern.test($(this).val())) {
            // $(this).css("border-color", "red");
            $("#firstName").text("Invalid first name").show();
          }
          else {
            // $(this).css("border-color", "green");
            $("#firstName").hide();
          }
        });
      });
    

      $(document).ready(function() {
        // validation repassword

        $("#psw1").on("input", function() {
          if($(this).val() != $("#psw").val()) {
            // $(this).css("color", "red");
            $("#psw-error").text("Password doesn't match").show();
          }
          else {
            // $(this).css("border-color", "green");
            $("#psw-error").hide();
          }
        });
      });

      $("#myForm").submit((event) => {
        //  Post method Implementation for inserting.
        event.preventDefault(); // prevent default form submission behavior
        $.post("../Task1/Includes/uservalidation.php",
        {
            username: $("#username").val(),
            firstname: $("#firstname").val(),
            middlename: $("#middlename").val(),
            lastname: $("#lastname").val(),
            course: $("#course").val(),
            gender: $("#gender").val(),
            phone: $("#phone").val(),
            password: $("#psw").val(),
            address: $("#address").val(),
            email: $("#email").val(),
            repassword: $("#psw1").val(),
            submit:"employee-registration-form-submit"

        },
        function(data){
            alert(data) ;
            if(data==="Register Succesfully"){
            window.location.href = "../Task1/login.php";
        }else {
            window.location.href = "../Task1/";
        }
        });
      });

      $("#username").on("input", function() {
        var pattern =/^[a-zA-Z0-9_.]{3,16}$/;
        if(!pattern.test($(this).val())) {
          $(this).css("border-color", "red");
          $("#username-error").text("Invalid Username").show();
        }
        else {
          // $(this).css("border-color", "green");
          $("#username-error").hide();
        }
      });

            $("#lastname").on("input", function() {
          var pattern = /^[a-zA-Z]+$/;
          if(!pattern.test($(this).val())) {
            $(this).css("border-color", "red");
            $("#lastname-error").text("Invalid last name").show();
          }
          else {
            // $(this).css("border-color", "green");
            $("#lastname-error").hide();
          }
        });

      $("#myForm1").submit((e) => {
        e.preventDefault();
        $.post("../Task1/Includes/uservalidation.php",{
        username:$("#username").val(),
        password:$("#myInput").val(),
        submit:"employee-login"
      },(data) =>{
        alert(data);
        if(data === "Login Successfully"){
          window.location.href = "../Task1/user";
        }else {
          window.location.href = "../Task1/login.php";
        }
      })
      });
  });
