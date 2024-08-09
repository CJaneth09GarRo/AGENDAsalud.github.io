<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/styles.css">


    <title>Agenda medica</title>
</head>

<body id="body-pd">

    <header class="header" style="padding-left:60px;padding-right:60px;" id="header">

        <div class="header_toggle" style="font-size:2rem;font-weight: bold;">Agenda médica</div>

            <div class="nav_nada">
                <div class="header_img">
                    <img src="img/user.png" alt="">
                </div>
                <a class="nav-link" href="login.php" role="button"aria-expanded="false">Iniciar sesión</a>
            </div>
        </div>
    </header>
    <section class="section-background">
        <div class="container col-3 text-bottom-left d-flex flex-column align-items-center justify-content-center" style="margin-top:40px">
            <h3>Gestiona tus consultas médicas con la Agenda de Salud</h3>
        </div>
        <div class="row col-8" style="width:1100px; padding-right:0; margin-top:130px;">
            <div class="row col-4">
                <p style="text-align: justify; padding:0px;">Evitando largas filas para poder agendar tus citas, podrás facilmente programar tus proximas consultas con nuestra plataforma. <br>Tenemos el proposito de ayudar a todos los pacientes de nuestra clinica a la agenda de sus citas medicas, facilitando el acceso a las mismas a traves de un software que le ahorre tiempo a los pacientes y que le brinde la oportunidad de tener atención medica en las especialidades que ofrecemos.
                <h5 style="padding:0px">¡No dudes en contar con nosotos!</h5>
                </p>

                <!-- <a href="login.php"><input type="button"  value="¡Registrate!"></input></a> -->
                <!-- <div>
                    <input type="sumit" value="¡Registrate!"  onclick="location='registro.php'" />
                </div> -->
                <!-- <button  onclick="location.href='registro.php'">¡Registrate!</button> -->
                <!-- <a href="registro.php" class="btn btn-primary btn-lg btn-block" target="_blank">Mi boton</a> -->
                <a href="registro.php" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="false">¡Registrate!</a>
            </div>
            

            <div class="row col-4" style="width:765px;margin-right:0px;padding-right:0px;">
                <div class="container justify-content-center" style="padding-left:430px; padding-right:0px; ">
                    <div class="container"><img src="img/247.png" width="45"> Agenda en cualquier momento</div><br>
                    <div class="container"><img src="img/historial.png" width="45"> Historial para cada paciente</div><br>
                    <div class="container"><img src="img/seguridad.png" width="45"> Privacidad y seguridad</div><br>
                    <div class="container"><img src="img/calendario.png" width="45"> Adaptable para tu agenda</div><br>
                    <div class="container"><img src="img/doctor.png" width="45"> Elige al doctor de tu preferencia</div>
                </div>
            </div>
        </div>


    </section>


    <div class="min-vh-100" style="background-image: linear-gradient(rgba(0, 88, 202, 0.3), rgba(255, 255, 255, 0.3));background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh; display: flex; justify-content: center; align-items: center;">
        <div class="container">
            <br><br><br>
            <h2>Agenda con nosotros en 8 especialidades distintas.</h2> <br><br>
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="img/cardio.png" class="card-img-top item-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Cardiología</h5>
                        </div>

                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="img/endocrinologia.png" class="card-img-top item-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Endocrinología</h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="img/gastro.png" class="card-img-top item-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Gastroenterología</h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="img/ginecologia.png" class="card-img-top item-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Ginecología</h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="img/neumologia.png" class="card-img-top item-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Neumología</h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="img/obste.png" class="card-img-top item-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Obstetricia</h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="img/ortopedia.png" class="card-img-top item-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Ortopedia</h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="img/neurologia.png" class="card-img-top item-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">neurologia</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<?php include 'includes/footer.php'; ?>