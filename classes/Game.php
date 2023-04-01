<?php


class Game
{
    public $id;
    public $name;
    public $description;
    public $image;

    public function __construct()
    {
        settype($this->id, 'integer');
    }
}