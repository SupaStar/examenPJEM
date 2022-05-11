<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Login - PJEM</title>
    </head>
    <body class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Bienvenido!</h4>
                                    </div>
                                    <form class="user">
                                        <div class="mb-3"><input id="login" class="form-control form-control-user" type="email" placeholder="Ingrese su correo.." name="login" /></div>
                                        <div class="mb-3"><input id="password" class="form-control form-control-user" type="password" placeholder="Password" name="password" /></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input id="formCheck-1" class="form-check-input custom-control-input" type="checkbox" /><label class="form-check-label custom-control-label" for="formCheck-1">Recuerdame</label></div>
                                            </div>
                                        </div><a class="btn btn-primary d-block btn-user w-100" id="btnLogin">Registrar Solicitud</a>
                                    </form>
                                   </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script>
    $(document).ready(function(){
        $('#btnLogin').click(function(){
            $.ajax({
                url: 'http://localhost:8000/api/login',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    login: $('#login').val(),
                    password: $('#password').val()
                },
                success: function(response){
                    console.log(response);
                }
            });
        });
    });
</script>
</body>
</html>
