<html>
    <head>
        <h1>Delete Post</h1>
    </head>

    <body>
		<form method='post' action='/Publication/delete'>
            <dl>
                <dt class="displayTitleWords">Title Of Publication</dt>
                <dd class="displayWords"><?= $data->publication_title ?></dd>

                <dt class="displayTitleWords">What Is Currently Written</dt>
                <dd class="displayWords"><?= $data->publication_text ?></dd>

                <dt class="displayTitleWords">Is Currently Set As</dt>
                <dd class="displayWords" id="statusDisplay"></dd>
            </dl>
            <h4>Are You Sure You Want to Delete This Post?</h4>
            <input type="submit" name="action" value="Delete"/>
            <a href='javascript:window.history.back();'>Go Back</a>
		</form>
    </body>
	<script>
        var status;
		if(<?= $data->publication_status ?> == 1) {
			var status = "Public"
		} else {
			var status = "Private"
		}
        document.getElementById("statusDisplay").textContent = status;
	</script>
</html>
	

