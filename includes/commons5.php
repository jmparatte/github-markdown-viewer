<?php


//==============================================================================


/*	Magic constants
	===============
	http://www.php.net/manual/en/language.constants.predefined.php

	__LINE__		The current line number of the file.
	__FILE__		The full path and filename of the file. If used inside an include, the name of the included file is returned. Since PHP 4.0.2, __FILE__ always contains an absolute path with symlinks resolved whereas in older versions it contained relative path under some circumstances.
	__DIR__	 		The directory of the file. If used inside an include, the directory of the included file is returned. This is equivalent to dirname(__FILE__). This directory name does not have a trailing slash unless it is the root directory. (Added in PHP 5.3.0.)
	__FUNCTION__	The function name. (Added in PHP 4.3.0) As of PHP 5 this constant returns the function name as it was declared (case-sensitive). In PHP 4 its value is always lowercased.
	__CLASS__		The class name. (Added in PHP 4.3.0) As of PHP 5 this constant returns the class name as it was declared (case-sensitive). In PHP 4 its value is always lowercased. The class name includes the namespace it was declared in (e.g. Foo\Bar). Note that as of PHP 5.4 __CLASS__ works also in traits. When used in a trait method, __CLASS__ is the name of the class the trait is used in.
	__TRAIT__		The trait name. (Added in PHP 5.4.0) As of PHP 5.4 this constant returns the trait as it was declared (case-sensitive). The trait name includes the namespace it was declared in (e.g. Foo\Bar).
	__METHOD__		The class method name. (Added in PHP 5.0.0) The method name is returned as it was declared (case-sensitive).
	__NAMESPACE__	The name of the current namespace (case-sensitive). This constant is defined in compile-time (Added in PHP 5.3.0).

	*/

/*	$_SERVER
	========
	http://php.net/manual/en/reserved.variables.server.php

	$_SERVER is an array containing information such as headers, paths, and script locations. The entries in this array are created by the web server. There is no guarantee that every web server will provide any of these; servers may omit some, or provide others not listed here. That said, a large number of these variables are accounted for in the » CGI/1.1 specification, so you should be able to expect those.

	You may or may not find any of the following elements in $_SERVER. Note that few, if any, of these will be available (or indeed have any meaning) if running PHP on the command line.

	'PHP_SELF'		The filename of the currently executing script, relative to the document root. For instance, $_SERVER['PHP_SELF'] in a script at the address http://example.com/test.php/foo.bar would be /test.php/foo.bar. The __FILE__ constant contains the full path and filename of the current (i.e. included) file. If PHP is running as a command-line processor this variable contains the script name since PHP 4.3.0. Previously it was not available.
	'argv'			Array of arguments passed to the script. When the script is run on the command line, this gives C-style access to the command line parameters. When called via the GET method, this will contain the query string.
	'argc'			Contains the number of command line parameters passed to the script (if run on the command line).
	'GATEWAY_INTERFACE' What revision of the CGI specification the server is using; i.e. 'CGI/1.1'.
	'SERVER_ADDR'	The IP address of the server under which the current script is executing.
	'SERVER_NAME'	The name of the server host under which the current script is executing. If the script is running on a virtual host, this will be the value defined for that virtual host.
	'SERVER_SOFTWARE' Server identification string, given in the headers when responding to requests.
	'SERVER_PROTOCOL' Name and revision of the information protocol via which the page was requested; i.e. 'HTTP/1.0';
	'REQUEST_METHOD' Which request method was used to access the page; i.e. 'GET', 'HEAD', 'POST', 'PUT'.
					Note: PHP script is terminated after sending headers (it means after producing any output without output buffering) if the request method was HEAD.
	'REQUEST_TIME'	The timestamp of the start of the request. Available since PHP 5.1.0.
	'REQUEST_TIME_FLOAT' The timestamp of the start of the request, with microsecond precision. Available since PHP 5.4.0.
	'QUERY_STRING'	The query string, if any, via which the page was accessed.
	'DOCUMENT_ROOT'	The document root directory under which the current script is executing, as defined in the server's configuration file.
	'HTTP_ACCEPT'	Contents of the Accept: header from the current request, if there is one.
	'HTTP_ACCEPT_CHARSET' Contents of the Accept-Charset: header from the current request, if there is one. Example: 'iso-8859-1,*,utf-8'.
	'HTTP_ACCEPT_ENCODING' Contents of the Accept-Encoding: header from the current request, if there is one. Example: 'gzip'.
	'HTTP_ACCEPT_LANGUAGE' Contents of the Accept-Language: header from the current request, if there is one. Example: 'en'.
	'HTTP_CONNECTION' Contents of the Connection: header from the current request, if there is one. Example: 'Keep-Alive'.
	'HTTP_HOST'		Contents of the Host: header from the current request, if there is one.
	'HTTP_REFERER'	The address of the page (if any) which referred the user agent to the current page. This is set by the user agent. Not all user agents will set this, and some provide the ability to modify HTTP_REFERER as a feature. In short, it cannot really be trusted.
	'HTTP_USER_AGENT' Contents of the User-Agent: header from the current request, if there is one. This is a string denoting the user agent being which is accessing the page. A typical example is: Mozilla/4.5 [en] (X11; U; Linux 2.2.9 i586). Among other things, you can use this value with get_browser() to tailor your page's output to the capabilities of the user agent.
	'HTTPS'			Set to a non-empty value if the script was queried through the HTTPS protocol.
					Note: Note that when using ISAPI with IIS, the value will be off if the request was not made through the HTTPS protocol.
	'REMOTE_ADDR'	The IP address from which the user is viewing the current page.
	'REMOTE_HOST'	The Host name from which the user is viewing the current page. The reverse dns lookup is based off the REMOTE_ADDR of the user.
					Note: Your web server must be configured to create this variable. For example in Apache you'll need HostnameLookups On inside httpd.conf for it to exist. See also gethostbyaddr().
	'REMOTE_PORT'	The port being used on the user's machine to communicate with the web server.
	'REMOTE_USER'	The authenticated user.
	'REDIRECT_REMOTE_USER' The authenticated user if the request is internally redirected.
	'SCRIPT_FILENAME' The absolute pathname of the currently executing script.
					Note: If a script is executed with the CLI, as a relative path, such as file.php or ../file.php, $_SERVER['SCRIPT_FILENAME'] will contain the relative path specified by the user.
	'SERVER_ADMIN'	The value given to the SERVER_ADMIN (for Apache) directive in the web server configuration file. If the script is running on a virtual host, this will be the value defined for that virtual host.
	'SERVER_PORT'	The port on the server machine being used by the web server for communication. For default setups, this will be '80'; using SSL, for instance, will change this to whatever your defined secure HTTP port is.
	'SERVER_SIGNATURE' String containing the server version and virtual host name which are added to server-generated pages, if enabled.
	'PATH_TRANSLATED' Filesystem- (not document root-) based path to the current script, after the server has done any virtual-to-real mapping.
					Note: As of PHP 4.3.2, PATH_TRANSLATED is no longer set implicitly under the Apache 2 SAPI in contrast to the situation in Apache 1, where it's set to the same value as the SCRIPT_FILENAME server variable when it's not populated by Apache. This change was made to comply with the CGI specification that PATH_TRANSLATED should only exist if PATH_INFO is defined. Apache 2 users may use AcceptPathInfo = On inside httpd.conf to define PATH_INFO.
	'SCRIPT_NAME'	Contains the current script's path. This is useful for pages which need to point to themselves. The __FILE__ constant contains the full path and filename of the current (i.e. included) file.
	'REQUEST_URI'	The URI which was given in order to access this page; for instance, '/index.html'.
	'PHP_AUTH_DIGEST' When doing Digest HTTP authentication this variable is set to the 'Authorization' header sent by the client (which you should then use to make the appropriate validation).
	'PHP_AUTH_USER'	When doing HTTP authentication this variable is set to the username provided by the user.
	'PHP_AUTH_PW'	When doing HTTP authentication this variable is set to the password provided by the user.
	'AUTH_TYPE'		When doing HTTP authenticated this variable is set to the authentication type.
	'PATH_INFO'		Contains any client-provided pathname information trailing the actual script filename but preceding the query string, if available. For instance, if the current script was accessed via the URL http://www.example.com/php/path_info.php/some/stuff?foo=bar, then $_SERVER['PATH_INFO'] would contain /some/stuff.
	'ORIG_PATH_INFO' Original version of 'PATH_INFO' before processed by PHP.

	*/


