<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Inertia\Response;

class UsersController extends Controller
{
    const CACHE_TTL = 60;

    public function index(): Response
    {
        return Inertia::render('Users');
    }

    public function details($id): Response
    {
        return Inertia::render('Details', [
            'userId' => (int)$id
        ]);
    }

    public function showAll()
    {
        return Cache::remember('users', self::CACHE_TTL, function () {
            return UsersResource::collection(User::all());
        });
    }

    public function show($id): UsersResource
    {
        return Cache::remember('user' . $id, self::CACHE_TTL, function () use ($id) {
            return new UsersResource(User::findOrFail($id));
        });
    }
}
