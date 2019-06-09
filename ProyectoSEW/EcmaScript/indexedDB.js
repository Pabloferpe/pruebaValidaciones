"use strict";

class Database {

    constructor() {
        this.databaseName = 'baseDatos';
        this.version = 1;
        this.database = this.openDatabase();
        this.db = undefined;
    };

    openDatabase() {
        let indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
        let request = indexedDB.open(this.databaseName, this.version);

        request.onerror = function () {
            console.log('The database is opened failed');
            return null;
        };
        request.onsuccess = function () {
            console.log('The database is opened successfully');
            database.database = request;
        };
    }

    createTable() {
        this.database.onupgradeneeded = function (event) {
            let db = database.result;
            if (!db.objectStoreNames.contains('competicion')) {
                let objectStore = db.createObjectStore('competicion', {autoIncrement: true});
                objectStore.addRow('nombre', objectStore);
                objectStore.addRow('lugar', objectStore);
                objectStore.addRow('fecha', objectStore);
                console.log('tabla creada');
            } else {
                console.log('La tabla ya esta creada');
            }
        }
    }

    addRow(nameRow, objectStore) {
        objectStore.createIndex(nameRow, nameRow, {unique: false});
    }

// Añadiendo datos
    add(nombre, lugar, fecha) {
        this.database.onupgradeneeded = function (event) {
            let db = event.target.result;
            let request = db.transaction(['competicion'], 'readwrite')
                .objectStore('competicion')
                .add({nombre: nombre, lugar: lugar, fecha: fecha});

            request.onsuccess = function (event) {
                console.log('Los datos han sido almacenados correctamente');
            };

            request.onerror = function (event) {
                console.log('Error al cargar los datos');
            }
        };
    }


// Leyendo datos
    read() {
        var transaction = db.transaction(['person']);
        var objectStore = transaction.objectStore('person');
        var request = objectStore.get(1);

        request.onerror = function (event) {
            console.log('Fallo en el trasacción');
        };

        request.onsuccess = function (event) {
            if (request.result) {
                console.log('Name: ' + request.result.name);
                console.log('Age: ' + request.result.age);
                console.log('Email: ' + request.result.email);
            } else {
                console.log('No hay datos almacenados');
            }
        };
    }


// Leyendo todos los datos
    readAll() {
        var objectStore = db.transaction('person').objectStore('person');

        objectStore.openCursor().onsuccess = function (event) {
            var cursor = event.target.result;

            if (cursor) {
                console.log('Id: ' + cursor.key);
                console.log('Name: ' + cursor.value.name);
                console.log('Age: ' + cursor.value.age);
                console.log('Email: ' + cursor.value.email);
                cursor.continue();
            } else {
                console.log('No hay más datos');
            }
        };
    }


// Actualizando datos
    update() {
        var request = db.transaction(['person'], 'readwrite')
            .objectStore('person')
            .put({id: 1, name: 'Jim', age: 35, email: 'Jim@example.com'});

        request.onsuccess = function (event) {
            console.log('Los datos han sido actualizados con éxito');
        };

        request.onerror = function (event) {
            console.log('Error al actualizar los datos');
        }
    }


// Borrando datos
    remove() {
        var request = db.transaction(['person'], 'readwrite')
            .objectStore('person')
            .delete(1);

        request.onsuccess = function (event) {
            console.log('Los datos han sido eliminados con éxito');
        };
    }
}


let database = new Database();
