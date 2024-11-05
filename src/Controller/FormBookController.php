<?php

namespace Senac\Mvc\Controller;

use Senac\Mvc\Entity\Book;
use Senac\Mvc\Repository\BookRepository;

class FormBookController implements Controller
{
    public function __construct(private BookRepository $bookRepository)
    {
    }

    public function processaRequisicao(): void
    {
        // Captura o ID do livro, se fornecido
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        /** @var ?Book $book */
        $book = null;

        // Se um ID válido for passado, busca o livro correspondente
        if ($id !== false && $id !== null) {
            $book = $this->bookRepository->find($id);
        }

        // Carrega a view do formulário de livro
        require_once __DIR__ . "/../../views/book-form.php";
    }
}
