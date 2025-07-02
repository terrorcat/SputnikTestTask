<?php

namespace App\Http\Controllers;

use App\Http\Resources\GoodsResource;
use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class GoodsController extends BaseController
{
    public function index(Request $request)
    {
        // Зафига пагинация? Потому что нет ничего более вечного, чем временные решения. Не включать пагинацию сразу = выстрелить себе в колено
        $result = Goods::paginate($request->get('per_page', 5));
        return GoodsResource::collection($result);
    }
}
