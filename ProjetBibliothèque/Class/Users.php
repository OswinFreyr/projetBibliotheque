<?php

abstract class Users {
    protected String $name;
    protected String $address;
    protected String $email;
    protected String $tel;

}

class Librarians extends Users {
    protected String $role;

    public function __construct(String $name, String $address, String $email, String $tel, String $role) {
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
        $this->tel = $tel;
        $this->role = $role;
    }

    public function afficherDetails(){}
}