<?php //namespace Models;

/**
 * The basic data model class.
 */
abstract class AModel
{
    /** @var object $dbProvider The database connection for the model. */
    protected $dbConnection = null;
    
    public function __construct() {}

    /** @var string $id The id of the model. This should usually be unique. */
    public $id = null;
}
