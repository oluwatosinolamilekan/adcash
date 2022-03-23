<?php

namespace App\Actions;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

abstract class Action
{
    /**
     * @throws Resources
     */
    protected function respondWithDataCollection(string $resource, string $model)
    {
        return $resource::collection($model);
    }

    /**
     * @throws Resources
     */
    protected function respondWithDataItem(string $resource, string $model)
    {
        return new $resource($model);
    }

    /**
     * @throws Auth
     */
    protected function getAuthtUser(): ?Authenticatable
    {
        return Auth::user();
    }
}
