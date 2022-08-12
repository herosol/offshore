<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


define('ADMIN', 'admin');
defined('UPLOAD_PATH') OR define('UPLOAD_PATH','./uploads/');
defined('UPLOAD_VPATH') OR define('UPLOAD_VPATH','./v/');

// Stripe keys
if ($_SERVER['HTTP_HOST'] != 'localhost') {
	define('API_PUBLIC_KEY', 'pk_test_MBmgSxlJm4osKE52BTYcvXul0046kG0FiP');
	define('API_SECRET_KEY', 'sk_test_1mT2FJVNtaS4b2VUMBMxd7Vc00nujrf9Vb');
} else {
	define('API_PUBLIC_KEY', 'pk_test_MBmgSxlJm4osKE52BTYcvXul0046kG0FiP');
	define('API_SECRET_KEY', 'sk_test_1mT2FJVNtaS4b2VUMBMxd7Vc00nujrf9Vb');
}

// Your twilio Account Sid and Auth Token from twilio.com/user/account
define('TWILIO_SID', 'ACcbd2d42db56cf0c7e7f8b0fb625eba5c');
define('TWILIO_TOEKN', 'b99e4d468819f5928ee115eb6d014a3e');
define('TWILIO_NUMBER', '+12037936776');

/*// Your twilio Account Sid and Auth Token from twilio.com/user/account
define('TWILIO_SID', 'AC62d44498d98525cf14d4a7872c49240f');
define('TWILIO_TOEKN', '36dad8f8b1e7df9ebc1ecdae9ce263f7');
define('TWILIO_NUMBER', '+18325588800');*/

// google Recaptcha
define('RECAPTCHA_SECRET_KEY','6Lcu36gUAAAAAKeVJyeaBxOqt43KxZpJ9oRqUGHp');
define('RECAPTCHA_SITE_KEY','6Lcu36gUAAAAACL_if-5Ywu-03K2M16acq8-JDth') ;
define('ZOOM_API_KEY','SiFnmHfmTNasNcfc6_-OEw') ;
define('ZOOM_SECRET_KEY','HAHXBRYe6USStK5rhkQ0hhTA5aLMpdRWzCX6') ;



define('REACT_URL','http://localhost:3000') ;
