<html>
    <head>
        
    </head>

    <body>
        <h1>Share Your Comment</h1>
		<form method='post' action='/Comment/edit'>

            <div class="test">
                <label for="publication_title" style="width: 154px;" >Edit Comment:</label>
                <input type="input" id="comment" name="comment_text" value="<?=$data->comment_text?>"/>
			</div>

            <br>

            <div class="form-group">
				<input type="submit" name="action" value="Post"/>
			</div>
		</form>
<a href="/Comment/delete">Delete this comment</a>
</body>
</html>