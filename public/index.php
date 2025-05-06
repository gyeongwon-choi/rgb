<?php
header("Content-Type: text/html; charset=UTF-8");
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 자동 로딩
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../app/controllers/' . $class . '.php',
        __DIR__ . '/../app/models/' . $class . '.php',
        __DIR__ . '/../core/' . $class . '.php',
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }

    throw new Exception("Class $class not found.");
});

// 헬퍼
require_once __DIR__ . '/../helpers/url_helper.php';
require_once __DIR__ . '/../helpers/env_helper.php';

// 메일
require_once __DIR__ . '/../helpers/PHPMailer-master/src/Exception.php';
require_once __DIR__ . '/../helpers/PHPMailer-master/src/PHPMailer.php';
require_once __DIR__ . '/../helpers/PHPMailer-master/src/SMTP.php';

// 라우터 설정
$router = new Router();

$router->add('/', 'HomeController', 'index');

$router->add('/news', 'NewsController', 'index');
$router->add('/news/create', 'NewsController', 'create');
$router->add('/news/update/{id}', 'NewsController', 'update');
$router->add('/news/detail/{id}', 'NewsController', 'detail');
$router->add('/news/delete/{id}', 'NewsController', 'delete');

$router->add('/achievements', 'AchievementsController', 'index');

$router->add('/about', 'AboutController', 'index');

$router->add('/inquiry', 'InquiryController', 'index');
$router->add('/inquiry/create', 'InquiryController', 'create');

// URL 처리
$url = $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH) ?? '/';
$router->dispatch($path);