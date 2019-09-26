<?php namespace App;

class StorageSession implements storable
{

    protected $sessionName;

    public function __construct(string $sessionName)
    {
        // initialise les sessions si ce n'est pas déjà fait
        if(isset($_SESSION)) session_start();

        // si le panier est vide on l'initialise
        if (!isset($_SESSION[$sessionName])) {
            $_SESSION[$sessionName] = [];
        }

        // variable de classe utile dans la classe
        $this->sessionName = $sessionName;
    }

}