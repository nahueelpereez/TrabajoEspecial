"use strict"

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

    // obtiene los comentarios al inicio
    obtenerComentarios();

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

    function borrarComentario(id) {

        let url = "http//localhost:8080/TrabajoEspecial-master/api/comentarios"
        fetch(url + "/" + id, {
            'method': 'DELETE',
        })
            .then(function (r) {
                if (!r.ok) {
                    console.log("error")
                }
                return r.json()
            })
            .then(function (json) {
                //data.innerHTML = JSON.stringify(json);
                obtenerComentarios();
            })
            .catch(function (e) {
                console.log(e)
            })

    }

    function agregarComentario() {
        console.log("agregarComentario");
        let data = {
            usuario:  document.querySelector("input[name=usuario]").value,
            contenido:  document.querySelector("input[name=contenido]").value,
            puntuacion:  document.querySelector("input[name=puntuacion]").value,
        }

        console.log(data);
        let url = "http//localhost:8080/TrabajoEspecial-master/api/comentarios"
        fetch(url, {
            'method': 'POST',
            "mode": 'cors',
            'headers': {
                'Content-Type': 'application/json'
            },
            'body': JSON.stringify(data)
        })
            .then(function (r) {
                if (!r.ok) {
                    console.log("error")
                }
                return r.json()
            })
            .then(function (json) {
                //data.innerHTML = JSON.stringify(json);
                obtenerComentarios();
            })
            .catch(function (e) {
            //  console.log(e)
            })
    }

    function agregarFilaComentarios(){
    agregarComentario();
    } 

    let btn = document.querySelector("#boton1");
    btn.addEventListener('click', agregarFilaComentarios);

    document.querySelector("#botonBorrar").addEventListener('click', borrarComentario);

});
