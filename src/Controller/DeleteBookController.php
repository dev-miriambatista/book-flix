<?php

namespace Senac\Mvc\Controller;
use Senac\Mvc\Repository\BookRepository;

class DeleteBookController implements Controller
{
    public function __construct(private BookRepository $bookRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            header('Location: /?sucesso=0');
            return;
        }

        $result = $this->bookRepository->delete($id);

        if ($result === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}
