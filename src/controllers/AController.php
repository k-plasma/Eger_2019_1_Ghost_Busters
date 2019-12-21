<?php

/**
 * Basic controller class.
 */
abstract class AController
{
    /** @var array $params The array storing the route parameters. */
    protected $params;

    public function __construct(array $params = null) {
        $this->params = $params;
    }
}
