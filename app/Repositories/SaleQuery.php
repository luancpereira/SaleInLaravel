<?php

namespace App\Repositories;

use DB;

class SaleQuery
{
    /**
     * Método para buscar uma venda por ID
     * 
     * @param int $id
     * @return array
     */
    public function getSaleById(int $id)
    {
        
        $query = 'SELECT * FROM sales WHERE id = :id';
        
        return DB::select($query, ['id' => $id]);
    }
}
