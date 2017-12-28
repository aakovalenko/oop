<?php

namespace lesson04\example02\demo05\cart;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class SymfonyHybridCart extends Cart
{
    private $session;
    private $sessionKey;
    private $tableName;
    private $tokenStorage;
    private $entityManager;

    public function __construct(
        Session $session,
        EntityManagerInterface $entityManager,
        TokenStorageInterface $tokenStorage,
        $sessionKey = 'cart',
        $tableName = 'cart'
    )
    {
        $this->session = $session;
        $this->sessionKey = $sessionKey;
        $this->tableName = $tableName;
        $this->tokenStorage = $tokenStorage;
        $this->entityManager = $entityManager;
        parent::__construct();
    }

    protected function loadItems()
    {
        if ($user = $this->getUser()) {
            return []; // $this->entityManager->createQueryBuilder()->...;
        } else {
            return $this->session->get($this->sessionKey, []);
        }
    }

    protected function saveItems($items)
    {
        if ($user = $this->getUser()) {
            // $this->entityManager->createQueryBuilder()->...;
        } else {
            $this->session->set($this->sessionKey, $items);
        }
    }

    private function getUser()
    {
        $token = $this->tokenStorage->getToken();
        if ($token !== null) {
            $user = $token->getUser();
            if ($user instanceof User) {
                return $user;
            }
        }
        return null;
    }
}

class User
{
    public function getId()
    {

    }
}