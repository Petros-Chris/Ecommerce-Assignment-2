
<html>
    <head>

    </head>

    <body>
	    <div class='container'>
		    <form method='post' action=''>
			    <div class="form-group">
				    <label>First name:<input type="text" class="form-control" name="publication_title" placeholder="Jon" value="<?= $data->publication_title ?>" /></label>
			    </div>
			    <div class="form-group">
				    <label>Last name:<input type="text" class="form-control" name="publication_text" placeholder="Doe" value="<?= $data->publication_text ?>" /></label>
			    </div>
				<label><?= $data->publication_status?></label>
				<label><input type="radio" id="public" name="publication_status" value="1">Public</label>
            	<label><input type="radio" id="private" name="publication_status" value="0">Private</label>

			    <div class="form-group">
				    <input type="submit" name="action" value="Update" />
			    </div>
		    </form>
	    </div>
    </body>


	<script>
		if(<?= $data->publication_status ?> == 1) {
			document.getElementById('public').checked = true;
		} else {
			document.getElementById('private').checked = true;
		}
	</script>
</html>
	

