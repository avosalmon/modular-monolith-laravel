<?php

namespace App\Product\Domain\Contracts;

interface ProductRepository
{
    public function findById(int $id);

    public function deductStock(int $id, int $quantity);
}
