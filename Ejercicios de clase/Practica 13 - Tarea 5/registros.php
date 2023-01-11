<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/style/style.css">
    <title>Registro</title>
</head>

<body>

    <div class="container">
        <form action="" method="post">
            <fieldset style="height: 450px;">
                <legend class="float-none w-auto px-3">Registro de nuevo usuario</legend>
                    <div class="mb-3">
                        <label for="nombre" style="font-weight:bold;">Login</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" style="font-weight:bold;">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="repassword" style="font-weight:bold;">Repite la password</label>
                        <input type="password" name="repassword" id="repassword" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" style="font-weight:bold;">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input class="btn btn-primary form-control" type="button" value="Enviar" style="width: 35%;background-color: rgb(209, 207, 207); border-radius: 0; border-color: black; color: black; margin-right: 28%;">
                        <input class="btn btn-primary form-control" type="button" value="Volver" style="width: 35%;background-color: rgb(209, 207, 207); border-radius: 0; border-color: black; color: black;">
                    </div>

            </fieldset>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</body>

</html>