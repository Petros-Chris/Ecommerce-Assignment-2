<html>
<head>
	<title><?= $name ?> view</title>
</head>
<body>
		<h1>User profile</h1>
		<dl>
			<dt class="displayTitleWords">First name:</dt>
			<dd class="displayWords"><?= $data->first_name ?></dd>
			<dt class="displayTitleWords">Middle name:</dt>
			<dd class="displayWords"><?= $data->middle_name ?></dd>
			<dt class="displayTitleWords">Last name:</dt>
			<dd class="displayWords"><?= $data->last_name ?></dd>
		</dl>

		<a href='/Profile/modify'>Modify my profile</a> | 
		<a href='/Profile/delete'>Delete my profile</a>

		<br> <br>

		<h3>Your Posts</h3>
</body>
</html>