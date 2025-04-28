<?php

namespace App\Http\Controllers;

use App\Repositories\SaleRepository;
use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    protected $saleRepository;

    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'value' => 'required|numeric',
        ]);

        $sale = $this->saleRepository->createSale($validatedData);

        return response()->json($sale, 201);
    }

    public function index()
    {
        $sales = Sale::all();

        return response()->json($sales);
    }

    public function show($id)
    {
        $sale = Sale::find($id);

        if (!$sale) {
            return response()->json(['message' => 'Venda não encontrada'], 404);
        }

        return response()->json($sale);
    }
}
