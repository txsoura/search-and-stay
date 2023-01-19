<?php

namespace App\Services;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use App\Repositories\BookRepository;
use Txsoura\Core\Services\CoreService;
use Txsoura\Core\Services\Traits\CRUDMethodsService;
use Txsoura\Core\Services\Traits\SoftDeleteMethodsService;

class BookService extends CoreService
{
    use CRUDMethodsService, SoftDeleteMethodsService;

    protected $storeRequest = BookStoreRequest::class;
    protected $updateRequest = BookUpdateRequest::class;

    /**
     * @var BookRepository
     */
    protected $repository;

    /**
     * BookService constructor.
     * @param BookRepository $repository
     */
    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Model class for crud.
     *
     * @return string
     */
    protected function model(): string
    {
        return Book::class;
    }
}
