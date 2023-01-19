<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Repositories\BookRepository;
use App\Services\BookService;
use Txsoura\Core\Http\Controllers\Traits\CRUDMethodsController;
use Txsoura\Core\Http\Controllers\Traits\SoftDeleteMethodsController;

class BookController extends Controller
{
    use CRUDMethodsController, SoftDeleteMethodsController;

    /**
     * @var BookRepository
     */
    protected $repository;

    /**
     * @var BookResource
     */
    protected $resource = BookResource::class;

    /**
     * @var BookService
     */
    protected $service;

    /**
     * BookController constructor.
     */
    public function __construct(BookService $service, BookRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }
}
