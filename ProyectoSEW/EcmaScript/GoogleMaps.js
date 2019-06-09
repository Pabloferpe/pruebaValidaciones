"use strict";

class Mapa {
    constructor() {

    }

    initialize() {
        let goFit = {
            name: 'GoFit',
            location: {
                lat: 43.352571, lng: -5.861109
            }
        };

        let bossBarbell = {
            name: 'Boss Barbell',
            location: {
                lat: 37.3984665, lng: -122.0834043
            }
        };

        let zooCulture = {
            name: 'Panthers Powerlifting',
            location: {
                lat: -27.482902, lng: 153.002664


            }
        };

        let powerexplosive = {
            name: 'Powerexplosive',
            location: {
                lat: 40.425482, lng: -3.668373
            }
        };

        let tarrako = {
            name: 'Strongman Tarrako',
            location: {
                lat: 41.111401, lng: 1.231261

            }
        };

        let jakabol = {
            name: 'Jakaból',
            location: {
                lat: 64.108654, lng: -21.832602


            }
        };

        let thor = {
            name: 'Thors Power Gym',
            location: {
                lat: 64.113391, lng: -21.903402
        }
        };
        let mount = {
            name: 'Mount Vernon Barbell',
            location: {
                lat: 40.910866, lng: -73.850694

            }
        };

        let hybrid = {
            name: 'Hybrid Performance Method Gym',
            location: {
                lat: 25.801987, lng: -80.204530


            }
        };

        let animal = {
            name: 'Animal Barbell',
            location: {
                lat:  53.384811, lng: -6.401451
            }
        };



        let map = new google.maps.Map(document.getElementById('map'), {
            zoom: 2.5,
            center: {
                lat: 0, lng: 0
            }
        });



        google.maps.event.addListener(map, 'click', function (event) {
            addMarker(event.latLng, map);
        });


        this.addMarker(goFit, map);
        this.addMarker(bossBarbell, map);
        this.addMarker(zooCulture, map);
        this.addMarker(powerexplosive, map);
        this.addMarker(tarrako, map);
        this.addMarker(jakabol, map);
        this.addMarker(thor, map);
        this.addMarker(mount, map);
        this.addMarker(hybrid, map);
        this.addMarker(animal, map);
    }

    addMarker(location, map) {
        var marker = new google.maps.Marker({
            position: location.location,
            label: location.name,
            map: map
        });
    }
}

let map = new Mapa();