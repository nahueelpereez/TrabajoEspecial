"use stict"

// event listeners
document.querySelector("#form-tarea").addEventListener('submit', addComentario);

// define la app Vue
let app = new Vue({
    el: "#template-vue-comentarios",
    data: {
        subtitle: "Estos comentarios se renderizan desde el cliente usando Vue.js",
        tasks: [], 
        auth: true
    }
});

/**
 * Obtiene la lista de tareas de la API y las renderiza con Vue.
 */
function obtenerComentarios() {
    fetch("api/tareas")
    .then(response => response.json())
    .then(comentarios => {
        app.comentarios = comentarios; // similar a $this->smarty->assign("tasks", $tasks)
    })
    .catch(error => console.log(error));
}

/**
 * Inserta una tarea usando la API REST.
 */
function addComentario(e) {
        e.preventDefault();
    let data = {
        contenido:  document.querySelector("input[name=contenido]").value,
        puntuacion:  document.querySelector("input[name=puntuacion]").value,
        usuario:  document.querySelector("input[name=usuario]").value,
    }
    fetch('api/tareas', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
    })
    .then(response => {
        obtenerComentarios();
    })
    .catch(error => console.log(error));
}

// obtiene las tareas al iniciio
obtenerComentarios();

