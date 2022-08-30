<?php

namespace App\Http\Controllers;

use App\Events\ItemPurchased;
use App\Http\Resources\ItemsResource;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class ItemsController extends Controller
{
    const CACHE_TTL = 60;

    public function showAll()
    {
        return Cache::remember('items', self::CACHE_TTL , function () {
            return ItemsResource::collection(Item::all());
        });
    }

    public function purchase(Request $request)
    {
        $item = Item::find($request->get('itemId'));
        $user = User::find($request->get('userId'));
        event(new ItemPurchased($user, $item));
    }
}
