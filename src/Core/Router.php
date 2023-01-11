<?php

class Router {
    
    public function run() {
        $sessionStorage = new Session();
        $login = $sessionStorage->get("login", null);

        if (!$login) {
            $loginController = new LoginController();
            $loginController->mainAction();
        } else {
            $chatController = new ChatController();
            $chatController->mainAction();
        }
    }
}