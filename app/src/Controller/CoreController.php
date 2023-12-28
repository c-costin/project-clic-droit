<?php

namespace App\Controller;

class CoreController
{
    /**
     * show method
     * 
     * @param [str] $viewName
     * @param array $viewData
     * 
     * @return view
     */
    protected function show(string $viewName, array $viewData = [])
    {
        global $router;

        extract($viewData);

        require_once __DIR__ . "/../Views/partials/header.tpl.php";
        require_once __DIR__ . "/../Views/{$viewName}.tpl.php";
        require_once __DIR__ . "/../Views/partials/footer.tpl.php";
    }
}
