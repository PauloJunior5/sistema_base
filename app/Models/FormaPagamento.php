<?php

namespace App\Models;

use App\Models\Model;

class FormaPagamento extends Model
{
    protected $formaPagamento;

    public function __construct()
    {
        $this->formaPagamento = '';
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Forma de Pagamento
    |--------------------------------------------------------------------------
    |
    */
    public function getFormaPagamento(): string
    {
        return $this->formaPagamento;
    }

    public function setFormaPagamento(string $formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;
    }
}