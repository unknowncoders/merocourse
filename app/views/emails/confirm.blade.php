<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Activate your account </h2>

		<div>
                Thanks for registering at MeroCourse. Please follow the link below to complete your registration process.
                {{ URL::to('register/activate/'.$confirmation_code) }} <br>
                If you encounter any problems, please paste the above url into the address field of your web browser.
		</div>
	</body>
</html>
