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

    crearTablas(){
        this.database.addEventListener('onupgradeneeded', (event)=> {
            const data = event.target.result;
            data.createObjectStore('Competicion',{
                autoIncrement: true
            })
            console.log('Tabla creada con éxito');
        })
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



}


let database = new Database();
