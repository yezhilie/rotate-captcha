<?php

namespace isszz\captcha\rotate\interfaces;

interface HandleInterface
{
    public function getInfo(string $filePath = null);
    public function save(int $size = 350);
    public function build(int $size = 350);
    public function createFront();
}
