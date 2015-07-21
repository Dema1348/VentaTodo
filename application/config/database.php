<?php

return array
(
    'default' => array(
        'type'       => 'mysql',
        'connection' => array(
            /**
             * The following options are available for PDO:
             *
             * string   dsn
             * string   username
             * string   password
             * boolean  persistent
             * string   identifier
             */
            'dsn'       => 'dblib:host=localhost:3306;dbname=test',
            'hostname'	=> 'localhost',
            'port'		=> '80',
            'database'	=> 'ventatodo',
            'username'  => 'root',
            'password'  => '',
            'persistent'=> TRUE,
        ),
        'table_prefix' => '',
        'charset'      => 'utf8',
        'caching'      => FALSE,
        'profiling'    => TRUE,
    ),
);

?>
