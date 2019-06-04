<?php


namespace nixar59\user\interfaces;


interface LoginFormInterface
{
    /**
     * @return boolean is login successful
     */
    public function login();
}