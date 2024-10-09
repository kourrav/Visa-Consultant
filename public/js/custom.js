var current_slide, next_slide, previous_slide;
var left, opacity, scale;
var animation;

var error = false;

// email validation
$("#email").keyup(function() {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (!emailReg.test($("#email").val())) {
        $("#error-email").text('Please enter an Email addres.');
        $("#email").addClass("box_error");
        error = true;
    } else {
        $("#error-email").text('');
        error = false;
        $("#email").removeClass("box_error");
    }
});
// password validation
$("#pass").keyup(function() {
    var pass = $("#pass").val();
    var cpass = $("#cpass").val();

    if (pass != '') {
        $("#error-pass").text('');
        error = false;
        $("#pass").removeClass("box_error");
    }
    if (pass != cpass && cpass != '') {
        $("#error-cpass").text('Password and Confirm Password is not matched.');
        error = true;
    } else {
        $("#error-cpass").text('');
        error = false;
    }
});
// confirm password validation
$("#cpass").keyup(function() {
    var pass = $("#pass").val();
    var cpass = $("#cpass").val();

    if (pass != cpass) {
        $("#error-cpass").text('Please enter the same Password as above.');
        $("#cpass").addClass("box_error");
        error = true;
    } else {
        $("#error-cpass").text('');
        error = false;
        $("#cpass").removeClass("box_error");
    }
});
// twitter
$("#twitter").keyup(function() {
    var twitterReg = /https?:\/\/twitter\.com\/(#!\/)?[a-z0-9_]+$/;
    if (!twitterReg.test($("#twitter").val())) {
        $("#error-twitter").text('Twitter link is not valid.');
        $("#twitter").addClass("box_error");
        error = true;
    } else {
        $("#error-twitter").text('');
        error = false;
        $("#twitter").removeClass("box_error");
    }
});
// facebook
$("#facebook").keyup(function() {
    var facebookReg = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
    if (!facebookReg.test($("#facebook").val())) {
        $("#error-facebook").text('Facebook link is not valid.');
        $("#facebook").addClass("box_error");
        error = true;
    } else {
        $("#error-facebook").text('');
        error = false;
        $("#facebook").removeClass("box_error");
    }
});
// linkedin
$("#linkedin").keyup(function() {
    var linkedinReg = /(ftp|http|https):\/\/?(?:www\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    if (!linkedinReg.test($("#linkedin").val())) {
        $("#error-linkedin").text('Linkedin link is not valid.');
        $("#linkedin").addClass("box_error");
        error = true;
    } else {
        $("#error-linkedin").text('');
        error = false;
        $("#linkedin").removeClass("box_error");
    }
});
// first name
$("#fname").keyup(function() {
    var fname = $("#fname").val();
    if (fname == '') {
        $("#error-fname").text('Enter your First name.');
        $("#fname").addClass("box_error");
        error = true;
    } else {
        $("#error-fname").text('');
        error = false;
    }
    if ((fname.length <= 2) || (fname.length > 20)) {
        $("#error-fname").text("User length must be between 2 and 20 Characters.");
        $("#fname").addClass("box_error");
        error = true;
    }
    if (!isNaN(fname)) {
        $("#error-fname").text("Only Characters are allowed.");
        $("#fname").addClass("box_error");
        error = true;
    } else {
        $("#fname").removeClass("box_error");
    }
});
// last name
$("#lname").keyup(function() {
    var lname = $("#lname").val();
    if (lname != lname) {
        $("#error-lname").text('Enter your Last name.');
        $("#lname").addClass("box_error");
        error = true;
    } else {
        $("#error-lname").text('');
        error = false;
    }
    if ((lname.length <= 2) || (lname.length > 20)) {
        $("#error-lname").text("User length must be between 2 and 20 Characters.");
        $("#lname").addClass("box_error");
        error = true;
    }
    if (!isNaN(lname)) {
        $("#error-lname").text("Only Characters are allowed.");
        $("#lname").addClass("box_error");
        error = true;
    } else {
        $("#lname").removeClass("box_error");
    }
});
// phone
$("#phone").keyup(function() {
    var phone = $("#phone").val();
    if (phone != phone) {
        $("#error-phone").text('Enter your Phone number.');
        $("#phone").addClass("box_error");
        error = true;
    } else {
        $("#error-phone").text('');
        error = false;
    }
    if (phone.length != 10) {
        $("#error-phone").text("Mobile number must be of 10 Digits only.");
        $("#phone").addClass("box_error");
        error = true;
    } else {
        $("#phone").removeClass("box_error");
    }
});
// address
$("#address").keyup(function() {
    var address = $("#address").val();
    if (address != address) {
        $("#error-address").text('Enter your Address.');
        $("#address").addClass("box_error");
        error = true;
    } else {
        $("#error-address").text('');
        error = false;
        $("#address").removeClass("box_error");
    }
});

// first step validation
$(".fs_next_btn").click(function() {
    // email
    if ($("#email").val() == '') {
        $("#error-email").text('Please enter an email address.');
        $("#email").addClass("box_error");
        error = true;
    } else {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!emailReg.test($("#email").val())) {
            $("#error-email").text('Please insert a valid email address.');
            error = true;
        } else {
            $("#error-email").text('');
            $("#email").removeClass("box_error");
        }
    }
    // password
    if ($("#pass").val() == '') {
        $("#error-pass").text('Please enter a password.');
        $("#pass").addClass("box_error");
        error = true;
    }
    if ($("#cpass").val() == '') {
        $("#error-cpass").text('Please enter a Confirm password.');
        $("#cpass").addClass("box_error");
        error = true;
    } else {
        var pass = $("#pass").val();
        var cpass = $("#cpass").val();

        if (pass != cpass) {
            $("#error-cpass").text('Please enter the same password as above.');
            error = true;
        } else {
            $("#error-cpass").text('');
            $("#pass").removeClass("box_error");
            $("#cpass").removeClass("box_error");
        }
    }
    // animation
    if (!error) {
        if (animation) return false;
        animation = true;

        current_slide = $(this).parent().parent();
        next_slide = $(this).parent().parent().next();

        $("#progress_header li").eq($(".multistep-box").index(next_slide)).addClass("active");

        next_slide.show();
        current_slide.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = (now * 50) + "%";
                opacity = 1 - now;
                current_slide.css({
                    'transform': 'scale(' + scale + ')'
                });
                next_slide.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_slide.hide();
                animation = false;
            },
            easing: 'easeInOutBack'
        });
    }
});
// second step validation
$(".ss_next_btn").click(function() {
    // twitter
    if ($("#twitter").val() == '') {
        $("#error-twitter").text('twitter link is required.');
        $("#twitter").addClass("box_error");
        error = true;
    } else {
        var twitterReg = /https?:\/\/twitter\.com\/(#!\/)?[a-z0-9_]+$/;
        if (!twitterReg.test($("#twitter").val())) {
            $("#error-twitter").text('Twitter link is not valid.');
            error = true;
        } else {
            $("#error-twitter").text('');
            $("#twitter").removeClass("box_error");
        }
    }
    // facebook
    if ($("#facebook").val() == '') {
        $("#error-facebook").text('Facebook link is required.');
        $("#facebook").addClass("box_error");
        error = true;
    } else {
        var facebookReg = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
        if (!facebookReg.test($("#facebook").val())) {
            $("#error-facebook").text('Facebook link is not valid.');
            error = true;
            $("#facebook").addClass("box_error");
        } else {
            $("#error-facebook").text('');
        }
    }
    // linkedin
    if ($("#linkedin").val() == '') {
        $("#error-linkedin").text('Linkedin link is required.');
        $("#linkedin").addClass("box_error");
        error = true;
    } else {
        var linkedinReg = /(ftp|http|https):\/\/?(?:www\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
        if (!linkedinReg.test($("#linkedin").val())) {
            $("#error-linkedin").text('Linkedin link is not valid.');
            error = true;
        } else {
            $("#error-linkedin").text('');
            $("#linkedin").removeClass("box_error");
        }
    }

    if (!error) {
        if (animation) return false;
        animation = true;

        current_slide = $(this).parent().parent();
        next_slide = $(this).parent().parent().next();

        $("#progress_header li").eq($(".multistep-box").index(next_slide)).addClass("active");

        next_slide.show();
        current_slide.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = (now * 50) + "%";
                opacity = 1 - now;
                current_slide.css({
                    'transform': 'scale(' + scale + ')'
                });
                next_slide.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_slide.hide();
                animation = false;
            },
            easing: 'easeInOutBack'
        });
    }

});

