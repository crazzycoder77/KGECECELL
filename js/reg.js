$(document).ready(function() {

    $('#contact_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                        stringLength: {
                        min: 2,
                        max:30,
                    },
                        notEmpty: {
                        message: 'Please supply your name'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Enter a valid email address'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                    phone: {
                        country: 'INDIA',
                        message: 'Please supply a vaild phone number'
                    }
                }
            },
            college: {
                validators: {
                     stringLength: {
                        max:50,
                    },
                    notEmpty: {
                        message: 'Please supply your College name'
                    }
                }
            },
            department: {
                validators: {
                     stringLength: {
                        max: 50,
                    },
                    notEmpty: {
                        message: 'Please supply your department'
                    }
                }
            },
            age: {
                validators: {
                    stringLength: {
                        min:2,
                        max: 2,
                    },
                    notEmpty: {
                        message: 'please supply your age'
                    }
                }
            },
            why1: {
                validators: {
                      stringLength: {
                        min: 50,
                        max:300,
                        message:'Please enter at least 50 characters and no more than 300'
                    },
                    notEmpty: {
                        message: "This field can't be empty",
                    }
                    }
                },
                why2: {
                    validators: {
                          stringLength: {
                            min: 50,
                            max: 200,
                            message:'Please enter at least 50 characters and no more than 300'
                        },
                        notEmpty: {
                            message:"This field can't be empty",
                        }
                        }
                    },
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
           $.post($form.attr('action'), $form.serialize(), function(result) {
                
            }, 'json');
        });
});

