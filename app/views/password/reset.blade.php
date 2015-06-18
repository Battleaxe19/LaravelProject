<!-- app/views/login.blade.php -->
<!doctype html>
<html>
<head>
<title>Password Reset</title>
</head>
<body>

<h1>Password Reset</h1>
<!-- if there are login errors, show them here -->
<p>
	
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}
	 {{ $errors->first('password_confirmation') }}
</p>
	<form action="{{ action('RemindersController@postReset') }}" method="POST">
		<input type="hidden" name="token" value="{{ $token }}">
		Email
		<input type="email" name="email">
		Password
		<input type="password" name="password">
		Confirm Password
		<input type="password" name="password_confirmation">
		<input type="submit" value="Reset Password">
	</form>
</body>
</html>