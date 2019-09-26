<?php namespace App\Providers;

//use App\Services\Log as Log;

// On peut également l'écrire comme suit
use App\Services\Log;

class FlashMessage{

    private $log;

    public function __construct()
    {
        // namespace qualifié
        //$this->log = new \App\Services\Log;

        // Log est un alias du namepsace \App\Services\Log
        $this->log = new Log;
    }

    public function readlog():string{

        return $this->log->getLog();
    }
}