// third step validation
$(".ts_next_btn").click(function() {
    // first name
    if ($("#fname").val() == '') {
        $("#error-fname").text('Enter your First name.');
        $("#fname").addClass("box_error");
        error = true;
    } else {
        var fname = $("#fname").val();
        if (fname != fname) {
            $("#error-fname").text('First name is required.');
            error = true;
        } else {
            $("#error-fname").text('');
            error = false;
            $("#fname").removeClass("box_error");
        }
        if ((fname.length <= 2) || (fname.length > 20)) {
            $("#error-fname").text("User length must be between 2 and 20 Characters.");
            error = true;
        }
        if (!isNaN(fname)) {
            $("#error-fname").text("Only Characters are allowed.");
            error = true;
        } else {
            $("#fname").removeClass("box_error");
        }
    }
    // last name
    if ($("#lname").val() == '') {
        $("#error-lname").text('Enter your Last name.');
        $("#lname").addClass("box_error");
        error = true;
    } else {
        var lname = $("#lname").val();
        if (lname != lname) {
            $("#error-lname").text('Last name is required.');
            error = true;
        } else {
            $("#error-lname").text('');
            error = false;
        }
        if ((lname.length <= 2) || (lname.length > 20)) {
            $("#error-lname").text("User length must be between 2 and 20 Characters.");
            error = true;
        } 
        if (!isNaN(lname)) {
            $("#error-lname").text("Only Characters are allowed.");
            error = true;
        } else {
            $("#lname").removeClass("box_error");
        }
    }
    // phone
    if ($("#phone").val() == '') {
        $("#error-phone").text('Enter your Phone number.');
        $("#phone").addClass("box_error");
        error = true;
    } else {
        var phone = $("#phone").val();
        if (phone != phone) {
            $("#error-phone").text('Phone number is required.');
            error = true;
        } else {
            $("#error-phone").text('');
            error = false;
        }
        if (phone.length != 10) {
            $("#error-phone").text("Mobile number must be of 10 Digits only.");
            error = true;
        } else {
            $("#phone").removeClass("box_error");
        }
    }
    // address
    if ($("#address").val() == '') {
        $("#error-address").text('Enter your Address.');
        $("#address").addClass("box_error");
        error = true;
    } else {
        var address = $("#address").val();
        if (address != address) {
            $("#error-address").text('Address is required.');
            error = true;
        } else {
            $("#error-address").text('');
            $("#address").removeClass("box_error");
            error = false;
        }
    }

    if (!error) {
        if (animation) return false;
        animation = true;

        current_slide = $(this).parent().parent();
        next_slide = $(this).parent().parent().next();

        $("#progress_header li").eq($(".multistep-box").index(next_slide)).addClass("active");

        next_slide.show();
        current_slide.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = (now * 50) + "%";
                opacity = 1 - now;
                current_slide.css({
                    'transform': 'scale(' + scale + ')'
                });
                next_slide.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_slide.hide();
                animation = false;
            },
            easing: 'easeInOutBack'
        });
    }
});
// previous
$(".previous").click(function() {
    if (animation) return false;
    animation = true;

    current_slide = $(this).parent().parent();
    previous_slide = $(this).parent().parent().prev();

    $("#progress_header li").eq($(".multistep-box").index(current_slide)).removeClass("active");

    previous_slide.show();
    current_slide.animate({
        opacity: 0
    }, {
        step: function(now, mx) {
            scale = 0.8 + (1 - now) * 0.2;
            left = ((1 - now) * 50) + "%";
            opacity = 1 - now;
            current_slide.css({
                'left': left
            });
            previous_slide.css({
                'transform': 'scale(' + scale + ')',
                'opacity': opacity
            });
        },
        duration: 800,
        complete: function() {
            current_slide.hide();
            animation = false;
        },
        easing: 'easeInOutBack'
    });
});

