<html>
    <head>
        <h1>Share Your Thoughts</h1>
    </head>

    <body>
		<form method='post' action='/Publication/create'>
            <div class="test">
                <label for="title_input" style="width: 154px;" >Title:</label>
                <input type="input" id="title_input" name="publication_title" placeholder="Enter Your Title Here"/>
			</div>
            <br>
            <div class="test">
                <label for="messageInput" style="width: 154px;" >Message:</label>
                <textarea class="inputFields" id="messageInput" name="publication_text" rows="5" placeholder="Enter Your Message Here"></textarea>
            </div>
            <label><input type="radio" name="publication_status" value="1">Public</label>
            <label><input type="radio" name="publication_status" value="0" checked="true">Private</label>
            <div class="form-group">
				<input type="submit" name="action" value="Post"/>
			</div>
		</form>
    </body>
</html>