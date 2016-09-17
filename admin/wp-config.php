<?php
require_once $_SERVER ['DOCUMENT_ROOT'] . "/application/libraries/Cliente.php";
//require_once $_SERVER ['DOCUMENT_ROOT'] . "/application/libraries/aws/aws-autoloader.php";
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

define('WP_MEMORY_LIMIT', '64M');

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'applicationbd');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'applicationbd');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '123ads4567');

/** nome do host do MySQL */
define('DB_HOST', 'applicationbd.cevhue5iil6j.us-east-1.rds.amazonaws.com');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');


//define('WP_ALLOW_MULTISITE', false);



/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */

define( 'DBI_AWS_ACCESS_KEY_ID', 'AKIAJP2MHLGF6HJR6JDQ');
define( 'DBI_AWS_SECRET_ACCESS_KEY', '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');

define( 'AWS_ACCESS_KEY_ID', 'AKIAJP2MHLGF6HJR6JDQ');
define( 'AWS_SECRET_ACCESS_KEY', '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');
define('AWS_REGION', 'us-east-1');

define ( 'AUTOMATIC_UPDATER_DISABLED' , true);

#define('AWSID', 'AKIAJ2WYJXXE332L6AFQ');
#define('AWSSECRET', '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');


define('AUTH_KEY',         'gr|W727:?=?lvf*ghLH5aEDQDM3Q3+`jK<ok8hM#ov&a}t#+I`X)_JMHk|Al*D$f');
define('SECURE_AUTH_KEY',  'nQ4ysn|n(HH^DaNAC]VNE7E&{B)8ZwtUL*l%G^?HvJ*B0DmqzD]Z7}d=-cz/PSwI');
define('LOGGED_IN_KEY',    ':,{l^LTVR6Jz@dA3$&N-U6Ywv=2fUEc(]{y0:jA>k/M!L<ns8li#~!D[siy=2YOL');
define('NONCE_KEY',        'j~cn_22e`FA /):vs1x;s%+$y^M[fwD#M6U&tH)AX~T0[eGSXHyJh!yB;@],|RK.');
define('AUTH_SALT',        '/EfLqj=PeB3o`&S~,;Ozug*/UpLH<c6WH!J,{hfC%;p;Qob-#bx6h/E!moQnA1vY');
define('SECURE_AUTH_SALT', ']S9!DNfl;_^9,KPB 39<0WS5FVI~HJ=ndSo%wz-iG!vsCBk?e`x<l[TJ;#_IDk}Y');
define('LOGGED_IN_SALT',   'Re:SdH%WeI{T$m<9]K*q.es~> B?o9$KPKkNd9Yk?Q:{Tr^In71,aUS`J,_GlEI%');
define('NONCE_SALT',       '{rp65<g=Cm-0CsG#/cWj/wCE9w-;(bT)9h)bo4)Wh^Vo)(d2]{o?Q<sPGz%t~O0;');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