$(".submit_btn").click(function() {
    if (!error){
        $(".main").addClass("form_submited");
    }
    return false;
})

// Eligibility Form 
// $(document).ready(function() {
//     var eligibility_currentStep = 0;
//     var eligibility_steps = $(".eligibility_step");
//     var progressBars = [$("#progressStep1"), $("#progressStep2"), $("#progressStep3")];

//     // Function to show the current step
//     function showStep(step) {
//         eligibility_steps.removeClass('active').eq(step).addClass('active');
//         updateProgress(step);
//     }

//     // Update progress bar
//     function updateProgress(step) {
//         progressBars.forEach(function (bar, index) {
//             if (index <= step) {
//                 bar.removeClass('bg-light').addClass('bg-primary');
//             } else {
//                 bar.removeClass('bg-primary').addClass('bg-light');
//             }
//         });
//     }
//     // Generic function to validate all required fields in the current step
//     function validateFields() {
//         var isValid = true;
//         eligibility_steps.eq(eligibility_currentStep).find("[required]").each(function() {
//             var $input = $(this);
//             if ($input.val() === "") {
//                 isValid = false;
//                 $input.addClass('is-invalid'); // Highlight invalid fields
//                 $input.next('.invalid-feedback').show(); // Highlight invalid fields
//             } else {
//                 $input.removeClass('is-invalid'); // Remove highlight from valid fields
//                 $input.next('.invalid-feedback').hide(); // Remove highlight from valid fields
//             }
//         });
//         return isValid;
//     }

