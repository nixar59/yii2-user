<?php


namespace nixar59\user\interfaces;


interface SignupFormInterface
{
    /**
     * @return boolean is signing up is successful
     */
    public function signup();
}