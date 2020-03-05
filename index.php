<?php require 'init.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pocket Manager</title>
    <link href="https://bootswatch.com/4/sandstone/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <button id="oauth">Click!</button>
    <div class="container">
        <div class="row mb-2">
            <h1 class="text-primary font-weight-bold p-2">Welcome to the Pocket Content Manager</h1>
        </div>
        <div class="row mb-3">
            <div class="col-md-5 bg-secondary rounded">
                <form class="m-3 text-white font-weight-bold">
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
            <div class="col-md-3">
               
               <?php if (\App\User::checkCredentials()) : ?>
               
                <p>
                    <a class="btn btn-success" href="request_auth.php">App authorized with pocket</a>
                </p>
                
                <?php else : ?>
                
                <p>
                    <a class="btn btn-primary" href="request_auth.php">Authorize the App with Pocket</a>
                </p>
                
                <?php endif ?>
                
                <p>
                    <a class="btn btn-primary" href="#" onClick="showRecent(event)">Refresh the recent posts</a>
                </p>

            </div>
        </div>
        <div class="row">
            <div class="card-columns m-auto text-center" id="recentPosts">
                <p class="text-center m-auto p-3 font-weight-bold text-primary">Recent posts will show up here</p>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
</body>

</html>