//==============================================================================


//if( PHP_VERSION<'5.3.0' ) define( '__DIR__', dirname(__FILE__) );
//if( PHP_VERSION<'5.3.0' ) ini_set( 'date.timezone', 'Europe/Zurich' );


//==============================================================================


define( 'IS_MSIE',		(isset($_SERVER['HTTP_USER_AGENT'])&&(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')!==false)) );
define( 'DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] );
define( 'STR_PROTOCOL',	'http'.(isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on'?'s':'').'://' );
define( 'SERVER_NAME',	$_SERVER['SERVER_NAME'] );
define( 'STR_PORT',		($_SERVER['SERVER_PORT']!=(isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on'?'443':'80')?':'.$_SERVER['SERVER_PORT']:'') );
define( 'SCRIPT_NAME',	$_SERVER['SCRIPT_NAME'] );
define( 'SCRIPT_PATH',	substr(SCRIPT_NAME,0,strlen(SCRIPT_NAME)-strlen(basename(SCRIPT_NAME))) );
define( 'SCRIPT_FILE',	basename(SCRIPT_NAME) );
define( 'SCRIPT_FILE1',	(SCRIPT_FILE=='index.php'?'':SCRIPT_FILE) );
define( 'SCRIPT_ONLY',	basename(SCRIPT_NAME,'.php') );
define( 'PATH_INFO',	(isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'') );
define( 'QUERY_STRING',	$_SERVER['QUERY_STRING'] );
define( 'SEARCH_LINE',	(strlen($_SERVER['QUERY_STRING'])>0?'?':'').$_SERVER['QUERY_STRING'] );
define( 'SCRIPT_HREF',	STR_PROTOCOL.SERVER_NAME.STR_PORT.SCRIPT_PATH.(SCRIPT_FILE=='index.php'?'':SCRIPT_FILE).PATH_INFO.SEARCH_LINE );
define( 'HTTP_REFERER',	(isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'') );
//define( 'LOCALE_DATE',	'd.m.Y H:i:s' ); //see below
// http://php.net/manual/en/dir.constants.php
//define( 'OS_DIRSEP',	(PHP_OS=='WINNT'?'\\':'/') );
//define( 'OS_PATHSEP',	(PHP_OS=='WINNT'?';':':') );
define( 'OS_DIRSEP',	DIRECTORY_SEPARATOR );
define( 'OS_PATHSEP',	PATH_SEPARATOR );

//------------------------------------------------------------------------------

/*
$is_msie = IS_MSIE;
$document_root = DOCUMENT_ROOT;
$str_protocol = STR_PROTOCOL;
$server_name = SERVER_NAME;
$str_port = STR_PORT;
$script_name = SCRIPT_NAME;
$script_path = SCRIPT_PATH;
$script_file = SCRIPT_FILE;
$script_file1 = SCRIPT_FILE1;
$script_only = SCRIPT_ONLY;
$path_info = PATH_INFO;
$query_string = QUERY_STRING;
$search_line = SEARCH_LINE;
$script_href = SCRIPT_HREF;
$http_referer = HTTP_REFERER;
$os_dirsep = OS_DIRSEP;
$os_pathsep = OS_PATHSEP;
*/

//------------------------------------------------------------------------------

define( '_UNDEFINED_',	'(undefined)' );
define( '_NULL_',		'(NULL)' );
define( '_NAN_',		'(NaN)' );
define( '_EMPTY_',		'' );

//------------------------------------------------------------------------------

define( 'BLACK',	'#000000' );
define( 'RED',		'#ff0000' );
define( 'GREEN',	'#008000' );
define( 'LIME',		'#00ff00' );
define( 'BLUE',		'#0000ff' );
define( 'GRAY50',	'#777777' );
define( 'GRAY',		'#808080' );
define( 'GREY',		'#808080' );
define( 'WHITE',	'#ffffff' );
define( 'CYAN',		'#00ffff' );
define( 'MAGENTA',	'#ff00ff' );
define( 'YELLOW',	'#ffff00' );

//------------------------------------------------------------------------------

define( 'NUL',	"\0" );		// 00	Null character
define( 'CC',	"\3" );		// 03	Ctrl-C
define( 'CTLC',	"\3" );		// 03	Ctrl-C
define( 'CTRLC',"\3" );		// 03	Ctrl-C
define( 'BEL',	"\7" );		// 07	Bell
define( 'BSP',	"\8" );		// 08	Back-Space character
define( 'HT',	"\t" );		// 09	Horizontal Tabulation
define( 'LF',	"\n" );		// 0A	Line-Feed
define( 'CR',	"\r" );		// 0D	Carriage-Return
define( 'CZ',	"\x1A" );	// 1A	Ctrl-Z
define( 'CTLZ',	"\x1A" );	// 1A	Ctrl-Z
define( 'CTRLZ',"\x1A" );	// 1A	Ctrl-Z
define( 'ESC',	"\x1B" );	// 1B	Escape character
define( 'SP',	' ' );		// 20	Space character
define( 'SPC',	' ' );		// 20	Space character
define( 'DQT',	'"' );		// 22	Double-Quote character
define( 'SQT',	"'" );		// 27	Single-Quote character
define( 'BQT',	'`' );		// 60	Back-Quote character
define( 'DEL',	"\x7F" );	// 7F	Delete character
define( 'NB',	"\xA0" );	// A0	  ANSI Non-Breakable Space character
define( 'PC',	"\xB6" );	// B6	¶ ANSI Pied de mouche
define( 'MD',	"\xB7" );	// B7	· ANSI Point médian
// http://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.double :
// Given that PHP does not dictate a specific encoding for strings, one might wonder how string literals are encoded. For instance, is the string "á" equivalent to "\xE1" (ISO-8859-1), "\xC3\xA1" (UTF-8, C form), "\x61\xCC\x81" (UTF-8, D form) or any other possible representation? The answer is that string will be encoded in whatever fashion it is encoded in the script file. Thus, if the script is written in ISO-8859-1, the string will be encoded in ISO-8859-1 and so on. However, this does not apply if Zend Multibyte is enabled; in that case, the script may be written in an arbitrary encoding (which is explicity declared or is detected) and then converted to a certain internal encoding, which is then the encoding that will be used for the string literals. Note that there are some constraints on the encoding of the script (or on the internal encoding, should Zend Multibyte be enabled) – this almost always means that this encoding should be a compatible superset of ASCII, such as UTF-8 or ISO-8859-1. Note, however, that state-dependent encodings where the same byte values can be used in initial and non-initial shift states may be problematic.
// http://php.net/manual/en/regexp.reference.escape.php :
// After "\x", up to two hexadecimal digits are read (letters can be in upper or lower case). In UTF-8 mode, "\x{...}" is allowed, where the contents of the braces is a string of hexadecimal digits. It is interpreted as a UTF-8 character whose code number is the given hexadecimal number. The original hexadecimal escape sequence, \xhh, matches a two-byte UTF-8 character if the value is greater than 127.

define( 'NL',	"\n" );		// Unix/Linux New-Line string
define( 'NewLine',"\n" );	// Unix/Linux New-Line string

define( 'NBSP',	'&nbsp;' );	// HTML Non-Breakable space character
define( 'PILCROW','&para;'); // B6	¶ ANSI Pied de mouche
define( 'MIDDOT','&middot;'); // B7	· ANSI Point médian
define( 'BR',	'<br />' );	// HTML Break line

define( 'DOCTYPE_HTML5', '<!DOCTYPE html>' ); // HTML5
define( 'DOCTYPE_XML', '<'.'?xml version="1.0" encoding="UTF-8"?'.'>' ); // XML

//------------------------------------------------------------------------------

define( 'STREAM_TYPE_CONTENT', 'application/octet-stream' );
define( 'XLS_TYPE_CONTENT', 'application/vnd.ms-excel' );
define( 'XLSX_TYPE_CONTENT', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );

//------------------------------------------------------------------------------

//http://ch1.php.net/manual/fr/class.datetime.php#datetime.constants.types

define( 'LOCALE_DATE', 'd.m.Y H:i:s' ); // pour le moment, est toujours définie !
define( 'DATE_EXCEL', 'Y-m-d H:i:s' ); // Excel DATETIME
define( 'DATE_MYSQL', 'Y-m-d H:i:s' ); // MySQL DATETIME


//==============================================================================


function &r($value){return $value;} // return reference of value

//------------------------------------------------------------------------------

function ne(&$var,$e=''){return $var === NULL ? $e : $var;}
function en(&$var,$n=NULL){return $var === '' ? $n : $var;}

function nz(&$var,$z=0){return $var === NULL ? $z : $var;}
function zn(&$var,$n=NULL){return $var === 0 ? $n : $var;}

//------------------------------------------------------------------------------

function ain(&$var,$i,$n=NULL){return isset($var[$i]) ? $var[$i] : $n;}
function aiin(&$var,$i,$j,$n=NULL){return isset($var[$i][$j]) ? $var[$i][$j] : $n;}
function aiiin(&$var,$i,$j,$k,$n=NULL){return isset($var[$i][$j][$k]) ? $var[$i][$j][$k] : $n;}
function aiiiin(&$var,$i,$j,$k,$l,$n=NULL){return isset($var[$i][$j][$k][$l]) ? $var[$i][$j][$k][$l] : $n;}

function aie(&$var,$i,$e=''){return isset($var[$i]) ? $var[$i] : $e;}
function aiie(&$var,$i,$j,$e=''){return isset($var[$i][$j]) ? $var[$i][$j] : $e;}
function aiiie(&$var,$i,$j,$k,$e=''){return isset($var[$i][$j][$k]) ? $var[$i][$j][$k] : $e;}
function aiiiie(&$var,$i,$j,$k,$l,$e=''){return isset($var[$i][$j][$k][$l]) ? $var[$i][$j][$k][$l] : $e;}

function aiz(&$var,$i,$z=0){return isset($var[$i]) ? $var[$i] : $z;}
function aiiz(&$var,$i,$j,$z=0){return isset($var[$i][$j]) ? $var[$i][$j] : $z;}
function aiiiz(&$var,$i,$j,$k,$n=0){return isset($var[$i][$j][$k]) ? $var[$i][$j][$k] : $n;}
function aiiiiz(&$var,$i,$j,$k,$l,$z=0){return isset($var[$i][$j][$k][$l]) ? $var[$i][$j][$k][$l] : $z;}

//	Example of a variable retrieved by $_POST or a cookie:
//	$invoicetotal = ain( $_POST, 'invoicetotal', geturlcookie( 'invoicetotal' ) );

//------------------------------------------------------------------------------

function fain($function,&$var,$i,$n=NULL){return isset($var[$i]) ? $function($var[$i]) : $n;}


//==============================================================================


function load($filename){return file_get_contents($filename);}
function save($filename,$contents){file_put_contents($filename,$contents); if((fileperms($filename)&0777)!=0666) chmod($filename,0666);}

//function ve(&$var){return var_export($var, TRUE);}
function ve(&$var){$ve=var_export($var, TRUE); $ve=preg_replace_callback('/(\n)((  )+)/',create_function('$m','return $m[1].str_repeat("\t",strlen($m[2])/2);'),$ve); return $ve;}
function ve_eval($ve){return eval('return '.$ve.';');}
function ve_file($varname,$pathname='',$extname='.ve.php'){return $pathname.$varname.$extname;}
function ve_test($varname,$pathname='',$extname='.ve.php'){return file_exists($pathname.$varname.$extname);}
//function ve_load(&$var,$varname,$pathname='',$extname='.ve.php'){$var = eval('return '.file_get_contents($pathname.$varname.$extname).';');}
function ve_load(&$var,$varname,$pathname='',$extname='.ve.php'){$var = eval('return '.load($pathname.$varname.$extname).';');}
//function ve_save(&$var,$varname,$pathname='',$extname='.ve.php'){file_put_contents($pathname.$varname.$extname,ve($var)); if((fileperms($pathname.$varname.$extname)&0777)!=0666) chmod($pathname.$varname.$extname,0666);}
function ve_save(&$var,$varname,$pathname='',$extname='.ve.php'){save($pathname.$varname.$extname,ve($var));}
//function ve_comp(&$var,$varname,$pathname='',$extname='.ve.php'){return ve($var)==file_get_contents($pathname.$varname.$extname);}
function ve_comp(&$var,$varname,$pathname='',$extname='.ve.php'){return ve($var)==load($pathname.$varname.$extname);}


//==============================================================================


function locale_date( $value ) {
	return date( LOCALE_DATE, $value );
}

function http_date( $value ) { // RFC 1123
	return gmdate( 'D, d M Y H:i:s \G\M\T', $value );
}

function microtime_us() { // PHP mixed microtime ([ bool $get_as_float = false ] ) // microtime(true)*1000000
	return intval( round( microtime( true ) * 1000000 ) );
}


//==============================================================================


// PHP string utf8_decode ( string $data )
// PHP string utf8_encode ( string $data )

function utf8_to_char( $utf8 ) {

	$text = "";
	$i=0;
	$c1=$c2=$c3=0;
	while( $i < strlen($utf8) ) {

		$c1 = ord(substr($utf8,$i++,1));
		if ($c1<128)
		{
			$text .= chr($c1);
		}
		else
		if ($c1<192)
		{
			$text .= chr($c1);
		}
		else
		if ($c1<224)
		{
			$c2 = ord(substr($utf8,$i++,1));
			$text .= chr((($c1&31)<<6)|($c2&63));
		}
		else
		{
			$c2 = ord(substr($utf8,$i++,1));
			$c3 = ord(substr($utf8,$i++,1));
			$text .= chr((($c1&15)<<12) | (($c2&63)<<6) | ($c3&63));
		}
	}
	return $text;
}

function char_to_utf8( $text ) {

//	$text = $text.replace(/\r\$n/g,"\$n");
	$utf8 = "";
	for( $n=0; $n<strlen($text); $n++ ) {

		$c = ord(substr($text,$n,1));

		if ($c<128)
		{
			$utf8 .= chr($c);
		}
		else
		if ($c<2048)
		{
			$utf8 .= chr(($c>>6)|192);
			$utf8 .= chr(($c&63)|128);
		}
		else
		{
			$utf8 .= chr(($c>>12)|224);
			$utf8 .= chr((($c>>6)&63)|128);
			$utf8 .= chr(($c&63)|128);
		};
	}
//echo('utf8:26:'+$text+','+$utf8);
	return $utf8;
}

//------------------------------------------------------------------------------

function cookie_escape( $string ) {

	$string = str_replace( '%', '%25', $string );

	$string = str_replace( "\t", '%09', $string );
	$string = str_replace( "\n", '%0a', $string );
	$string = str_replace( "\v", '%0b', $string );
	$string = str_replace( "\f", '%0c', $string );
	$string = str_replace( "\r", '%0d', $string );

	$string = str_replace( '+', '%2b', $string );
	$string = str_replace( ',', '%2c', $string );
	$string = str_replace( ';', '%3b', $string );
	$string = str_replace( '=', '%3d', $string );

	$string = str_replace( ' ', '+', $string );

	return $string;
}

function cookie_unescape( $string ) {

	$string = str_replace( '+', ' ', $string );

	$string = str_replace( '%3d', '=', $string );
	$string = str_replace( '%3b', ';', $string );
	$string = str_replace( '%2c', ',', $string );
	$string = str_replace( '%2b', '+', $string );

	$string = str_replace( '%0d', "\r", $string );
	$string = str_replace( '%0c', "\f", $string );
	$string = str_replace( '%0b', "\v", $string );
	$string = str_replace( '%0a', "\n", $string );
	$string = str_replace( '%09', "\t", $string );

	$string = str_replace( '%25', '%', $string );

	return $string;
}

//------------------------------------------------------------------------------

//PHP bool setrawcookie ( string $name [, string $value [, int $expire = 0 [, string $path [, string $domain [, bool $secure = false [, bool $httponly = false ]]]]]] )

function getrawcookie( $name ) {

//	return ain( $_COOKIE, $name );
	$value = ain( $_COOKIE, $name );
	if( $value == '_EMPTY_' ) $value = '';
	return $value;
}

function delcookie( $name ) {

	setrawcookie( $name, null, 0 );
}

//------------------------------------------------------------------------------

function seturlcookie( $name, $value, $expire, $path, $domain, $secure ) {

//	setrawcookie( $name, cookie_escape( $value ), $expire, $path, $domain, $secure );
//	setrawcookie( $name, cookie_escape( char_to_utf8( $value ) ), $expire, $path, $domain, $secure );
	setrawcookie( $name, urlencode( $value ), $expire, $path, $domain, $secure );
}

function geturlcookie( $name ) {

//	return cookie_unescape( ne( getrawcookie($name) ) );
//	return utf8_to_char( cookie_unescape( ne( getrawcookie($name) ) ) );
	return urldecode( getrawcookie($name) );
}


//==============================================================================


function h1() {
	$html='<h1>';
	for($i=0;$i<func_num_args();$i++)$html.=func_get_arg($i);
	$html.='</h1>'.NL;
	return $html;}

function h2() {
	$html='<h2>';
	for($i=0;$i<func_num_args();$i++)$html.=func_get_arg($i);
	$html.='</h2>'.NL;
	return $html;}

function h3() {
	$html='<h3>';
	for($i=0;$i<func_num_args();$i++)$html.=func_get_arg($i);
	$html.='</h3>'.NL;
	return $html;}

function br() {
	$html='';
	for($i=0;$i<func_num_args();$i++)$html.=func_get_arg($i);
	$html.=BR.NL;
	return $html;}

function html_doc( $title, $body ) {
	$html = '';
//	$html .= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/tr/html4/strict.dtd">'.NL;
	$html .= '<!DOCTYPE html>'.NL;
	$html .= '<html>'.NL;
	$html .= '<head>'.NL;
//	$html .= '<META http-equiv="Content-Type" content="text/html; charset=UTF-8">'.NL;
	$html .= '<meta charset="UTF-8">'.NL;
	$html .= '<title>'.htmlspecialchars($title).'</title>'.NL;
//	$html .= '<META http-equiv="X-UA-Compatible" content="IE=7">'.NL;
	$html .= '<style type="text/css">'.NL;
	$html .= '</style>'.NL;
	$html .= '</head>'.NL;
	$html .= '<body bgcolor="#ffffff">'.NL;
	$html .= $body;
	$html .= '</body>'.NL;
	$html .= '</html>'.NL;
	return $html;
}

function table( $html ) {
	return '<table cellpadding="3" cellspacing="0" border="1">'.NL.$html.'</table>'.NL;
}

function tr( $html, $rowspan=NULL ) {
	return '<tr'.($rowspan!==NULL?' rowspan="'.$rowspan.'"':'').'>'.NL.$html.'</tr>'.NL;
}

function td( $html, $colspan=NULL ) {
	return '<td'.($colspan!==NULL?' colspan="'.$colspan.'"':'').'>'.($html!=''?$html:'&nbsp;').'</td>'.NL;
}

function th( $html, $colspan=NULL ) {
	return '<th'.($colspan!==NULL?' colspan="'.$colspan.'"':'').'>'.$html.'</th>'.NL;
}

function html( $text ) {
//	return str_replace( NL, BR.NL, htmlspecialchars($text) ); //htmlentities
//	return preg_replace( '/['.CR.']?['.NL.']/', BR.NL, htmlspecialchars($text) ); //htmlentities
	return preg_replace( '/['.CR.']?['.NL.']/', BR.NL, htmlspecialchars($text, ENT_HTML5, null, true) ); //htmlentities
}

function h1_html( $text ) {
	return h1( html($text) );
}

function h2_html( $text ) {
	return h2( html($text) );
}

function h3_html( $text ) {
	return h3( html($text) );
}

function br_html( $text ) {
	return br( html($text) );
}

function td_html( $text, $colspan=NULL ) {
	return td( html($text), $colspan );
}

function th_html( $text, $colspan=NULL ) {
	return th( html($text), $colspan );
}

function br_html_get( $get ) {
	return br_html( $_GET[$get] );
}

function td_html_get( $get ) {
	return td_html( $_GET[$get] );
}


//==============================================================================


function pre() {
	echo '<pre>';
	for($i=0;$i<func_num_args();$i++)echo func_get_arg($i);
	echo '</pre>',NL;}

function pre1() {
	echo '<pre>';
	for($i=0;$i<func_num_args();$i++)echo($i>0?($i>1?',':':'):''),func_get_arg($i);
	echo '</pre>',NL;}


//==============================================================================


function file_name( $pathname ) {
	$i1 = strrpos($pathname,'/');
	$i2 = strrpos($pathname,'\\');
	return substr($pathname,($i1>$i2?$i1:$i2)+1);
}

function file_read( $filename, $default_content=NULL ) {
	if( file_exists($filename) )
		return file_get_contents($filename);
	else
		return $default_content;
}

function file_time( $filename ) {
	if( file_exists($filename) )
		return filemtime($filename);
	else
		return NULL; //FALSE;
}

function file_locale_date( $filename ) {
	if( file_exists($filename) )
		return locale_date( filemtime($filename) );
	else
		return NULL; //_UNDEFINED_;
}


//==============================================================================


function price_format( $price ) {
	if( isset($price) )
		return number_format( $price, 2, '.', '\'' );
	else
		return NULL; //_UNDEFINED_;
}

function var_text( $var, $indent='' ) {
	$text = '';
	foreach( $var as $key => $value ) {
		switch( (string) $key ) {
		case 'password':
			$text .= $indent . $key . ': ' . str_repeat('*',strlen($value)). NL;
			break;
		case 'date':
		case 'time':
		case 'microtime':
		case 'created':
		case 'modified':
		case 'accessed':
		case 'updated':
		case 'packed':
		case 'delivered':
		case 'last_modified':
		case 'last_accessed':
		case 'last_updated':
			switch( gettype($value) ) {
			case 'string':
				if( strlen($value)==25 && substr($value,4,1)=='-' && substr($value,7,1)=='-' && substr($value,10,1)=='T' ) // 2011-09-28T02:22:13+02:00
					$text .= $indent . $key . ': ' . locale_date( strtotime($value) ) . NL;
				else
				if( strlen($value) == 8 && is_numeric($value) ) // yyyymmdd
					$text .= $indent . $key . ': ' . (substr($value,6,2).'.'.substr($value,4,2).'.'.substr($value,0,4)) . NL;
				else
					$text .= $indent . $key . ': ' . $value . NL;
				break;
			case 'integer': // 0..2147483647 => 01.01.1970 .. 19.01.2038 hh:mm:ss
				$text .= $indent . $key . ': ' . locale_date($value) . NL;
				break;
			case 'double':
				$text .= $indent . $key . ': ' . locale_date( floor($value) ) . substr( number_format($value-floor($value), 6, '.', '\''), 1 ) . NL;
				break;
			case 'NULL':
				$text .= $indent . $key . ': ' . _UNDEFINED_ . NL;
				break;
			default:
				$text .= $indent . $key . ': ' . $value . NL;
			}
			break;
		default:
			switch( gettype($value) ) {
			case 'array':
				if( count($value) )
					$text .= var_text ($value, $indent . $key . '.');
				else
					$text .= $indent . $key . ': ' . _UNDEFINED_ . NL;
				break;
			case 'boolean':
				$text .= $indent . $key . ': ' . ($value ? 'true' : 'false') . NL;
				break;
			case 'string':
				if( strlen($value)==25 && substr($value,4,1)=='-' && substr($value,7,1)=='-' && substr($value,10,1)=='T' ) // 2011-09-28T02:22:13+02:00
					$text .= $indent . $key . ': ' . locale_date(strtotime($value)) . NL;
				else
					$text .= $indent . $key . ': ' . $value . NL;
				break;
			case 'NULL':
				$text .= $indent . $key . ': ' . _UNDEFINED_ . NL;
				break;
			default:
				$text .= $indent . $key . ': ' . $value . NL;
			}
		}
	}
	return $text;
}


//==============================================================================


function session_start_timeout( $timeout ) {

	//ini_set('session.gc_probability', 1);
	//ini_set('session.gc_divisor', 1);
	//ini_set('session.gc_maxlifetime', 60);
	//ini_set('session.cookie_lifetime', 60);

	//session_cache_expire(1);
	//session_set_cookie_params(1*60,'/',SERVER_NAME,false,false);

	$time = time();

	session_start();

	$session_start_time = $_SESSION['session_start_time'] = ain( $_SESSION, 'session_start_time', $time );

	if( $session_start_time == $time ) return 0; //start

	if( ($session_start_time + $timeout) > $time ) {

		$session_start_time = $_SESSION['session_start_time'] = $time;

		return -1; //refresh

	} else {

		session_destroy();
		session_start();

		$session_start_time = $_SESSION['session_start_time'] = $time;

		return 1; //restart
	}
}


//==============================================================================


function phpinfo1( $eol=NL, $eol1=NL ) {

	echo( 'href=' . SCRIPT_HREF . $eol );
	echo( 'OS=' . PHP_OS . $eol );
	echo( 'file=' . __FILE__ . $eol );
	echo( 'dir=' . __DIR__ . $eol );
	echo( 'dirsep=' . OS_DIRSEP . $eol );
	echo( 'pathsep=' . OS_PATHSEP . $eol );
	echo( 'include=' . get_include_path() . $eol );
	echo( 'temp=' . sys_get_temp_dir() . $eol );
	echo( 'GET=' . str_replace( NL, $eol1, ve($_GET) ) . $eol );
	echo( 'POST=' . str_replace( NL, $eol1, ve($_POST) ) . $eol );
	echo( 'FILES=' . str_replace( NL, $eol1, ve($_FILES) ) . $eol );
}


//==============================================================================


//if (strlen($path_info) == 0) if ($id != null) $path_info = '/etat.php'; else $path_info = '/accueil.php';

/*

if (SERVER_NAME == 'www.jmpicture.com')
{
	header('Status: 301 Moved Permanently', false, 301);
	header('Location: '.'http://jmpicture.com/'.'?page=accueil');
	exit();
}

if (strlen(SEARCH_LINE) == 0)
{
	header('Status: 301 Moved Permanently', false, 301);
	header('Location: '.$script_href.'?page=accueil');
	exit();
}

if (SEARCH_LINE == '?gallery=/Photos_de_saison/Nouvel_An_2009/')
{
	header('Status: 301 Moved Permanently', false, 301);
	header('Location: '.$script_href.'?gallery=/Photos_de_saison/2009/Nouvel_An/');
	exit();
}

if (SEARCH_LINE == '?page=%E0_propos_de_moi')
{
	header('Status: 301 Moved Permanently', false, 301);
	header('Location: '.$script_href.'?page=a_propos');
	exit();
}

if (SEARCH_LINE == '?h5')
{
	header('Status: 301 Moved Permanently', false, 301);
	header('Location: '.'http://'.SERVER_NAME.'/FPP_iDevices_Contribution/FPP_iDevices_Contribution_101228/example_test.htm');
	exit();
}

*/


//==============================================================================


// http://php.net/manual/fr/mysqli-result.fetch-array.php
// mixed mysqli_result::fetch_array ([ int $resulttype = MYSQLI_BOTH ] )

// http://php.net/manual/fr/mysqli-result.fetch-all.php
// mixed mysqli_result::fetch_all ([ int $resulttype = MYSQLI_NUM ] )

function _mysql_fetch_all( $mysqli_args, $sql, $resulttype = MYSQLI_NUM, $fieldtype_encode_binary = array() ) {

	$mysqli = new mysqli( $mysqli_args['host'], $mysqli_args['user'], $mysqli_args['pwd'], $mysqli_args['db'], $mysqli_args['port'] );

	if( $mysqli->connect_error ) return; //die( 'Erreur de connexion ('.$mysqli->connect_errno.') '.$mysqli->connect_error );

	$mysqli->set_charset( 'utf8' );

	$result = $mysqli->query( $sql );

	$fields = $result->fetch_fields();
	$fieldnames = array();
	$fieldtypes = array();
	while( $field = $result->fetch_field() ) {
		$fieldnames[] = $field->name;
		$fieldtypes[] = $field->type;
	}

	$rows = [];
	while( $row = $result->fetch_array( MYSQLI_NUM ) ) {

		for ($colnum=0; $colnum<count($row); $colnum++) {
			$col = &$row[$colnum];
			if (isset($fieldtype_encode_binary[$fieldtypes[$colnum]])) $col = $fieldtype_encode_binary[$fieldtypes[$colnum]]( $col );
		}
		unset($col);
		if ($resulttype == MYSQLI_ASSOC) $row = array_combine( $fieldnames, $row );
		$rows[] = $row;
	}

	$result->free();

	$mysqli->close();

	return array( 'fieldnames' => $fieldnames, 'fieldtypes' => $fieldtypes, 'rows' => $rows );
}

//------------------------------------------------------------------------------

function _sqlite_fetch_all( $sqlite_args, $sql, $resulttype = SQLITE3_NUM, $fieldtype_encode_binary = array() ) {

	$sqlite = new SQLite3( $sqlite_args['db'] );

	if( $sqlite->lastErrorCode() ) return; //die( 'Erreur de connexion ('.$sqlite->connect_errno.') '.$sqlite->connect_error );

// https://www.sqlite.org/pragma.html#pragma_table_info
//
// PRAGMA table_info(table-name);
// This pragma returns one row for each column in the named table. Columns in the result set include the column name, data type, whether or not the column can be NULL, and the default value for the column. The "pk" column in the result set is zero for columns that are not part of the primary key, and is the index of the column in the primary key for columns that are part of the primary key.
// The table named in the table_info pragma can also be a view.

//	array (
//		'cid' => 0,
//		'name' => 'DT',
//		'type' => 'DATETIME',
//		'notnull' => 0,
//		'dflt_value' => NULL,
//		'pk' => 1,
//	)

//	$result = $sqlite->query( 'PRAGMA table_info(vbus3);' );
//
//	$fieldnames = [];
//	$fieldtypes = [];
//	while( $field = $result->fetchArray( SQLITE3_ASSOC ) ) {
//		$fieldnames[] = $field['name'];
//		$fieldtypes[] = $field['type'];
//	}
//
//	$result->finalize();

	$result = $sqlite->query( $sql );

	$result->fetchArray( SQLITE3_NUM );
	$fieldnames = [];
	$fieldtypes = [];
	for( $colnum=0; $colnum<$result->numColumns(); $colnum++) {
		$fieldnames[] = $result->columnName($colnum);
		$fieldtypes[] = $result->columnType($colnum);
	}
	$result->reset();

//exit_content( ve(r([$fieldnames, $fieldtypes,[SQLITE3_INTEGER, SQLITE3_FLOAT, SQLITE3_TEXT, SQLITE3_BLOB, SQLITE3_NULL]])) );

	$rows = [];
	while( $row = $result->fetchArray( SQLITE3_NUM ) ) {

		for ($colnum=0; $colnum<count($row); $colnum++) {
			$col = &$row[$colnum];
			if (isset($fieldtype_encode_binary[$fieldtypes[$colnum]])) $col = $fieldtype_encode_binary[$fieldtypes[$colnum]]( $col );
		}
		unset($col);
		if ($resulttype == SQLITE3_ASSOC) $row = array_combine( $fieldnames, $row );
		$rows[] = $row;
	}

	$result->finalize();

	$sqlite->close();

	return array( 'fieldnames' => $fieldnames, 'fieldtypes' => $fieldtypes, 'rows' => $rows );
}


//==============================================================================


// http://www.mobify.com/blog/beginners-guide-to-http-cache-headers/
// http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html

$headers_catalog = [
	'NO_CACHE' => [
		'Cache-Control: private, max-age=0, no-cache',
		'Expires: '.http_date(time() + 0),
	],
	'EXPIRES' => [
		'Cache-Control: public',
		'Expires: %s',
	],
	'EXPIRES_3600' => [
		'Cache-Control: public',
		'Expires: '.http_date(time() + 3600),
	],
	'ALLOW_ORIGIN' => [
		'Access-Control-Allow-Origin: %s',
	],
	'ALLOW_ORIGIN_ALL' => [
		'Access-Control-Allow-Origin: *',
	],
	'TEXT_PLAIN' => [
		'Content-Type: text/plain; charset=utf-8',
	],
	'TEXT_HTML' => [
		'Content-Type: text/html; charset=utf-8',
	],
	'TEXT_XML' => [
		'Content-Type: text/xml; charset=utf-8',
	],
	'TEXT_JAVASCRIPT' => [
		'Content-Type: text/javascript; charset=utf-8',
	],
	'TEXT_CSV' => [
		'Content-Type: text/csv; charset=utf-8',
	],
	'LENGTH' => [
		'Content-Length: %d',
	],
	'ATTACHEMENT' => [
		'Content-Disposition: attachment; filename=%s', //.SCRIPT_ONLY.'.csv',
	],
];

function headers_reset() {
	if ( !headers_sent() ) header_remove();
}

function headers_set( $headers = [], $reset = false ) {
	global $headers_catalog;
	if ($reset) headers_reset();
	while( $header = array_shift($headers) ) {
		if( isset($headers_catalog[$header]) ) {
			foreach( $headers_catalog[$header] as $header1 ) {
				$args1 = [$header1];
				for( $i1=substr_count($header1, '%'); $i1>0; $i1-- ) $args1[] = array_shift($headers);
				$header1 = call_user_func_array( 'sprintf', $args1 );
				header( $header1 );
			}
		} else {
			$args = [$header];
			for( $i=substr_count($header, '%'); $i>0; $i-- ) $args[] = array_shift($headers);
			$header = call_user_func_array( 'sprintf', $args );
			header( $header );
		}
	}
}

function echo_content( $content = '', $headers = [] ) {
	headers_set( $headers );
	echo( $content );
}

function exit_content( $content = '', $headers = [], $exit_code = 0 ) {
	echo_content( $content, $headers );
	exit( $exit_code );
}


//==============================================================================


$__text = function($text){return $text;};
$__html = function($text){return html($text);};


//==============================================================================


?>
