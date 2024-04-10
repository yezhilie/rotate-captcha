<?php

namespace isszz\captcha\rotate\interfaces;

interface ConfigInterface
{
    public function get(string $name, string $defaultValue = null);
    public function put(string $name, $data);
    public function forget(string $name);
}
