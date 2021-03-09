<?php

$unix_socket_path = '/Applications/MAMP/tmp/mysql/mysql.sock';

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=travelmoravia_db;unix_socket=' . $unix_socket_path,
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
