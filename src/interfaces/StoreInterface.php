<?php

namespace isszz\captcha\rotate\interfaces;

interface StoreInterface
{
    public function get($token);
    public function put($degrees);
}
