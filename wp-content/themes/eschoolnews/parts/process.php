<?php

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array

		
	if (empty($_POST['fname']))
		$errors['fname'] = 'First Name is required.';

	if (empty($_POST['lname']))
		$errors['lname'] = 'Last Name is required.';

	if (empty($_POST['email']))
		$errors['email'] = 'Email is required.';

	if (empty($_POST['eschool_news_today']) && empty($_POST['checkbox2']) && empty($_POST['checkbox3']) && empty($_POST['checkbox4']) && empty($_POST['checkbox5']) && empty($_POST['checkbox6']) && empty($_POST['checkbox7']) && empty($_POST['checkbox8']) )
		$errors['newsletters'] = 'You must select at least one newsletter.';


// return a response ===========================================================

	// if there are any errors in our errors array, return a success boolean of false
	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

		// if there are no errors process our form, then return a message

		// DO ALL YOUR FORM PROCESSING HERE
		// THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

		// show a message of success and provide a true success variable
		$data['success'] = true;
		$data['message'] = 'Thank you';
	}

	// return all our data to an AJAX call
	echo json_encode($data);