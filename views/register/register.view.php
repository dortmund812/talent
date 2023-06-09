<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 pt-5 d-flex justify-content-center">
                <div class="row">
                    <div class="col">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="card" id="form_login" method="POST">

                            <div class="card-body">
                                <h5 class="card-title text-center">Create Acount</h5>
                                <!-- UserName -->
                                <div class="form-group">
                                    <label for="user_name">User Name</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" aria-describedby="usernameHelp" placeholder="Enter User Name" autocomplete="off">
                                </div>
                                <!-- Phone -->
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="Phone">
                                </div>
                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
                                </div>
                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Password">
                                </div>
                                <!-- Errors -->
                                <?php if ($error != "") : ?>
                                    <div class="form-group">
                                        <p class="text-danger"><?php echo $error; ?></p>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <?php foreach ($errorList as $err) : ?>
                                        <p class="text-danger"><?php echo $err; ?></p>
                                    <?php endforeach; ?>
                                </div>
                                <!-- Submit -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                                </div>
                                <!-- Login -->
                                <a href="/talent/controllers/LoginController.php" class="d-block text-center">¿Ya tienes cuenta?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>