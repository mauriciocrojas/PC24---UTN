//Harcodeo la cabecera de la tabla creando un array con el objeto que contiene los datos de la misma
const cabecera = [
    {
        "id": "Id",
        "nombre": "Nombre",
        "apellido": "Apellido",
        "edad": "Edad",
        "equipo": "Equipo",
        "posicion": "Posicion",
        "cantidadGoles": "Cant goles",
        "titulo": "Título",
        "facultad": "Facultad",
        "anioGraduacion": "Año graduación"
    }
];

//Harcodeo un array de personas
const arrayPersonas = [
    {
        "id": 1,
        "nombre": "Marcelo",
        "apellido": "Luque",
        "edad": 45,
        "titulo": "Ingeniero",
        "facultad": "UTN",
        "anioGraduacion": 2002
    },
    {
        "id": 2,
        "nombre": "Ramiro",
        "apellido": "Escobar",
        "edad": 35,
        "titulo": "Medico",
        "facultad": "UBA",
        "anioGraduacion": 20012
    },
    {
        "id": 3,
        "nombre": "Facundo",
        "apellido": "Cairo",
        "edad": 30,
        "titulo": "Abogado",
        "facultad": "UCA",
        "anioGraduacion": 2017
    },
    {
        "id": 4,
        "nombre": "Fernando",
        "apellido": "Nieto",
        "edad": 18,
        "equipo": "Independiente",
        "posicion": "Delantero",
        "cantidadGoles": 7
    },
    {
        "id": 5,
        "nombre": "Manuel",
        "apellido": "Loza",
        "edad": 20,
        "equipo": "Racing",
        "posicion": "Volante",
        "cantidadGoles": 2
    },
    {
        "id": 6,
        "nombre": "Nicolas",
        "apellido": "Serrano",
        "edad": 23,
        "equipo": "Boca",
        "posicion": "Arquero",
        "cantidadGoles": 0
    }
];

//Capturo el botón Agregar mediante su Id (el mismo mostrará el formAbm)
const btnAgregar = document.getElementById('btnAgregar')

//Capturo formAbm mediante su clase
const formulario = document.querySelector('.formAbm')

//Oculta el formAbm (en desuso)
const ocultar = () => {
    // Con el elemento capturado, accedo a style.display
    formulario.style.display = 'none'
}

//Muestra el formAbm
const mostrar = () => {
    // Con el elemento capturado, accedo a style.display
    formulario.style.display = 'block'
}

//Capturo el evento click del botón agregar, y le paso la función para que muestre el formAbm
btnAgregar.addEventListener('click', mostrar)

//Ejemplo map
// const personade45 = personas.map((persona)=>{
//     if(persona.edad == 45) {
//         return persona
//     }
// })


//Función que crea la cabecera con sus datos respectivos (retorna una lista con los objetos)
const crearCabecera = (array) => {

    const listHead = array.map((campoCabecera) => {

        const tr = document.createElement('tr')

        let th;

        for (const key in campoCabecera) {
            th = document.createElement('th')
            th.innerHTML = campoCabecera[key]
            th.id = key

            tr.id = 0;

            tr.appendChild(th)

            const dataThead = document.querySelector('#dataThead')

            dataThead.appendChild(tr)

        }
        return tr
    })

    return listHead
}

//Guardo la lista de cabecera
let listaHead = crearCabecera(cabecera);

//Consologueo la lista de cabecera para confirmar sus datos
listaHead.forEach(elemento => {
    console.log(elemento);
});


//Función que crea las filas con sus datos respectivos (retorna una lista con los objetos)
const crearFilas = (array) => {

    const listCampos = array.map((persona) => {

        const tr = document.createElement('tr')

        let td;

        for (const key in persona) {
            td = document.createElement('td')
            td.innerHTML = persona[key]
            td.id = key

            if (key === "id") {

                tr.id = persona[key]
            }

            tr.appendChild(td)

            const dataTbody = document.querySelector('#dataTbody')

            dataTbody.appendChild(tr)
        }
        return tr
    })

    return listCampos
}


//Guardo la lista de filas
let listCampos = crearFilas(arrayPersonas)

//Consologueo la lista de filas para confirmar sus datos
listCampos.forEach(element => {
    console.log(element)
});


//Calculo promedio edad genérico
const calculaEdadPromedio = (array) => {
    let acumEdad = 0;

    array.forEach(persona => {

        for (const key in persona) {
            if (key == "edad") {
                acumEdad += persona[key];
            }
        }
    }
    )

    return (acumEdad / array.length);
}

//Función que muestra el promedio de edad en el text box tbEdadPromedio
const mostrarEdadPromedio = () => {
    document.getElementById('tbEdadPromedio').value = calculaEdadPromedio(arrayPersonas);
}

//Capturo el botón Calcular Edad Promedio, y le digo que cuando reciba un click, llame a la función mostrarEdadPromedio
let botonCalcularEdadPromedio = document.getElementById('btnCalcularEdadPromedio');
botonCalcularEdadPromedio.addEventListener('click', mostrarEdadPromedio);

