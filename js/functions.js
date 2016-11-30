$(document).ready(function() {
	$('#formulario').bootstrapValidator({
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
            nombre: {
                validators: {
                        stringLength: {
                        min: 8,
                    },
                        notEmpty: {
                        message: 'Por favor ingrese su nombre completo'
                    }
                }
            },
            mail: {
                validators: {
                    notEmpty: {
                        message: 'Por favor ingrese su correo electrónico'
                    },
                    emailAddress: {
                        message: 'Por favor ingrese un correo electrónico valido'
                    }
                }
            },
            telefono: {
                validators: {
					 stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Porfavor ingrese su número de teléfono'
                    },
                }
            },
            pais: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                }
            },
            Ciudad: {
                validators: {
                        stringLength: {
                        min: 5,
                    },
                        notEmpty: {
                        message: 'Por favor ingrese su ciudad de origen'
                    }
                }              
            }
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
                console.log(result);
            }, 'json');
        });
});
$(document).ready(function() {
	$('#formulario2').bootstrapValidator({
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
            nombre: {
                validators: {
                        stringLength: {
                        min: 8,
                    },
                        notEmpty: {
                        message: 'Por favor ingrese su nombre completo'
                    }
                }
            },
            mail: {
                validators: {
                    notEmpty: {
                        message: 'Por favor ingrese su correo electrónico'
                    },
                    emailAddress: {
                        message: 'Por favor ingrese un correo electrónico valido'
                    }
                }
            },
            telefono: {
                validators: {
					 stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Porfavor ingrese su número de teléfono'
                    },
                }
            },

            pais: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                }
            },
            Ciudad: {
                validators: {
                        stringLength: {
                        min: 5,
                    },
                        notEmpty: {
                        message: 'Por favor ingrese su ciudad de origen'
                    }
                }              
            }
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
                console.log(result);
            }, 'json');
        });
});
