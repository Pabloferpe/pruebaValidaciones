class Pelicula {
    constructor() {
        this.apiKey = 'b93965202c18fbb0d285e63afbba4da5';
        this.url1 = 'https://api.themoviedb.org/3/movie/';
        this.url2 = '?api_key=' + this.apiKey + '&language=en-US';

        this.idList = new Array(7);
        this.idList[0] = 1366;
        this.idList[1] = 1367;
        this.idList[2] = 1371;
        this.idList[3] = 1374;
        this.idList[4] = 1375;
        this.idList[5] = 1246;
        this.idList[6] = 9563;
        this.idList[7] = 134374;
    }


    cargarDatos() {
        for(var i = 0; i<this.idList.length; i++){
            var id = this.idList[i];
            $.ajax({
                dataType: "json",
                url: this.url1 + id + this.url2,
                method: 'GET',
                success: function (json) {
                    pelicula.mostrar(json);
                }
                ,
                error: function () {
                    alert("Error al cargar los datos");
                }
            })
        }


    }

    mostrar(json) {
        console.log(json);
        $("main").append("<h1>" + json.original_title + "</h1>");
        $("main").append("<p>" + "Descripción: " + json.overview + "</p>");
        $("main").append("<p>" + "Fecha de estreno: " + json.release_date + "</p>");
        $("main").append("<p>" + "Idioma original: " + json.original_language + "</p>");
        $("main").append("<p>" + "Puntuación: " + json.vote_average + "</p>");
    }

}

let pelicula = new Pelicula();
pelicula.cargarDatos();