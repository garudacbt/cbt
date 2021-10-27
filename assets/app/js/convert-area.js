jQuery.fn.convertToHtmlFile = function(docTitle, css){
	var strFrameName = ("printer-" + (new Date()).getTime());
	var jFrame = $( "<iframe name='" + strFrameName + "'>" );
	jFrame
		.css( "width", "1px" )
		.css( "height", "1px" )
		.css( "position", "absolute" )
		.css( "left", "-9999px" )
		.appendTo( $( "body:first" ) );

	var objFrame = window.frames[ strFrameName ];
	var objDoc = objFrame.document;

	var jStyleDiv = $( "<div>" ).append(
		$( "style" ).clone()
	);

	objDoc.open();
	objDoc.write( "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">" );
	objDoc.write( "<html>" );
	objDoc.write( "<head>" );
	objDoc.write( '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">' );
	objDoc.write( "<title>" );
	//objDoc.write( document.title );
    objDoc.write( docTitle );
    objDoc.write( "</title>" );
    objDoc.write( css );
	objDoc.write( "</head>" );
    objDoc.write( "<body>" );
    objDoc.write( jStyleDiv.html() );
	objDoc.write( this.html() );
	objDoc.write( "</body>" );
	objDoc.write( "</html>" );
	objDoc.close();

	// Print the document.
	//objFrame.focus();
	//objFrame.print();

	// Have the frame remove itself in about a minute so that
	// we don't build up too many of these frames.

	setTimeout(
		function(){
			jFrame.remove();
		},
		(60 * 1000)
	);

    return objDoc;

};
