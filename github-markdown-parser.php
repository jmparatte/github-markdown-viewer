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

$now = date(DATE_MYSQL);

//------------------------------------------------------------------------------

headers_set( ['NO_CACHE', 'ALLOW_ORIGIN_ALL', 'TEXT_HTML'], true );

//------------------------------------------------------------------------------

$urlmd = ain (
	$_GET, 'urlmd', ain (
		$_POST, 'urlmd', NULL
	)
);

$return = fain (
	'strtolower', $_GET, 'return', fain (
		'strtolower', $_POST, 'return', NULL
	)
);

if (!is_null($urlmd)) {
	$title = basename($urlmd);
	$markdown = file_get_contents($urlmd);
}
else {

	$title = ain (
		$_GET, 'title', ain(
			$_POST, 'title', NULL
		)
	);

	$markdown = ain (
		$_GET, 'markdown', ain(
			$_POST, 'markdown', NULL
		)
	);

	if (is_null($title) && is_null($markdown)) {
		$title = 'README.md';
		$markdown = load($title);
	}
}

//------------------------------------------------------------------------------

$Parsedown = new Parsedown();

//------------------------------------------------------------------------------

$content = "";

if (is_null($return) || in_array($return, ['all', 'begin']))
{

$content .= <<<"HEREDOC"

<!DOCTYPE html>

<html lang="en">
<head>

	<meta charset="utf-8" />

	<title>{$__html( $title )}</title>

	<link type="text/css" rel="stylesheet" href="/includes/commons5.css" />

	<link type="text/css" rel="stylesheet" href="/github-markdown-style-1.css" />
	<link type="text/css" rel="stylesheet" href="/github-markdown-style-2.css" />
	<link type="text/css" rel="stylesheet" href="/github-markdown-style-3.css" />

	<style>
	    .md {
	        box-sizing: border-box;
	        min-width: 200px;
	        max-width: 980px;
	        margin: 10px auto 0px auto;
	        padding: 0px;
	    }
	    .markdown-body {
	        box-sizing: border-box;
	        min-width: 200px;
	        max-width: 980px;
	        margin: 0px auto 10px auto;
	        padding: 0px;
	    }
	</style>

	<script type="text/javascript" src="/includes/commons5.js"></script>

</head>

<body>

HEREDOC;

}

if (is_null($return) || in_array($return, ['all', 'content']))
{

$content .= <<<"HEREDOC"

<div id="readme" class="readme boxed-group clearfix announce instapaper_body md">
    <h3>
		<svg aria-hidden="true" class="octicon octicon-book" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M3 5h4v1H3V5zm0 3h4V7H3v1zm0 2h4V9H3v1zm11-5h-4v1h4V5zm0 2h-4v1h4V7zm0 2h-4v1h4V9zm2-6v9c0 .55-.45 1-1 1H9.5l-1 1-1-1H2c-.55 0-1-.45-1-1V3c0-.55.45-1 1-1h5.5l1 1 1-1H15c.55 0 1 .45 1 1zm-8 .5L7.5 3H2v9h6V3.5zm7-.5H9.5l-.5.5V12h6V3z"></path></svg>
		{$__html( $title )}
    </h3>

	<article class="markdown-body entry-content" itemprop="text">
		{$__text( $Parsedown->text( $markdown ) )}
	</article>
</div>

HEREDOC;

}

if (is_null($return) || in_array($return, ['all', 'end']))
{

$content .= <<<"HEREDOC"

</body>
</html>

HEREDOC;

}

//------------------------------------------------------------------------------

exit_content( $content );

?>
