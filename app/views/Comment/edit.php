<html>
    <head>
        <h1>Share Your Comment</h1>
    </head>

    <body>
		<form method='post' action='/Comment/edit'>
            <div class="test">
                <label for="publication_title" style="width: 154px;" >Edit Comment:</label>
                <textarea class="inputFields" id="commentInput" name="comment_text" rows="5"><?=$data->comment_text?></textarea>   
			</div>
            <br>
            <div class="form-group">
				<input type="submit" name="action" value="Post"/>
			</div>
		</form>
        <a href="/Comment/delete">Delete this comment</a>
    </body>
</html>