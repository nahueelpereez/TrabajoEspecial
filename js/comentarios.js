"use strict"

// event listeners
//document.querySelector("#form-comentarios").addEventListener('submit', obtenerComentarios);
document.addEventListener('DOMContentLoaded', function(){

// define la app Vue
let app = new Vue({
    el: "#template-vue-comentarios",
    data: {
        subtitle: "Estos comentarios se renderizan desde el cliente usando Vue.js",
        comentarios: [], 
        auth: true
    }
});

/**
 * Obtiene la lista de comentarios de la API y las renderiza con Vue.
 */
function obtenerComentarios() {
    console.log(obtenerComentarios);
    fetch("api/comentarios")
    .then(response => response.json())
    .then(comentarios => {
        console.log(comentarios);
        app.comentarios = comentarios; // similar a $this->smarty->assign("tasks", $tasks)
    })
    .catch(error => console.log(error));
}

/**
 * Inserta una comentarios usando la API REST.
 */

function addComentario(e) {
        e.preventDefault();
    let data = {
        usuario:  document.querySelector("input[name=usuario]").value,
        contenido:  document.querySelector("input[name=contenido]").value,
        puntuacion:  document.querySelector("input[name=puntuacion]").value,
    }
    fetch('api/comentarios', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
    })
    .then(response => {
        obtenerComentarios();
    })
    .catch(error => console.log(error));
}

// obtiene las comentarios al inicio
obtenerComentarios();

document.querySelector("#form-comentarios").addEventListener('submit', addComentario);



});
