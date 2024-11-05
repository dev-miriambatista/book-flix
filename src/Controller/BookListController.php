<?php

namespace Senac\Mvc\Controller;

use Senac\Mvc\Repository\BookRepository;

class BookListController implements Controller
{
    public function __construct(private BookRepository $bookRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $bookList = $this->bookRepository->all();
        require_once __DIR__ . "/../../views/book-list.php";
    }
}
