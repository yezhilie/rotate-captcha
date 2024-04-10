<?php
declare (strict_types = 1);

namespace isszz\captcha\rotate;

use isszz\captcha\rotate\interfaces\ConfigInterface;

abstract class Config implements ConfigInterface
{
    abstract public function get(string $name, string $defaultValue = null);
    abstract public function put(string $name, $data);
    abstract public function forget(string $name);
}
