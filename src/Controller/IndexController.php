<?php

namespace App\Controller;

use PDOException;
use Exception;

class IndexController extends AbstractController {

    public function index() :void {
        
        $this->renderer->render(
            ["layout.html.php"],
            ["", "home.html.php"],
            ["title" => 'Accueil']
        );
    }
}