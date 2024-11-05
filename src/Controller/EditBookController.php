<?php

namespace Senac\Mvc\Controller;

use Senac\Mvc\Entity\Book;
use Senac\Mvc\Repository\BookRepository;

class EditBookController implements Controller
{
    public function __construct(private BookRepository $bookRepository)
    {
    }

    public function processaRequisicao(): void
    {
        // Captura o ID do livro que está sendo editado
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            header("Location: /?sucesso=0");
            exit();
        }

        // Captura os valores enviados via POST
        $gender = filter_input(INPUT_POST, 'gender');
        $title = filter_input(INPUT_POST, 'title');
        $writer = filter_input(INPUT_POST, 'writer');
        $publisher = filter_input(INPUT_POST, 'publisher');
        $edition = filter_input(INPUT_POST, 'edition');
        $page = filter_input(INPUT_POST, 'page');
        $image = filter_input(INPUT_POST, 'image');

        // Cria a instância de Book com os valores capturados
        $book = new Book($gender, $title, $writer, $publisher, $edition, $page, $image);
        $book->setId($id); // Certifique-se de definir o ID no objeto

        // Atualiza o livro no repositório
        $result = $this->bookRepository->update($book);

        // Verifica se a atualização foi bem-sucedida
        if ($result === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}
