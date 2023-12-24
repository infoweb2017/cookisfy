import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const btnMostrarIngredientes = document.getElementById('btnMostrarIngredientes');
    const selectorIngredientes = document.getElementById('selectorIngredientes');
    const checkboxes = document.querySelectorAll('.ingrediente-checkbox');
    const buscarIngrediente = document.getElementById('buscarIngrediente');
    const btnMostrarSeleccionados = document.getElementById('btnMostrarSeleccionados');
    const ingredientesMostrados = document.getElementById('ingredientesMostrados');
    const btnMostrarFormularioIngrediente = document.getElementById('btnMostrarFormularioIngrediente');
    const formularioAgregarIngrediente = document.getElementById('formularioAgregarIngrediente');
    const btnGuardarNuevoIngrediente = document.getElementById('btnGuardarNuevoIngrediente');
    const nombreNuevoIngrediente = document.getElementById('nombreNuevoIngrediente');

    btnMostrarIngredientes.addEventListener('click', () => {
        selectorIngredientes.style.display = selectorIngredientes.style.display === "none" ? "block" : "none";
    });
    btnMostrarFormularioIngrediente.addEventListener('click', () => {
        formularioAgregarIngrediente.style.display = 'block';
    });


    buscarIngrediente.addEventListener('input', () => {
        const textoBuscado = buscarIngrediente.value.toLowerCase();
        checkboxes.forEach(checkbox => {
            const nombreIngrediente = checkbox.nextElementSibling.textContent.toLowerCase();
            const contenedor = checkbox.closest('.checkbox');
            if (nombreIngrediente.includes(textoBuscado)) {
                contenedor.style.display = '';
            } else {
                contenedor.style.display = 'none';
            }
        });
    });

    btnMostrarSeleccionados.addEventListener('click', () => {
        let ingredientesSeleccionados = [];
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const nombreIngrediente = checkbox.closest('.checkbox').querySelector('span').textContent.trim();
                ingredientesSeleccionados.push(nombreIngrediente);
            }
        });

        ingredientesMostrados.textContent = 'Ingredientes seleccionados: ' + ingredientesSeleccionados.join(', ');
        ingredientesMostrados.style.display = 'block';
    });

    btnGuardarNuevoIngrediente.addEventListener('click', () => {
        const ingrediente = nombreNuevoIngrediente.value;

        fetch('/ingredientes/guardar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Importante para la seguridad en Laravel
            },
            body: JSON.stringify({ nombre: ingrediente })
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Aquí puedes actualizar la UI según la respuesta
                formularioAgregarIngrediente.style.display = 'none';
            })
            .catch(error => console.error('Error:', error));
    });
});