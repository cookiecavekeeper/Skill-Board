<?php

namespace lib;

use PDO;

class ProgrammingLanguage extends dbObject
{

    static protected $table = "ProgrammingLanguages";
    static protected $primaryKeys = [
        'id' => 'id'
    ];
    static protected $fields = [
        "name" => [
            "db_key" => "name"
        ]
    ];

    function __construct(PDO $db, $id = null)
    {
        parent::__construct($db, ['id' => $id]);
    }

}