<?php 

include 'db.php';

if ( ! isset($_SESSION["id"])) {
    header("Location:login.php");
}


$result = $conn->query("select menu_item.* , user.email, user.created_at from menu_item join user on menu_item.user_id=user.id");
$result2 = $conn->query("select menu_item.* , user.email, user.created_at from menu_item join user on menu_item.user_id=user.id");
?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
            >
                <div class="container">
                    <a class="navbar-brand" href="#"> Sunit Resto</a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php" aria-current="page"
                                    >Home
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="insert.php">Add Menu</a>
                            </li>
                            
                             <li class="nav-item">
                                <a class="nav-link" href="view.php">View Menu</a>
                            </li>

                             <li class="nav-item">
                                <a class="nav-link" href="export.php">Export Data</a>
                            </li>
                        </ul>
                        <form class="d-flex my-2 my-lg-0" action="logout.php">
                            <button
                                class="btn btn-outline-success my-2 my-sm-0"
                                type="submit"
                            >
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            
        </header>
        <main>
            <h3 class="text-center py-3 my-2">Menu</h3>
            <div
                class="container"
            >
                <div
                    class="row justify-content-center align-items-center g-2"
                >
                    <?php  while ($row=$result->fetch_assoc()) {?>
                
                <div class="col-md-4 "><div class="card">
                    <img class="card-img-top" src="uploads/<?= $row["image"]?>" alt="Title" />
                    <div class="card-body">
                        <small><?= $row["email"] ?> || <?= $row["created_at"] ?></small>
                        <h4 class="card-title"><?= $row["item_name"]?></h4>
                        <p class="card-text"><?= $row["description"]?></p>
                         <h4 class="card-title"><?= $row["price"]?></h4>
                         <h4 class="card-title"><?= $row["category"]?></h4>
                        
                        
                        
                        <p>
                            <?php if ($_SESSION["id"]== $row["user_id"] ) {?>
                                <a
                                    name=""
                                    id=""
                                    class="btn btn-primary"
                                    href="edit.php?id=<?= $row['id'] ?>"
                                    role="button"
                                    >Edit</a
                                >

                                <a
                                    name=""
                                    id=""
                                    class="btn btn-primary"
                                    href="delete.php?id=<?= $row['id'] ?>"
                                    role="button"
                                    >Delete</a
                                >
                                
                                
                           <?php } ?>
                        </p>
                    </div>
                </div>
                </div>
                <?php } ?>
            
                </div>
                
            </div>
            <br><br><br>
            <h3 class="text-center my-py-2">Menu Details</h3>
            <div
                class="container col-6 my-py-2 rounded bordered shadow"
            >
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-primary"
                    >
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row=$result2->fetch_assoc()) { ?>

                            <tr class="">
                                <td><?=$row["id"]?></td>
                                <td><?=$row["item_name"]?></td>
                                <td><?=$row["description"]?></td>
                                <td><?=$row["category"]?></td>
                                <td><?=$row["price"]?></td>
                                <td><?=$row["image"]?></td>
                            </tr>
                        <?php    } ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