//     // Handle Next button click
//     $(".eligibility_nextStep").on('click', function() {
//         if (validateFields()) {
//             eligibility_currentStep++;
//             showStep(eligibility_currentStep);
//         } else {
//             //alert('Please fill all required fields.');
//         }
//     });

//     // Handle Previous button click
//     $(".eligibility_prevStep").on('click', function() {
//         eligibility_currentStep--;
//         showStep(eligibility_currentStep);
//     });

//     // Form submission validation
//     $("form.eligibilityForm").on('submit', function(e) {
//         if (!validateFields()) {
//             e.preventDefault();
//             alert('Please fill all required fields before submitting.');
//         } else {
//             e.preventDefault(); // Prevent default form submission

//             // Show toast message on success
//             $("#toast").toast({ delay: 3000 });
//             $("#toast").toast('show');

//             // Refresh the page after toast message disappears
//             setTimeout(function() {
//                 location.reload();
//             }, 4000);
//         }
//     });
// });

// $(document).ready(function () {
//     let currentStep = 1;

//     // Function to show toaster success
//     function showToaster(message) {
//         toastr.success(message);
//     }

//     // Handle next and previous button clicks
//     $('.eligibility_nextStep').click(function () {
//         if ($('#eligibilityForm').valid()) {
//             currentStep++;
//             updateProgressBar();
//         }
//     });

//     $('.eligibility_prevStep').click(function () {
//         currentStep--;
//         updateProgressBar();
//     });

//     // Update progress bar based on step
//     function updateProgressBar() {
//         $('.eligibility-progress-bar').removeClass('bg-primary').addClass('bg-light');
//         $('#progressStep' + currentStep).removeClass('bg-light').addClass('bg-primary');
//         $('.eligibility_step').removeClass('active').eq(currentStep - 1).addClass('active');
//     }

//     // jQuery validation rules
//     $('#eligibilityForm').validate({
//         rules: {
//             interested_country: {
//                 required: true
//             },
//             purpose_of_travel: {
//                 required: true
//             },
//             currently_employed: {
//                 required: true
//             },
//             lungs_infection: {
//                 required: true
//             },
//             physical_mental_disorder: {
//                 required: true
//             },
//             criminal_offence: {
//                 required: true
//             }
//         },
//         messages: {
//             interested_country: "Please select a country.",
//             purpose_of_travel: "Please select the purpose of travel.",
//             currently_employed: "Please indicate if you are employed.",
//             lungs_infection: "Please indicate if you have had any lung infections.",
//             physical_mental_disorder: "Please indicate if you have any disorders.",
//             criminal_offence: "Please indicate if you have been involved in any criminal offenses."
//         },
//         errorPlacement: function(error, element) {
//             // Custom placement of error messages
//             error.addClass('invalid-feedback'); // Add Bootstrap invalid feedback class
//             error.insertAfter(element); // Insert error after the input element
//         },
//         highlight: function(element) {
//             $(element).addClass('is-invalid').removeClass('is-valid'); // Add invalid class
//         },
//         unhighlight: function(element) {
//             $(element).removeClass('is-invalid').addClass('is-valid'); // Add valid class
//         },
//         submitHandler: function(form) {           
//             form.submit(); // Submit the form
//         }
//     });

