<?php

return [
    'class' => 'yii\db\Connection',
    'dsn'      => 'sqlite:' . dirname(__DIR__) . '/test.db',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
