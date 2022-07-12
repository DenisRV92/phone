<?php

namespace App\Services;

use Illuminate\Http\Request;

interface Service
{
    public function create(Request $request);

    public function update($model, Request $request);

    public function delete($model);

    public function search(Request $request);
}
