<html>
    <head>
        <h1>Delete Post</h1>
    </head>

    <body> 
		<form method='post' action='/Comment/delete'>
            <dl>
                <dt class="displayTitleWords">Comment</dt>
                <dd class="displayWords"><?= $data->comment_text ?></dd>
            </dl>
            <h4>Are You Sure You Want to Delete This Comment?</h4>
            <input type="submit" name="action" value="Delete"/>
            <a href='javascript:window.history.back();'>Go Back</a>
		</form>
    </body>
</html>