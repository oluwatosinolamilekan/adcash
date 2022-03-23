<?php

namespace App\Http\Controllers;

use App\Actions\Stock\CreateStock;
use App\Actions\Stock\ListStock;
use App\Actions\Stock\UpdateStock;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Http\Resources\StockResource;
use App\Models\Stock;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        try {
            $stocks =  (new ListStock())->action();
            return StockResource::collection($stocks);
        }catch (Exception $exception){
            return $this->errorResource($exception->getMessage());
        }
    }

    public function store(StoreStockRequest $request)
    {
        try {
            $validated  = $request->validated();
            $stock =  (new CreateStock())->action($validated);
            return new StockResource($stock);
        }catch (Exception $exception){
            return $this->errorResource($exception->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $stock = Stock::where('id', $id)->firstOrFail();
            return new StockResource($stock);
        }catch (ModelNotFoundException $exception){
            return  $this->errorResource('Stock Not Found');
        }catch (Exception $exception){
            return  $this->errorResource($exception->getMessage());
        }
    }

    public function update(UpdateStockRequest $request, $id)
    {
        try {
            $validate = $request->validated();
            $stock = (new UpdateStock())->action($validate, $id);
            return new StockResource($stock);
        }catch (ModelNotFoundException $exception){
            return $this->errorResource('Stock Not Found');
        }catch (Exception $exception){
            return $this->errorResource($exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            Stock::where('id', $id)->delete();
        }catch (ModelNotFoundException $exception) {
            $this->errorResource('Stock Not Found');
        }catch (Exception $exception){
            $this->errorResource($exception->getMessage());
        }
        $this->deleteResource();
    }
}
