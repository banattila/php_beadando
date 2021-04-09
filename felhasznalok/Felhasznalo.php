<?php


class Felhasznalo
{
    private $nev;
    private $fnev;
    private $email;
    private $url;
    private $pwd;
    private $bdate;
    private $nem;
    private $hirlevel;

    public function __construct($nev, $fnev, $email, $pwd)
    {
        $this->nev = $nev;
        $this->fnev = $fnev;
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function getNev() {
        return $this->nev;
    }

    public function setNev($nev) {
        $this->nev = $nev;
    }

    public function getFnev() {
        return $this->fnev;
    }

    public function setFnev($fnev) {
        $this->fnev = $fnev;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getPwd() {
        return $this->pwd;
    }

    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }

    public function getBdate() {
        return $this->bdate;
    }

    public function setBdate($bdate) {
        $this->bdate = $bdate;
    }

    public function getNem() {
        return $this->nem;
    }

    public function setNem($nem) {
        $this->nem = $nem;
    }
    public function getHirlevel() {
        return $this->hirlevel;
    }

    public function setHirlevel($hirlevel) {
        $this->hirlevel = $hirlevel;
    }
}