<?php

namespace App;

use InvalidArgumentException;

class Route
{
    private array $routes = [];

    public function add(string $path, array $params, string $method = 'GET')
    {
        $this->routes[] = [
            'path' => $path,
            'params' => $params,
            'method' => strtoupper($method)
        ];
    }

    /**
     * Hàm này kiểm tra đường dẫn và router path có giống nhau không
     * @param string $path
     * @param string $method
     * @return array | false
     */
    public function match(string $path, string $method): array|bool
    {
        // Loại bỏ dấu / ở đầu và cuối
        $path = trim($path, "/");

        // Kiểm tra $this->routes có hợp lệ không
        if (!is_array($this->routes)) {
            throw new InvalidArgumentException("Routes must be an array");
        }

        foreach ($this->routes as $route) {
            // Kiểm tra $route có hợp lệ không
            if (
                !isset($route['path']) ||
                !isset($route['params']) ||
                !is_array($route['params']) ||
                !isset($route['method'])
            ) {
                continue; // Bỏ qua route không hợp lệ
            }

            // Kiểm tra phương thức HTTP
            if (strtoupper($method) !== strtoupper($route['method'])) {
                continue; // Bỏ qua nếu phương thức không khớp
            }

            // Lấy pattern từ route
            $pattern = $this->getPatternFromRoutePath($route['path']);
            if (!$pattern) {
                continue; // Bỏ qua nếu pattern không hợp lệ
            }

            // So khớp đường dẫn với pattern
            if (preg_match($pattern, $path, $matches)) {
                // Lọc các tham số có tên
                $matches = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // Gộp tham số từ matches và params mặc định
                $params = array_merge($matches, $route['params']);

                return $params;
            }
        }

        // Không tìm thấy route phù hợp
        return false;
    }

    private function getPatternFromRoutePath(string $route_path): string
    {
        // Loại bỏ dấu / ở đầu và cuối
        $route_path = trim($route_path, "/");

        // Tách đường dẫn thành các đoạn
        $segments = explode("/", $route_path);

        // Xử lý từng đoạn
        $segments = array_map(function (string $segment): string {
            // Trường hợp {param}
            if (preg_match("#^\{([a-z][a-z0-9]*)\}$#", $segment, $matches)) {
                return "(?P<" . $matches[1] . ">[^/]+)";
            }

            // Trường hợp {param:pattern}
            if (preg_match("#^\{([a-z][a-z0-9]*):(.+)\}$#", $segment, $matches)) {
                return "(?P<" . $matches[1] . ">" . $matches[2] . ")";
            }

            // Trường hợp mặc định: thoát các ký tự đặc biệt
            return preg_quote($segment, '#');
        }, $segments);

        // Ghép các đoạn lại và trả về regex hoàn chỉnh
        return "#^" . implode("/", $segments) . "$#";
    }
}
