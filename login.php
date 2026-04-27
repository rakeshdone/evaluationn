<?php
    include "db.php";

    if ($_SERVER["REQUEST_METHOD"]==="POST") {
        $email=$_POST["email"];
        $password=$_POST["password"];

        $sql=$conn->prepare("select id,password from user where email=?");
        $sql->bind_param("s",$email);
        $sql->execute();
        $sql->store_result();
        $sql->bind_result($id,$pass);

        if ($sql->fetch() && password_verify($password,$pass)) {
            $_SESSION["id"]=$id;
            $_SESSION["email"]=$email;
            header("Location:index.php");
        }else {
            echo "<script>alert('Invalid Credentials')</script>";
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
            <h3 class="text-center py-2 my-2">Login Here !</h3>
            <form action="" method="POST">
                <div
                    class="container col-5 py-2 my-3 rounded bordered shadow"
                >
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id=""
                            aria-describedby="emailHelpId"
                            placeholder="abc@mail.com"
                        />
                    </div>
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            id=""
                            placeholder=""
                        />
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Login
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
