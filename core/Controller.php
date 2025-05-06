<?php

class Controller {
    protected $db;
    protected $viewPath = '../app/views/';

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    protected function model($model) {
        require_once "../app/models/{$model}.php";
        return new $model($this->db);
    }

    protected function view($view, $data = []) {
        extract($data);
        require_once $this->viewPath . $view . '.php';
    }
}