//     // Handle form submission
//     $('#eligibilityForm').submit(function (e) {
//         e.preventDefault();

//         if ($('#eligibilityForm').valid()) {
//             $.ajax({
//                 url: $(this).attr('action'),
//                 type: 'POST',
//                 data: $(this).serialize(),
//                 success: function (response) {
//                     showToaster(response.message);

//                     // Hard refresh after a short delay
//                     setTimeout(function () {
//                         location.reload();
//                     }, 3000);
//                 },
//                 error: function () {
//                     toastr.error('Something went wrong!');
//                 }
//             });
//         }
//     });
// });
$(document).ready(function () {
    let currentStep = 1; // Start with the first step

    // Function to show toaster success
    function showToaster(message) {
        toastr.success(message);
    }

    // Handle next and previous button clicks
    $('.eligibility_nextStep').click(function () {
        // Validate the current step
        if ($('#eligibilityForm').valid()) {
            // Move to the next step
            currentStep++;
            updateProgressBar();
        }
    });

    $('.eligibility_prevStep').click(function () {
        // Move to the previous step
        currentStep--;
        updateProgressBar();
    });

    // Update progress bar and active step based on the current step
    function updateProgressBar() {
        // Remove active class from all progress steps and set light color
        $('.eligibility-progress-bar').removeClass('bg-primary').addClass('bg-light');
        
        // Set the current progress step to primary color
        $('#progressStep' + currentStep).removeClass('bg-light').addClass('bg-primary');

        // Remove active class from all steps and set active class to current step
        $('.eligibility_step').removeClass('active').eq(currentStep - 1).addClass('active');
    }

    // jQuery validation rules
    $('#eligibilityForm').validate({
        rules: {
            interested_country: { required: true },
            purpose_of_travel: { required: true },
            currently_employed: { required: true },
            lungs_infection: { required: true },
            physical_mental_disorder: { required: true },
            criminal_offence: { required: true }
        },
        messages: {
            interested_country: "Please select a country.",
            purpose_of_travel: "Please select the purpose of travel.",
            currently_employed: "Please indicate if you are employed.",
            lungs_infection: "Please indicate if you have had any lung infections.",
            physical_mental_disorder: "Please indicate if you have any disorders.",
            criminal_offence: "Please indicate if you have been involved in any criminal offenses."
        },
        errorPlacement: function(error, element) {
            // Check if the element is a radio button
            if (element.attr("type") === "radio") {
                // Place error after the last radio input of the group
                error.addClass('invalid-feedback'); // Add Bootstrap invalid feedback class
                error.insertAfter(element.closest('.form-group').find('input[type="radio"]:last')); // Insert error after the last radio button
            } else {
                error.addClass('invalid-feedback'); // Add Bootstrap invalid feedback class for other inputs
                error.insertAfter(element); // Insert error after the input element
            }
        },
        highlight: function(element) {
            $(element).addClass('is-invalid').removeClass('is-valid'); // Add invalid class
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid').addClass('is-valid'); // Add valid class
        },
        submitHandler: function(form) {
           $('.showsuccess_msg').show();            
        }
    });

    function eligibilityForm(form){
        $.ajax({
            url: $(form).attr('action'), // Form action URL
            type: 'POST',
            data: $(form).serialize(), // Serialize form data
            success: function (response) {
                showToaster(response.message); // Show success message

                // Hard refresh after a short delay
                setTimeout(function () {
                    location.reload(true);
                }, 3000);
            },
            error: function () {
                toastr.error('Something went wrong!'); // Show error message
            }
        });
    }
});

