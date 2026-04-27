<?php 

    include 'db.php';

    if ( ! isset($_SESSION["id"])) {
        header("Location:login.php");
    }

    if ($_SERVER["REQUEST_METHOD"]==="POST") {
        $item_name=$_POST["item_name"];
        $description=$_POST["description"];
        $price=$_POST["price"];
        $category=$_POST["category"];
        $image=$_FILES["image"]["name"];
        $user_id=$_SESSION["id"];
        move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/$image");

        $sql=$conn->prepare("insert into menu_item(item_name,description,price,category,image,user_id) values (?,?,?,?,?,?)");
        $sql->bind_param("ssdssi",$item_name,$description,$price,$category,$image,$user_id);

        if ($sql->execute()) {
            header("Location:view.php");
        }
    }


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
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <h3 class="text-center py-2 my-2">Add Menu !</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <div
                    class="container rounded bordered shadow my-2 py-2 col-6"
                >
                    <div class="mb-3">
                        <label for="" class="form-label">Item Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="item_name"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Item Description</label>
                        <textarea class="form-control" name="description" id="" rows="3"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input
                            type="text"
                            class="form-control"
                            name="price"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <input
                            type="text"
                            class="form-control"
                            name="category"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        <small id="helpId" class="form-text text-body-secondary"
                            >Starter / Main Course / Dessert / Drinks</small
                        >
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Choose Image</label>
                        <input
                            type="file"
                            class="form-control"
                            name="image"
                            id=""
                            placeholder=""
                            aria-describedby="fileHelpId"
                        />
                        
                    </div>
                    
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Add !
                    </button>
                    
                    
                    
                </div>
                
            </form>
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
