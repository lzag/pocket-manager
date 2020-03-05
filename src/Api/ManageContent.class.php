<?php

namespace App\Api;

use \App\Api\Authorization as Auth;

class Content
{
    private $access_token = '';

    public function __construct($access_token)
    {
        $this->access_token = $access_token;
    }

    public function checkAuthorization()
    {
        $authorized = false;
        if ($this->access_token) {
            $authorized = true;
        }
        return $authorized;
    }
}
