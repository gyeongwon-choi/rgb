<?php

function loadEnv($path) {
    if (!file_exists($path)) {
        throw new Exception(".env 파일이 없습니다: " . $path);
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#') continue;

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        // 큰따옴표 제거
        $value = trim($value, "\"'");

        $_ENV[$name] = $value;
        putenv("$name=$value"); // 선택적으로 시스템 환경에도 반영
    }
}
