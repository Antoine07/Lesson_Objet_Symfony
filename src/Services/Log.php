<?php namespace App\Services;

class Log{

    public function getLog():string{

        return (string) rand(0, 100);
    }
}