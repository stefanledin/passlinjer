<form action="/login" method="post">
	{!! csrf_field() !!}
	<input type="email" name="email" id="email">
	<input type="password" name="password" id="password">
	<input type="submit" value="Logga in">
</form>