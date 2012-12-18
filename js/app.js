var timer;

$( '#from' ).keyup( function() {
    clearTimeout( timer );

    timer = setTimeout( function() {
        $( '#submit' ).click();
    }, 2000 );
} );
