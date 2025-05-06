<?php

class Model {
    protected $db;
    protected $table;

    public function __construct($db) {
        $this->db = $db;
    }

    // 데이터베이스와 상호작용하는 메서드들...
}
