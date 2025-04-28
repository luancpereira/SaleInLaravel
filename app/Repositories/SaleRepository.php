<?php

namespace App\Repositories;

use App\Models\Sale;

class SaleRepository
{
    public function createSale(array $data): Sale
    {
        return Sale::create($data);
    }
}
