;(function(){
    ymaps.ready(function () {
        var myMap = new ymaps.Map('ymap', {
                center: [55.113828, 59.719560],
                zoom: 16
            }, {
                searchControlProvider: 'yandex#search'
            }),

            myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                balloonContent: 'г. Златоуст ул. Пушкина д. Калатушкина'
            }, {
                // Опции.
                // Необходимо указать данный тип макета.
                iconLayout: 'default#image',
                // Своё изображение иконки метки.
                iconImageHref: '../project/img/common/map-icon3.png',
                // Размеры метки.
                iconImageSize: [40, 40],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [-50, -38]
            });


        myMap.geoObjects.add(myPlacemark)
    });
})();
