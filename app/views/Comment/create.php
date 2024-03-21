<html>
    <head>
        <h1>Share Your Comment</h1>
    </head>

    <body>
		<form method='post' action='/Comment/create'>
            <div class="test">
                <label style="width: 154px;" >Comment:</label>
                <textarea class="inputFields" id="commentInput" name="comment_text" rows="5" placeholder="Enter Your Comment Here"></textarea>   
			</div>
            <br>
            <div class="form-group">
				<input type="submit" name="action" value="Post"/>
			</div>
		</form>
    </body>
</html>