<?php

namespace Controllers;

/**
 * Class BaseController
 * @package Controllers
 */
abstract class BaseController
{
    /**
     * @param String $template
     * @param array $params
     */
    public function render(String $template, Array $params)
    {
        ob_start();
        extract($params);
        require_once VIEWS_DIR . $template . '.php';
        $content = ob_get_clean();
        $layout = VIEWS_DIR . '/layout/layout.php';
        require_once $layout;
        exit;
    }

    /**
     * @param array $data
     */
    public function jsonResponse(Array $data)
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");
        header("HTTP/1.1 200 OK");
        echo json_encode($data);
    }
}
