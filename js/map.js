// Map
$(function () {

    var mapScript = $.getScript('https://api-maps.yandex.ru/2.1/?apikey=dd600716-0205-4c6b-92b6-fff59b74a8ab&lang=ru_RU');

    $.when(mapScript)
        .done(function () {
            ymaps.ready(init);

            function init() {
                var center = [52.26668, 104.31239270000003];

                var myMap = new ymaps.Map("map", {
                    center: center,
                    zoom: 14,
                    controls: []
                });

                myMap.behaviors.disable('scrollZoom');

                // var myPlacemark = new ymaps.Placemark(center, {}, {
                //     iconLayout: 'default#image',
                //     iconImageHref: '/wp-content/themes/baikal-story/img/logo.svg',
                //     iconImageSize: [38, 37],
                //     iconImageOffset: [-3, -42]
                // });
                //
                // myMap.geoObjects.add(myPlacemark);
            }
        })

});
