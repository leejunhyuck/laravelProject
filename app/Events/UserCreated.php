<?php

class Usercreated{

    public $user;

    public function __construct(\App\User $user){

        $this->user = $user;
    }


}