<html>
  <body>
      <dl>
        <dt class="displayTitleWords"><h1><?= $data->publication_title ?></h1><dt>
		    <dd class="displayWords"><?= $data->publication_text ?></dd>
      </dl>
      <a href="/Publication/edit">Edit This Post</a>
      <a href="/Comment/create">Add a comment</a>

      <h3>Comments:</h3>
  </body>
</html>