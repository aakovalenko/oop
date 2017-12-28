<?php

namespace lesson04\example02\demo05\cart;

use Symfony\Component\HttpFoundation\Session\Session;

class SymfonyCart extends Cart
{
    private $session;
    private $sessionKey;

    public function __construct(Session $session, $sessionKey = 'cart')
    {
        $this->session = $session;
        $this->sessionKey = $sessionKey;
        parent::__construct();
    }
    
    protected function loadItems()
    {
        return $this->session->get($this->sessionKey, []);
    }

    protected function saveItems($items)
    {
        $this->session->set($this->sessionKey, $items);
    }
} 