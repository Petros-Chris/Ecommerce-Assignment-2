<html>
    <head>

    </head>

    <body>
	    <div class='container'>
		    <form method='post' action='/Publication/update?id=<?= $data->id ?>'>
			<!--input type="hidden" name="id" value="<?= $data->id ?>"-->
			    <div class="form-group">
				    <label>First name:<input type="text" class="form-control" name="first_name" placeholder="Jon" value="<?= $data->first_name ?>" /></label>
			    </div>
			    <div class="form-group">
				    <label>Last name:<input type="text" class="form-control" name="last_name" placeholder="Doe" value="<?= $data->last_name ?>" /></label>
			    </div>
			    <div class="form-group">
				    <label>Email address:<input type="email" class="form-control" name="email" placeholder="jondoe@email.com" value="<?= $data->email ?>" /></label>
			    </div>
			    <div class="form-group">
					<label><input type="checkbox" name="publications[]" value="mailing_list" <?= ($data->mailing_list==true?'checked':'') ?>>Include me on the mailing list</label>
			    </div>
			    <div class="form-group">
				    <label><input type="checkbox" name="publications[]" value="weekly_flyer" <?= ($data->weekly_flyer==true?'checked':'') ?>>Send me the weekly flyer</label>
			    </div>

			    <div class="form-group">
				    <input type="submit" name="action" value="Update" />
			    </div>
		    </form>
	    </div>
    </body>
</html>