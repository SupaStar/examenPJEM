<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Configuracion de Carga - PJEM</title>
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
                                        <h4 class="text-dark mb-4">Bienvenido a la configuracion de la carga!</h4>
                                    </div>
                                    <form class="user">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                        <div class="mb-3"><label for="proporcion">Ingrese la proporcion de la Carga</label><input id="proporcion" class="form-control form-control-user" type="number"  name="proporcion" /></div>
                                        <div class="mb-3"><label for="diferencia">Ingrese la diferencia de la Carga</label><input id="diferencia" class="form-control form-control-user" type="number"  name="diferencia" /></div>
                                        <div class="mb-3"><label for="anio">Seleccione el anio con fecha de la Carga</label><input id="anio" class="form-control form-control-user" type="date"  name="anio" /></div>
                                        <div class="mb-3">
                                        </div><a class="btn btn-primary d-block btn-user w-100" id="btnRegistrar">Login</a>
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
        $('#btnRegistrar').click(function(){
        let anioInput=$('#anio').val().split('-')[0];
            $.ajax({
                url: 'http://localhost:8000/api/registrarconfigcarga',
                type: 'POST',
                data: {
                    proporcion: $('#proporcion').val(),
                    diferencia: $('#diferencia').val(),
                    anio: anioInput
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
