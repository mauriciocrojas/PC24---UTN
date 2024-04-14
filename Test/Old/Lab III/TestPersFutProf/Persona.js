

class Persona {
    id;
    nombre;
    apellido;
    edad;

    constructor(id, nombre, apellido, edad) {
        verifyData(id, nombre, apellido, edad)
        this.id = id
        this.nombre = nombre;
        this.apellido = apellido
        this.edad = edad
    }

    verifyData(id, nombre, apellido, edad) {
        if (
            !id && parseInt(id) &&
            !nombre && typeof nombre != 'string' &&
            !apellido && typeof nombre != 'string' &&
            !(edad >= 18)
        ) {
            throw new Error('Los datos no son correctos')
        }
    }

    toString() {
        return `Id: ${this.id}, nombre: ${this.nombre}, apellido: ${this.apellido}, edad: ${this.edad}<br>`;
    }
}

class Futbolista extends Persona {

    equipo;
    posicion;
    cantidadGoles;

    constructor(id, nombre, apellido, edad, equipo, posicion, cantidadGoles) {
        super(id, nombre, apellido, edad)
        this.equipo = equipo;
        this.posicion = posicion;
        this.cantidadGoles = cantidadGoles;
    }

    toString() {
        return `${super.toString()}, equipo: ${this.equipo}, posicion: ${this.posicion}, cantidad de goles: ${this.cantidadGoles}`;
    }
}
class Profesional extends Persona {

    titulo;
    facultad;
    anioGraduacion;

    constructor(id, nombre, apellido, edad, titulo, facultad, anioGraduacion) {
        super(id, nombre, apellido, edad)
        this.titulo = titulo;
        this.facultad = facultad;
        this.anioGraduacion = anioGraduacion;
    }

    toString() {
        return `${super.toString()}, titulo: ${this.titulo}, facultad: ${this.facultad}, año de graduación: ${this.anioGraduacion}`;
    }
}

