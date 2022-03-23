<?php

namespace App\Http\Controllers;

use App\Actions\Client\CreateClient;
use App\Actions\Client\ListClient;
use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ShowClientStockResouce;
use App\Models\Client;
use App\Models\Stock;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        try {
            $clients = (new ListClient())->action();
            return ClientResource::collection($clients);
        }catch (Exception $exception){
            $this->errorResource($exception->getMessage());
        }
    }

    public function store(StoreClientRequest  $request)
    {
        try {
            $validate = $request->validated();
            $client = (new CreateClient())->action($validate);
            return new ClientResource($client);
        }catch (Exception $exception){
            return $this->errorResource($exception->getMessage());
        }
    }

    public function showClientStocks($id)
    {
        try {
            $client = Client::with('client_stocks')->where('id',$id)->firstOrFail();
            return new ClientResource($client);
        }catch (ModelNotFoundException $exception){
            return $this->errorResource('Client Not Found');
        }catch (Exception $exception){
            return $this->errorResource($exception->getMessage());
        }
    }
}
