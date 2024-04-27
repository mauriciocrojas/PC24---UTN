//Capturo los botones Mostrar y Ocultar mediante su Id
const btnMostrar = document.getElementById('btnDescripcionMostrar')
const btnOcultar = document.getElementById('btnDescripcionOcultar')

//Capturo la descripcion mediante su clase
const descripciones = document.querySelector('.descripciones')


//Oculta la clase descripcion
const ocultar = () => {
    // Con el elemento capturado, accedo a style.display
    descripciones.style.display = 'none'
}

//Muestra la clase descripcion
const mostrar = () => {
    // Con el elemento capturado, accedo a style.display
    descripciones.style.display = 'block'
}

//Capturo el evento click del botón agregar, y le paso la función para que muestre el formAbm
btnMostrar.addEventListener('click', mostrar)
btnOcultar.addEventListener('click', ocultar)



//Manera abreviada

// const btnMostrar = document.getElementById('btnDescripcionMostrar')
// const btnOcultar = document.getElementById('btnDescripcionOcultar')


// const descripciones = document.querySelector('.descripciones');


// btnMostrar.addEventListener('click', () => {
//     descripciones.style.display = 'block';
// });

// btnOcultar.addEventListener('click', () => {
//     descripciones.style.display = 'none';
// });