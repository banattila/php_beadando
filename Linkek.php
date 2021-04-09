<?php


class Linkek
{
    private $link;
    private $nev;

    public function __construct($link, $nev) {
        $this->link = $link;
        $this->nev = $nev;
    }

    public function getLink() {
        return $this->link;
    }

    public function getNev() {
        return $this->nev;
    }
}