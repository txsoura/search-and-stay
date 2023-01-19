<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class MeController extends Controller
{
    /**
     * @var UserService
     */
    protected $service;

    /**
     * @var ConstructionUserService
     */
    protected $constructionUserService;

    /**
     * MeController constructor.
     */
    public function __construct(UserService $service, ConstructionUserService $constructionUserService)
    {
        $this->service = $service;
        $this->constructionUserService = $constructionUserService;
    }

    /**
     * Get the auth user.
     *
     * @param Request $request
     * @return UserResource
     */
    public function me(Request $request): UserResource
    {
        $user = $this->service
            ->setRequest($request)
            ->show(auth()->user()->id);

        return new UserResource($user);
    }
}
