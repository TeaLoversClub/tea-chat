<?php

class ChatController
{
    public function mainAction()
    {
        $messagesStorage = new MessagesStorage();
        $cookie = new Cookie();
        $session = new Session();
        $post = new Post();
        $view = new View();

        $login = $session->get('login');

        if (!$login) {
            header('Location: /login');
        }

        $message = $post->get("user_message", null);
        $login = $session->get("login", null);

        if ($message && $login) {
            if ($message == "set_night_theme") {
                $cookie->add("theme", "night");
            } else if ($message == "set_light_theme") {
                $cookie->delete("theme");
            } else {
                $newMessage = [
                    'message' => $message,
                    'login' => $login,
                    'time' => time()
                ];
                $messagesStorage->addMessage($newMessage);
            }
        }

        $view->render('chat', [
            'messages' => $messagesStorage->getMessages(),
            'theme' => $cookie->get('theme')
        ]);
    }
}
