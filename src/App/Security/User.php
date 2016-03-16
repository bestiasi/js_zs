<?php

/*
 *  Developed by Stefan Matei - stev.matei@gmail.com
 */

namespace App\Security;

/**
 * Description of User
 *
 * @author stefan
 */
use SimpleUser\User as BaseUser;

class User extends BaseUser
{

    public function __construct($email)
    {
        parent::__construct($email);
    }

    public function getStandSize()
    {
        return $this->getCustomField('standSize');
    }

    public function setStandSize($standSize)
    {
        $this->setCustomField('standSize', $standSize);
    }

    public function validate()
    {
        $errors = parent::validate();

        if ($this->getStandSize() && (!filter_var($this->getStandSize(), FILTER_VALIDATE_INT) || $this->getStandSize() < 0)) {
            $errors['standSize'] = 'The size of the stand must be a positive integer!';
        }

        return $errors;
    }

}