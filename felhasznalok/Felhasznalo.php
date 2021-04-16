<?php


class Felhasznalo {
    private $nev;
    private $fnev;
    private $email;
    private $pwd;
    private $szulido;
    private $nem;
    private $hirlevel;
    private $profilKep;

    public function __construct($nev, $fnev, $email, $pwd, $szulido, $nem="Nincs megadva", $hirlevel=true, $profilKep="") {
        $this->nev = $nev;
        $this->fnev = $fnev;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->szulido = $szulido;
        $this->nem = $nem;
        $this->hirlevel = $hirlevel;
        $this->profilKep = $profilKep;
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

    public function getPwd() {
        return $this->pwd;
    }

    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }

    public function getSzulido() {
        return $this->szulido;
    }

    public function setSzulido($szulido) {
        $this->szulido = $szulido;
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

    public function setHirlevel(bool $hirlevel) {
        $this->hirlevel = $hirlevel;
    }

    public function getProfilKep(){
        return $this->profilKep;
    }

    public function setProfilKep($profilKep){
        $this->profilKep = $profilKep;
    }

}