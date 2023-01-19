<?php

namespace App\Repositories;

use App\Models\Book;
use Txsoura\Core\Repositories\CoreRepository;
use Txsoura\Core\Repositories\Traits\SoftDeleteMethodsRepository;

class BookRepository extends CoreRepository
{
    use SoftDeleteMethodsRepository;

    /**
     * Allow model relations to use in include
     * @var array
     */
    protected $possibleRelationships = [];

    /**
     * Allowed model columns to use in conditional query
     * @var array
     */
    protected $allow_where = array('name', 'isbn', 'value', 'currency');

    /**
     * Allowed model columns to use in sort
     * @var array
     */
    protected $allow_order = array('name', 'isbn', 'value', 'currency', 'created_at', 'updated_at');

    /**
     * Allowed model columns to use in query search
     * @var array
     */
    protected $allow_like = array('name');

    /**
     * Allowed model columns to use in filter by date
     * @var array
     */
    protected $allow_between_dates = array('created_at', 'updated_at');

    /**
     * Allowed model columns to use in filter by value
     * @var array
     */
    protected $allow_between_values = array('value');

    protected function model(): string
    {
        return Book::class;
    }
}
