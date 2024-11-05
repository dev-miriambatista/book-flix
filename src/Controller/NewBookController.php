<?php

namespace Senac\Mvc\Controller;

use Senac\Mvc\Entity\Book;
use Senac\Mvc\Repository\BookRepository;

class NewBookController implements Controller
{
    public function __construct(private BookRepository $bookRepository)
    {
    }

    public function processaRequisicao(): void
    {
//        $id = filter_input(INPUT_GET, 'id');
//        if ($id === false) {
//            header("Location: /?sucesso=0");
//            exit();
//        }

        // Corrigindo o filtro para texto
        $gender = filter_input(INPUT_POST, 'gender');
        if ($gender === false) {
            header("Location: /?sucesso=0");
            exit();
        }

        $title = filter_input(INPUT_POST, 'title');
        if ($title === false) {
            header("Location: /?sucesso=0");
            exit();
        }

        $writer = filter_input(INPUT_POST, 'writer');
        if ($writer === false) {
            header("Location: /?sucesso=0");
            exit();
        }

        $publisher = filter_input(INPUT_POST, 'publisher');
        if ($publisher === false) {
            header("Location: /?sucesso=0");
            exit();
        }

        $edition = filter_input(INPUT_POST, 'edition');
        if ($edition === false) {
            header("Location: /?sucesso=0");
            exit();
        }

        $page = filter_input(INPUT_POST, 'page');
        if ($page === false) {
            header("Location: /?sucesso=0");
            exit();
        }

        $image = filter_input(INPUT_POST, 'image');
        if ($image === false) {
            header("Location: /?sucesso=0");
            exit();
        }

        // Adicionando o livro ao repositório
        $result = $this->bookRepository->add(new Book($gender, $title, $writer, $publisher, $edition, $page, $image));

        if ($result === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}



