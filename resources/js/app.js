import './bootstrap';

//Pasos de preparacion
document.addEventListener('DOMContentLoaded', function () {
    let pasoContador = document.querySelectorAll('#pasos-container .paso').length + 1;

    const btnAgregarPaso = document.getElementById('btn-agregar-paso');
    if (btnAgregarPaso) {
        btnAgregarPaso.addEventListener('click', function () {
            const pasoContainer = document.getElementById('pasos-container');
            const newPaso = document.createElement('div');
            newPaso.classList.add('paso');
            newPaso.innerHTML = `<textarea name="pasos[${pasoContador}]" class="form-control" placeholder="Paso ${pasoContador}"></textarea>`;
            pasoContainer.appendChild(newPaso);
            pasoContador++;
        });
    }
});

/**Boton ocultar redes sociales en recetas */
document.addEventListener('DOMContentLoaded', function () {
    let btnCompartir = document.getElementById('btnCompartir');
    let opcionesCompartir = document.getElementById('opcionesCompartir');

    btnCompartir.addEventListener('click', function () {
        opcionesCompartir.style.display = opcionesCompartir.style.display === 'none' ? 'block' : 'none';
    });

    //Ocultar la ventana emergente al hacer clic fuera de ella
    window.addEventListener('click', function (e) {
        if (!btnCompartir.contains(e.target) && !opcionesCompartir.contains(e.target)) {
            opcionesCompartir.style.display = 'none';
        }
    });
});


/*galeria_img_platos*/
// Obtiene todas las imágenes con la clase card-img-top
var imagenes = document.querySelectorAll('.card-img-top');

// Agrega la clase zoomable a todas las imágenes
imagenes.forEach(function (imagen) {
    imagen.classList.add('zoomable');
});

/*Hacer zoom efecto lupa*/
$('.img-container').hover(
    function () {
        $(this).find('img').css('transform', 'scale(1.2)');
    },
    function () {
        $(this).find('img').css('transform', 'scale(1)');
    }
);

/**Testimonio pagina index */
$(document).ready(function () {
    // Iniciar el carrusel automáticamente
    $('#testimoniosCarousel').carousel();

    // Velocidad de reproducción (ajusta el valor en milisegundos según tu preferencia)
    let velocidad = 3000; // 3 segundos

    // Función para mover automáticamente al siguiente testimonio
    function moveNext() {
        $('.carousel').carousel('next');
        setTimeout(moveNext, velocidad);
    }

    // Iniciar la función de movimiento automático
    setTimeout(moveNext, velocidad);
});




