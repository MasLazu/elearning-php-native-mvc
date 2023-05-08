<?php

namespace CobaMVC\Middleware;

interface Middleware
{
    public function before(): void;
}