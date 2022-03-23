<?php

namespace App\Http\Controllers;

use App\Actions\Client\CreateClientStock;
use App\Actions\Client\ListClientStock;
use App\Http\Requests\StoreClientStockRequest;
use App\Http\Resources\ClientStockResource;
use Exception;
use Illuminate\Http\Request;

class ClientStockController extends Controller
{
    public function index()
    {
        try {
            $client_stocks = (new ListClientStock())->action();
            return ClientStockResource::collection($client_stocks);
        }catch (Exception $exception){
            return $this->errorResource($exception->getMessage());
        }
    }


    public function store(StoreClientStockRequest $request)
    {
        try {
            $validate = $request->validated();
            $client_stock = (new CreateClientStock())->action($validate);
            return new ClientStockResource($client_stock);
        }catch (Exception $exception){
            return $this->errorResource($exception->getMessage());
        }
    }


}
