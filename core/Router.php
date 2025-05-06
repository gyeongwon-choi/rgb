<?php

class Router {
    private $routes = [];

    // 라우트 추가
    public function add($route, $controller, $action) {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    // URL 디스패치 처리
    public function dispatch($url) {
        foreach ($this->routes as $route => $handler) {
            $regex = $this->convertToRegex($route);
    
            // URL 매칭 확인
            if (preg_match($regex, $url, $params)) {
                array_shift($params); // 전체 매칭 제거
    
                $controllerName = $handler['controller'];
                $action = $handler['action'];
    
                // 디버깅: 파라미터 확인
                //var_dump($params);
    
                if (!class_exists($controllerName)) {
                    http_response_code(500);
                    echo "Controller '$controllerName' not found.";
                    return;
                }
    
                $controller = new $controllerName();
    
                if (!method_exists($controller, $action)) {
                    http_response_code(500);
                    echo "Method '$action' not found in '$controllerName'.";
                    return;
                }
    
                try {
                    // 파라미터가 있다면 명명된 인자만 사용하도록 변경
                    if (!empty($params)) {
                        // 위치 기반 인자 제거
                        $namedParams = [];
                        foreach ($params as $key => $param) {
                            // 위치 기반 인자일 경우 순서를 변경하지 않도록 처리
                            if (is_numeric($key)) {
                                $namedParams[] = $param;
                            }
                        }
    
                        // 디버깅: call_user_func_array 전에 파라미터 출력
                        //var_dump($namedParams);
    
                        call_user_func_array([$controller, $action], $namedParams);
                    } else {
                        $controller->$action();
                    }
                } catch (Throwable $e) {
                    http_response_code(500);
                    echo "Error while calling '$controllerName::$action': " . $e->getMessage();
                }
    
                return;
            }
        }
    
        // 라우트에 맞는 경로가 없으면 404 에러
        http_response_code(404);
        echo "404 Not Found - No route matched.";
    }
    

    // 라우트 패턴을 정규식으로 변환
    private function convertToRegex($route) {
        return '#^' . preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $route) . '$#';
    }
}
