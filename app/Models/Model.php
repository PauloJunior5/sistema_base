<?php

namespace App\Models;

class Model
{
    protected $id;
    protected $created_at;
    protected $updated_at;

    function __construct()
    {
        $this->id = 0;
        $this->created_at = '';
        $this->updated_at = '';
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Id
    |--------------------------------------------------------------------------
    |
    */
    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Created_at
    |--------------------------------------------------------------------------
    |
    */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at(string $created_at = null)
    {
        $this->created_at = $created_at;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Updated_at
    |--------------------------------------------------------------------------
    |
    */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setUpdated_at(string $updated_at = null)
    {
        $this->updated_at = $updated_at;
    }
}