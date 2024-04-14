

class Persona {
    id;
    nombre;
    apellido;
    edad;

    constructor(id, nombre, apellido, edad) {
        this.id = id
        this.nombre = nombre;
        this.apellido = apellido
        this.edad = edad
    }


}

class Heroe extends Persona {

    alterEgo;
    ciudad;
    publicado;

    constructor(id, nombre, apellido, edad, alterEgo, ciudad, publicado) {
        super(id, nombre, apellido, edad)
        this.alterEgo = alterEgo;
        this.ciudad = ciudad;
        this.publicado = publicado;
    }
    


}
class Villano extends Persona {

    enemigo;
    robos;
    asesinatos;

    constructor(id, nombre, apellido, edad, enemigo, robos, asesinatos) {
        super(id, nombre, apellido, edad)
        this.enemigo = enemigo;
        this.robos = robos;
        this.asesinatos = asesinatos;
    }

}



//Harcodeo la cabecera de la tabla creando un array con el objeto que contiene los datos de la misma
const cabecera = [
    {
        "id": "Id",
        "nombre": "Nombre",
        "apellido": "Apellido",
        "edad": "Edad",
        "alterego": "Alterego",
        "ciudad": "Ciudad",
        "publicado": "Publicado",
        "enemigo": "Enemigo",
        "robos": "Robos",
        "asesinatos": "Asesinatos"
    }
];

//Harcodeo un array de personas
const arrayPersonas = [
{
    "id":1, 
    "nombre":"Clark", 
    "apellido":"Kent", 
    "edad":45, 
    "alterego":"Superman", 
    "ciudad":"Metropolis",
    "publicado":2002
},
{
    "id":2, 
    "nombre":"Bruce", 
    "apellido":"Wayne", 
    "edad":35, 
    "alterego":"Batman", 
    "ciudad":"Gotica",
    "publicado":20012
},
{
    "id":3, 
    "nombre":"Bart", 
    "apellido":"Alen", 
    "edad":30, 
    "alterego":"Flash", 
    "ciudad":"Central",
    "publicado":2017
},
{
    "id":4, 
    "nombre":"Lex", 
    "apellido":"Luthor", 
    "edad":18, 
    "enemigo":"Superman", 
    "robos":500,
    "asesinatos":7
},
{
    "id":5, 
    "nombre":"Harvey", 
    "apellido":"Dent", 
    "edad":20, 
    "enemigo":"Batman", 
    "robos":750,
    "asesinatos":2
},
{
    "id":6, 
    "nombre":"Celina", 
    "apellido":"kyle", 
    "edad":23, 
    "enemigo":"Batman", 
    "robos":25,
    "asesinatos":1
}
];

//Capturo el botones mediante su Id
const btnAgregar = document.getElementById('btnAgregar')
const btnAlta = document.getElementById('btnAlta')
const btnCancelar = document.getElementById('btnCancelar')
const btnModificar = document.getElementById('btnModificar')
const btnEliminar = document.getElementById('btnEliminar')


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
    btnModificar.style.display = 'none'
    btnEliminar.style.display = 'none'
}

//Capturo el evento click del botón agregar, y le paso la función para que muestre el formAbm
btnAgregar.addEventListener('click', mostrar)


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


//ABM - INPUTS
const tbId=document.getElementById("tbId")
const tbNombre=document.getElementById("tbNombre")
const tbApellido=document.getElementById("tbApellido")
const tbEdad=document.getElementById("tbEdad");
const tbAlterEgo=document.getElementById("tbAlterego");
const tbCiudad=document.getElementById("tbCiudad");
const tbPublicado=document.getElementById("tbPublicado");
const tbEnemigo=document.getElementById("tbEnemigo");
const tbRobos=document.getElementById("tbRobos");
const tbAsesinatos=document.getElementById("tbAsesinatos");

//Capturo selected Tipo (Heroe = 0, Villano =1)
let selTipo = document.getElementById('selTipo');

//Crea una persona
function createPerson() {

    if (selTipo.selectedIndex==0)
    {
        return new Heroe(tbId.value,tbNombre.value, tbApellido.value, tbEdad.value, tbAlterEgo.value, tbCiudad.value, tbPublicado.value);
    }
    else if (selTipo.selectedIndex==1)
    {
        return new Villano(tbId.value,tbNombre.value, tbApellido.value, tbEdad.value, tbEnemigo.value, tbRobos.value, tbAsesinatos.value);
    }
        return new Persona(tbId.value,tbNombre.value, tbApellido.value, tbEdad.value);
}

//BtnAlta
btnAlta.addEventListener("click", ()=>{
        let vacio = [{"actualizado":"Actualizado"}]

        let nuevoRegistro=createPerson();
        console.log(nuevoRegistro)
        arrayPersonas.push(nuevoRegistro);
        crearFilas(vacio);
        crearFilas(arrayPersonas);

});

