<?php

namespace App\Http\Controllers;

abstract class Controller
{
protected function authorize($ability, $model)
{
    if (!auth()->user()->can($ability, $model)) {
        abort(403);
    }
}
}
