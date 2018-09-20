<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Pocket Manager</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>

<body>
	<div class="container">
	<h1 class="text-primary">Welcome to the Pocket Content Manager</h1>
		<div class="row mb-3">
			<form>
				<p>Add a site to your Pocket account:</p>
				<div class="form-group">
					<label for="inputLink">Site URL</label>
					<input class="form-control" type="text" id="inputUrl" name="url">
				</div>				
				<div class="form-group">
					<label for="inputTitle">Title</label>
					<input class="form-control" type="text" id="inputTitle" name="title">
				</div>
				<input class="btn btn-primary" type="submit" value="Submit" onClick="addSite(event)">
				
			</form>
		</div>
		<div class="row">
			<p>
				<a href="#" onClick="showRecent()">Refresh the recent posts</a>
			</p>	
		</div>
		<div class="row" id="recentPosts">	
		</div>
	</div>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
	<script src="scripts.js"></script>
</body>

</html>
