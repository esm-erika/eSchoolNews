<?php /*Template Name: Zmag Embed*/ ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<html>
<head>
	<title><?php the_title(); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" media="screen" rel="stylesheet" href="http://eschoolnews.com/css/colorbox.css" />
	<!--[if IE]>
	<link type="text/css" media="screen" rel="stylesheet" href="colorbox-ie.css" title="example" />
	<![endif]-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://eschoolnews.com/js/jquery.colorbox.js"></script>
	<script src="http://viewer.zmags.com/js/viewer.js" type="text/javascript"></script>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">

  <div id='viewerDiv'></div>

<script type='text/javascript'>

    /**
     * Default ID of publication to see.
     * @final
     */
    var defaultPublicationID = '<?php echo get_post_meta($post->ID, 'pubid', true) ?>';

    /**
     * Default page number to show initially.
     * @final
     */
    var defaultPageNumber = 1;

    /**
     * Function to retrieve a potential query parameter from an URL.
     *
     * @param {String} name    Name of parameter to get value for.
     * @return Query parameter value for a given name.
     */
    function getQueryParameter(name) {
        var queryParameters = document.location.search;
        var returnValue = '';

        do { //This loop is made to catch all instances of any get variable.
            var keyIndex = queryParameters.indexOf(name + '=');
            if (keyIndex != -1) {
                queryParameters = queryParameters.substr(keyIndex + name.length + 1, queryParameters.length - keyIndex);
                var valueSeparatorPosition = queryParameters.indexOf('&');
                if (valueSeparatorPosition == -1) {
                    value = queryParameters;
                } else {
                    var value = queryParameters.substr(0, valueSeparatorPosition);
                }
                if (value == '' || returnValue == '') {
                    returnValue += value;
                }
                else {
                    returnValue += ', ' + value;
                }
            }

        }
        while (keyIndex != -1);

        //Restores all the blank spaces.
        var space = returnValue.indexOf('+');
        while (space != -1) {
            returnValue = returnValue.substr(0, space) + ' ' +
                    returnValue.substr(space + 1, returnValue.length);
            space = returnValue.indexOf('+');
        }
        return returnValue;
    }

    /**
     * Function to retrieve a potential query parameter from an URL and if not present use default value.
     *
     * @param {String} name    Name of parameter to get value for.
     * @param {String} defaultValue Default value to return if name value could not be returned.
     * @return Query parameter value for a given query parameter or default value provided in case query parameter could not be found.
     */
    function getParameterValue(name, defaultValue) {
        var parameterValue = getQueryParameter(name);
        if (parameterValue) {
            return parameterValue;
        } else {
            return defaultValue;
        }
    }

    var initialPublicationID = getParameterValue('id', defaultPublicationID);
    var pageNumber = getParameterValue('pagenumber', defaultPageNumber);

    var viewer = new ZMAGS.ui.Viewer();
    viewer.setPublicationID(initialPublicationID);    //identifier of publication
    viewer.setParentElementID('viewerDiv'); // element to insert Publication into
    viewer.setWindowMode('transparent');
	// Add custom link event handler
	viewer.addEventListener(ZMAGS.ui.Viewer.CUSTOM_LINK_CLICK, "CustomLinkHandler", self);
	viewer.setWindowMode("opaque");

    viewer.show();

    viewer.onpublicationopen = function(event) {
        setTimeout('viewer.gotoPage(pageNumber)', '700' );
	}	
		function CustomLinkHandler(event) {

	//Loop through custom link variables
	  for (p in event.data) {
		  if (p == "url") {
			  var url = event.data[p];
		  } else if (p == "width"){
			  var width = event.data[p];
		  } else if (p == "height"){
			  var height = event.data[p];
		  }
	  }
	  // Open Javascript window function
	  openwin(url,width,height);
	}
		
	// Javascript window.open Function
	function openwin(url,width,height) {
		$.fn.colorbox({href:url, width:width, height:height, opacity:0.5, open:true, iframe:true}); 
	}

</script>
<!-- Viewer -->
</body>
</html>

<?php endwhile; ?>