( function() {

    var clipboard = new ClipboardJS( '.clipboard-link', {
        target: function( trigger ) {
            return trigger.nextElementSibling;
        }
    } );

    console.log( clipboard );

    clipboard.on('success', function( event ) {
        console.info( 'Action:', event.action );
        console.info( 'Text:', event.text );
        console.info( 'Trigger:', event.trigger );

        event.trigger.nextElementSibling.classList.toggle( 'copied' );

        event.clearSelection();
    });

    clipboard.on( 'error', function( event ) {
        console.error( 'Action:', event.action );
        console.error( 'Trigger:', event.trigger );
    });
	
})();