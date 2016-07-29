<?php

ini_set( 'default_charset', 'UTF-8' );	// יאט
ini_set( 'display_errors', 'On' );		// php-custom.ini (Gandi)
ini_set( 'error_reporting', '-1' );		// 81 (Kreativmedia), 22519 (Gandi)
ini_set( 'memory_limit', '128M' );		// max 128M (Kreativmedia & Gandi)
ini_set( 'max_execution_time', 10 );	// 60s (Kreativmedia), 180s (Gandi)
ini_set( 'date.timezone', 'Europe/Zurich' ); // Europe/Paris

include( $_SERVER['DOCUMENT_ROOT'].'/includes/commons5.php' );
include( $_SERVER['DOCUMENT_ROOT'].'/Parsedown.php' );

?>
<?php

echo( file_get_contents( STR_PROTOCOL.SERVER_NAME.STR_PORT.'/github-markdown-parser.php?return=begin&title='.SCRIPT_FILE ) );

?>

<input type="file" id="markdown-filename" style="width:50%;" /><br />

<div id="markdown-display"></div>

<script>

function markdown_display(html)
{
	var element = document.getElementById('markdown-display');
	element.innerHTML = html;
}

function markdown_parse_display(title, markdown)
{
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function()
	{
		if (xhttp.readyState == 4 && xhttp.status == 200)
		{
				markdown_display(xhttp.responseText);
		}
	};

 	xhttp.open('POST', 'github-markdown-parser.php' + '?' + ('return=content') + '&' + ('title='+urlencode(title)), true);

	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.send('markdown='+urlencode(markdown));
}

function markdown_read_parse_display(e)
{
	var file = e.target.files[0];

	if (!file) return;

	var filename = file.name;

	var reader = new FileReader();
	reader.onload = function(e) {
		var markdown = e.target.result;
		markdown_parse_display(filename, markdown);
	};

	reader.readAsText(file);
}

document.getElementById('markdown-filename')
	.addEventListener('change', markdown_read_parse_display, false);

</script>

<?php

echo( file_get_contents( STR_PROTOCOL.SERVER_NAME.STR_PORT.'/github-markdown-parser.php?return=end' ) );

?>
