// main js code wrapped in function
// code re-formatted
$(document).ready(function () {

	// JQuery selectors cached to avoid collection multiple times
	let $errors = $(".errors"),
		$nameField = $('input[name="full-name"]'),
		$phoneField = $('input[name="telefonanr"]'),
		$addressField = $('input[name="address"]'),
		$messageField = $('textarea[name="zinojums"]'),
		$submitBtn = $('#submit');

    function renderErrors(errors) {
        for (let i = 0; i < errors.length; i++) {
            $errors.append("<div> &raquo; " + errors[i] + "</div>").show();
        }
    }

    // Added reset functions due to ajax form sending
    function resetErrors() {
		$errors.text('').hide();
    }

    function resetForm() {
        resetErrors();
        $nameField.val('');
		$phoneField.val('');
		$addressField.val('');
		$messageField.val('');
    }

    // redundant variable result removed
    function validateForm() {

    	resetErrors();

        let errors = [];

        if ($nameField.val() === '') {
            errors.push("Lauks 'Vārs, Uzvārds' ir jānorāda obligāti");
        }
        if ($phoneField.val() === '') {
            errors.push("Lauks 'Telefona numurs' ir jānorāda obligāti");
        }
        if ($messageField.val() === '') {
            errors.push("Lauks 'Ziņojums' ir jānorāda obligāti");
        }

        if (errors.length > 0) {
            renderErrors(errors);
            return false;
        } else {
            return true;
        }
    }

    // Ajax form data send added
    function sendForm() {

		let formData = {
			'name': $nameField.val(),
			'phone': $phoneField.val(),
			'address': $addressField.val(),
			'message': $messageField.val(),
		};

        let request = $.ajax({
            url: "/",
            method: "POST",
            data: formData,
            dataType: "json"
        });

        request.done(function( data ) {
            resetForm();
            alert(data.message);
        });

        request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });
	}

	// Form submit handler moved from html inline script
	$submitBtn.on('click', (e) => {
		e.preventDefault();

		if(validateForm()) {
			sendForm();
        }
	});
});
