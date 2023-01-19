<?php

namespace App\Observers;

use App\Models\Book;
use App\Support\Helpers\ActivityLog;

class BookObserver
{
    /**
     * Handle the Book "created" event.
     *
     * @param Book $book
     * @return void
     */
    public function created(Book $book)
    {
        ActivityLog::create('book_store', 'book_store_description', $book->getTable(), $book->id, request(), $book->toArray());
    }

    /**
     * Handle the Book "updated" event.
     *
     * @param Book $book
     * @return void
     */
    public function updated(Book $book)
    {
        ActivityLog::create('book_update', 'book_update_description', $book->getTable(), $book->id, request(), $book->getOriginal(), $book->getChanges());
    }

    /**
     * Handle the Book "deleted" event.
     *
     * @param Book $book
     * @return void
     */
    public function deleted(Book $book)
    {
        ActivityLog::create('book_destroy', 'book_destroy_description', $book->getTable(), $book->id, request());
    }

    /**
     * Handle the Book "restored" event.
     *
     * @param Book $book
     * @return void
     */
    public function restored(Book $book)
    {
        ActivityLog::create('book_restore', 'book_restore_description', $book->getTable(), $book->id, request());
    }

    /**
     * Handle the Book "force deleted" event.
     *
     * @param Book $book
     * @return void
     */
    public function forceDeleted(Book $book)
    {
        ActivityLog::create('book_force_destroy', 'book_force_destroy_description', $book->getTable(), $book->id, request());
    }
}
