<?php

return [
    'class' => 'yii\db\Connection',
//    'dsn' => 'mysql:host=193.111.140.87;dbname=amigator_db',
//    'username' => 'amigator',
//    'password' => '4S4y4Z9s',
    'dsn' => 'mysql:host=localhost:3307;dbname=amigator_db',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    //'enableSchemaCache' => true,

    // Продолжительность кеширования схемы.
    //'schemaCacheDuration' => 3600,

    // Название компонента кеша, используемого для хранения информации о схеме
    //'schemaCache' => 'cache',
];
