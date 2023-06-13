$('.header-top .menu-bar').on('click', function () {
    $('#menuBar').toggleClass('active').focus();
});


$(document).mouseup(function (e) {
    if ($(e.target).closest("#menuBar").length === 0) {
        $("#menuBar").removeClass('active');
    }
});

document.addEventListener('DOMContentLoaded', function () {
    new Splide('#flash-splide', {
        perPage: 4,
        width: 'auto',
        height: 'auto',
        gap: 20,
        breakpoints: {
            1200: {
                perPage: 3,
            },
            992: {
                perPage: 2,
            },
            768: {
                perPage: 1,
            },
        }
    }).mount();
});
document.addEventListener('DOMContentLoaded', function () {
    new Splide('#product-splide', {
        perPage: 4,
        width: 'auto',
        height: 'auto',
        gap: 20,
        breakpoints: {
            1200: {
                perPage: 3,
            },
            992: {
                perPage: 2,
            },
            767: {
                perPage: 1,
            },
        }
    }).mount();
});
document.addEventListener('DOMContentLoaded', function () {
    new Splide('.product-splide', {
        perPage: 4,
        width: 'auto',
        height: 'auto',
        gap: 20,
        breakpoints: {
            1200: {
                perPage: 3,
            },
            992: {
                perPage: 2,
            },
            767: {
                perPage: 1,
            },
        }
    }).mount();
});
document.addEventListener('DOMContentLoaded', function () {
    new Splide('.newsletter-splide', {
        perPage: 3,
        width: 'auto',
        height: 'auto',
        gap: 20,
        breakpoints: {
            1200: {
                perPage: 3,
            },
            992: {
                perPage: 2,
            },
            767: {
                perPage: 1,
            },
        }
    }).mount();
});

if(document.querySelector('.customer-splide')){
    new Splide( '.customer-splide', {
        perPage: 3,
        gap: 20,
        focus  : 0,
        breakpoints: {
            1200: {
                perPage: 3,
            },
            992: {
                perPage: 2,
            },
            767: {
                perPage: 1,
            },
        }
    } ).mount();
}


//Slider for Detail page

var splide = new Splide( '#main-slider', {
    pagination: false,
    } );

    var thumbnails = document.getElementsByClassName( 'thumbnail' );
    var current;

    for ( var i = 0; i < thumbnails.length; i++ ) {
    initThumbnail( thumbnails[ i ], i );
    }

    function initThumbnail( thumbnail, index ) {
    thumbnail.addEventListener( 'click', function () {
        splide.go( index );
    } );
    }

    splide.on( 'mounted move', function () {
    var thumbnail = thumbnails[ splide.index ];

    if ( thumbnail ) {
        if ( current ) {
        current.classList.remove( 'is-active' );
        }

        thumbnail.classList.add( 'is-active' );
        current = thumbnail;
    }
    } );

splide.mount();
