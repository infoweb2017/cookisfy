import './bootstrap';

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

document.addEventListener('DOMContentLoaded', function () {
    const inputBusqueda = document.getElementById('buscarIngrediente');
    const resultadosBusqueda = document.getElementById('resultadoBusqueda');
    const ingredientesSeleccionadosFormulario = document.getElementById('ingredientesSeleccionadosFormulario');
    const ingredientesSeleccionadosContainer = document.getElementById('ingredientesSeleccionados');

    inputBusqueda.addEventListener('input', function () {
        const busqueda = this.value;

        // Si la búsqueda está vacía, no hacer la solicitud
        if (!busqueda.trim()) {
            resultadosBusqueda.innerHTML = '';
            return;
        }

        // Realizar solicitud AJAX
        fetch('/ingrediente/' + encodeURIComponent(busqueda), {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
            .then(response => response.json())
            .then(resultados => {
                // Aquí manejas los resultados de la búsqueda
                //resultadosBusqueda.innerHTML = '';
                resultados.forEach(ingrediente => {
                    const div = document.createElement('div');
                    div.classList.add('ingrediente-item');
                    //div.style.cursor = 'pointer';
                    div.textContent = ingrediente.nombre;
                    div.addEventListener('click', function () {
                        // Añadir ingrediente a la lista de seleccionados
                        ingredientesSeleccionadosFormulario.value += ingrediente.id + ',';

                        // Mostrar en la interfaz de usuario
                        const ingredienteSeleccionadoDiv = document.createElement('div');
                        ingredienteSeleccionadoDiv.textContent = ingrediente.nombre;
                        ingredienteSeleccionadoDiv.id = 'selected-' + ingrediente.id;

                        // Botón o enlace para eliminar
                        const eliminarBtn = document.createElement('button');
                        eliminarBtn.textContent = 'Borrar';
                        eliminarBtn.className = 'boton-eliminar';
                        eliminarBtn.onclick = function () {
                            // Eliminar este ingrediente de la lista de seleccionados
                            ingredienteSeleccionadoDiv.remove();
                            eliminarIngrediente(ingrediente.id);
                        };

                        ingredienteSeleccionadoDiv.appendChild(eliminarBtn);
                        ingredientesSeleccionadosContainer.appendChild(ingredienteSeleccionadoDiv);
                    });

                    resultadosBusqueda.appendChild(div);
                });
            })
            .catch(error => {
                console.error('Error en la solicitud AJAX:', error);
                alert('Error en la solicitud: ' + error.message);
            });
    });
});

function eliminarIngrediente(idIngrediente) {
    let ingredientes = ingredientesSeleccionadosFormulario.value.split(',');
    ingredientes = ingredientes.filter(id => id != idIngrediente);
    ingredientesSeleccionadosFormulario.value = ingredientes.join(',');
}


