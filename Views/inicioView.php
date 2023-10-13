<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kronos │ Inicio</title>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
        var scrollableContent = document.getElementById('div_carrusel');
        var containerWidth = scrollableContent.offsetWidth; // Ancho visible del contenedor
        var contentWidth = scrollableContent.scrollWidth; // Ancho total del contenido
        var scrollPosition = (contentWidth - containerWidth) / 2; // Posición de inicio en el centro
        scrollableContent.scrollLeft = scrollPosition;
        });
    </script>
</head>
<body>
<header>
    <a href='./?pag=inicio'><button>Inicio</button></a>
    <a href='./?pag=conozcanos'><button>Conozcanos</button></a>
    <a href='./?pag=login'><button>LogIn</button></a>
</header>
    <div id="div_video">
    <video id="videoInicio" autoplay="autoplay" loop="loop" muted defaultMuted playsinline  oncontextmenu="return false;"  preload="auto">
        <source src="/../Media/video/config/kronosVideo.mp4" type="video/mp4">
        <source src="/../Media/video/config/KronosVideo.webm" type="video/webm">
        <source src="/../Media/video/config/KronosVideo.ogv" type="video/ogg">
    </video>
        <img id="logoInicio" src="/../Media/img/config/logo.png">
    </div>
    <div id="div_titulo">
        <br>
        <h1>Galeria</h1>
        <br>
    </div>
    <div id="div_carrusel">
        <div id="carrusel_imagen_container">
            <img id="img_carrusel" src="/../Media/img/clases/baile_popular.jpg">
        </div>
        <div id="carrusel_imagen_container">
            <img id="img_carrusel" src="/../Media/img/clases/estimulacion_temprana.jpg">
        </div>
        <div id="carrusel_imagen_container">
            <img id="img_carrusel" src="/../Media/img/clases/ginnacioa_artistica.jpg">
        </div>
        <div id="carrusel_imagen_container">
            <img id="img_carrusel" src="/../Media/img/clases/judo.jpg">
        </div>
        <div id="carrusel_imagen_container">
            <img id="img_carrusel" src="/../Media/img/clases/yoga.jpg">
        </div>
        <div id="carrusel_imagen_container">
            <img id="img_carrusel" src="/../Media/img/clases/dale_vida.jpg">
        </div>
        <div id="carrusel_imagen_container">
            <img id="img_carrusel" src="/../Media/img/clases/fuerte.jpg">
        </div>
        <div id="carrusel_imagen_container">
            <img id="img_carrusel" src="/../Media/img/clases/fit_boxing.jpg">
        </div>
        <div id="carrusel_imagen_container">
            <img id="img_carrusel" src="/../Media/img/clases/mma.jpg">
        </div>
    </div>
    <div id="div_titulo">
        <br>
        <h1>Ubicación</h1>
        <br>
    </div>
    <div id="div_container">
        <div id="div_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d245.69072526310762!2d-84.31352794966315!3d9.846033147616577!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa1ab78a3b960f3%3A0xbc8ac03f84d6e9ab!2sKronos%20Gym%20Puriscal!5e0!3m2!1ses-419!2scr!4v1688493164089!5m2!1ses-419!2scr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div id="div_titulo">
        <br>
        <h1>Contactenos</h1>
        <br>
    </div>
    <div id="div_container">
        <div id="div_email">
            <form id="form_email" action="https://formspree.io/f/mpzgavng" method="POST">
                <label>Indique un correo para contactarle:</label><br>
                <input type="email" name="email"><br>
                <label>Mensaje:</label><br>
                <textarea name="message" cols="1" rows="10" maxlength="1000"></textarea><br>
                <div id="email_button_container">
                    <button type="submit"> Enviar </button>
                </div>
                <br><br><br>
            </form>
        </div>
    </div>
</body>
</html>