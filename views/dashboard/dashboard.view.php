<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-end">
        <a class="navbar-brand" href="/talent/controllers/LogoutController.php">Exit</a>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 pt-5">
                <h2 class="text-center">Search Movies</h2>

                <div class="row">
                    <div class="col">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="card" id="form_login" method="POST">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <!-- UserName -->
                                        <div class="form-group">
                                            <label for="title">Search by Title</label>
                                            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Title" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <!-- Date init -->
                                        <div class="form-group">
                                            <label for="date_init">Date start</label>
                                            <input type="number" class="form-control" id="date_init" name="date_init" min="1800" max="2099" step="1" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <!-- Date last -->
                                        <div class="form-group">
                                            <label for="date_end">Date end</label>
                                            <input type="number" class="form-control" id="date_end" name="date_end" min="1800" max="2099" step="1" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <!-- Date last -->
                                        <div class="form-group">
                                            <label for="sort_by">Sort by</label>
                                            <select class="custom-select" id="sort_by" name="sort_by">
                                                <option value="ta">Title ASC</option>
                                                <option value="td">Title DESC</option>
                                                <option value="da">Date ASC</option>
                                                <option value="dd">Date DESC</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Submit -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Poster</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataSearch as $item) : ?>
                                    <tr>
                                        <td><?php echo $item["Title"]; ?></td>
                                        <td><?php echo $item["Year"]; ?></td>
                                        <td><?php echo $item["Type"]; ?></td>
                                        <td><a href="<?php echo $item["Poster"]; ?>" target="_blank">Open Image</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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