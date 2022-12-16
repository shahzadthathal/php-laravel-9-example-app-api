<?php

namespace App\Http\Traits;

trait DataTrait
{
    public function getData($model)
    {
        // Fetch all the data according to given model i.e. posts and category
        return $model::orderBy('id', 'desc')->paginate(15);
        //return $model::all();
    }
}