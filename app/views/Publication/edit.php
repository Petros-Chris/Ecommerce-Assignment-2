<html>
	<head>
		<h1>Edit Post</h1>
	</head>
	
    <body>
		<br>
		<form method='post' action=''>
            <div class="test">
             	<label for="title_input" style="width: 154px;" >Title:</label>
            	<input type="input" id="title_input" name="publication_title" value="<?= $data->publication_title ?>"/>
			</div>
			<br>
            <div class="test">
                <label for="messageInput" style="width: 154px;" >Message:</label>
                <textarea class="inputFields" id="messageInput" name="publication_text" rows="5"><?= $data->publication_text ?></textarea>
         	</div>

			<div>
				<label><input type="radio" id="public" name="publication_status" value="1">Public</label>
            	<label><input type="radio" id="private" name="publication_status" value="0">Private</label>
			</div>
			<div>
				<input type="submit" name="action" value="Update"/>
				<a href="/Publication/delete">Delete Instead</a> |
				<a href='javascript:window.history.back();'>Go Back</a>
			</div>
		</form>
    </body>
	<script>
		if(<?= $data->publication_status ?> == 1) {
			document.getElementById('public').checked = true;
		} else {
			document.getElementById('private').checked = true;
		}
	</script>
</html>
	

