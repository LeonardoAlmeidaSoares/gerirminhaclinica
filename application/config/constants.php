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

/*Constantes de Funcionamento do Sistema*/
define("NOME_DO_SISTEMA", "Gerir Minha Clínica");

/* Constantes definindo os Status*/

/* SOBRE OS CLIENTES */ 
define("STATUS_CLIENTE_CANCELADO", 1000);
define("STATUS_CLIENTE_ATIVO", 1001);
define("STATUS_CLIENTE_INATIVO", 1002);
define("STATUS_CLIENTE_ATRASADO", 1003);

/* SOBRE OS PLANOS */
define("STATUS_PLANO_CANCELADO", 1000);
define("STATUS_PLANO_ATIVO", 1001);
define("STATUS_PLANO_INATIVO", 1002);
define("STATUS_PLANO_INCOMPLETO", 1003);

/* SOBRE OS COLABORADORES */
define("STATUS_COLABORADOR_CANCELADO",1000);
define("STATUS_COLABORADOR_ATIVO", 1001);
define("STATUS_COLABORADOR_INATIVO", 1002);

/* SOBRE OS FUNCIONÁRIOS */
define("STATUS_FUNCIONARIO_CANCELADO", 1000);
define("STATUS_FUNCIONARIO_ATIVO", 1001);
define("STATUS_FUNCIONARIO_INATIVO", 1002);

/* SOBRE AS FORMAS DE PAGAMENTO AOS COLABORADORES*/
define("FORMA_PAGTO_CONSULTA",1001);
define("FORMA_PAGTO_PLANTAO", 1001);
define("FORMA_PAGTO_MENSALIDADE", 1002);

/* SOBRE OS SERVIÇOS */
define("STATUS_SERVICO_INATIVO",1000);
define("STATUS_SERVICO_ATIVO", 1001);
define("STATUS_SERVICO_AGUARDANDO_PREENCHIMENTO_VALORES", 1002);

/* SOBRE AS CONSULTAS */
define("STATUS_CONSULTA_CANCELADA", 1000);
define("STATUS_CONSULTA_ATIVA", 1001);
define("STATUS_CONSULTA_EM_ANDAMENTO", 1002);
define("STATUS_CONSULTA_FINALIZADA", 1003);

/* SOBRE AS CONTAS A PAGAR */
define("STATUS_CONTA_PAGAR_CANCELADA", 1000);
define("STATUS_CONTA_PAGAR_ATIVA", 1001);
define("STATUS_CONTA_PAGAR_ATRASADA", 1002);
define("STATUS_CONTA_PAGAR_PAGA", 1003);

/* SOBRE AS CONTAS A RECEBER */
define("STATUS_CONTA_RECEBER_CANCELADA", 1000);
define("STATUS_CONTA_RECEBER_ATIVA", 1001);
define("STATUS_CONTA_RECEBER_ATRASADA", 1002);
define("STATUS_CONTA_RECEBER_PAGA", 1003);

/* SOBRE ESTADO CIVIL */
define("STATUS_ESTADO_CIVIL_NAO_DISPONIVEL", 1000);
define("STATUS_ESTADO_CIVIL_SOLTEIRO", 1001);
define("STATUS_ESTADO_CIVIL_CASADO", 1002);
define("STATUS_ESTADO_CIVIL_NOIVO", 1003);
define("STATUS_ESTADO_CIVIL_VIÚVO", 1004);
define("STATUS_ESTADO_CIVIL_DIVORCIADO", 1005);
define("STATUS_ESTADO_CIVIL_SEPARADO", 1006);