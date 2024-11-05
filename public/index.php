<?php

use Senac\Mvc\Controller\BookListController;
use Senac\Mvc\Repository\BookRepository;
use Senac\Mvc\Controller\Controller;
use Senac\Mvc\Controller\DeleteBookController;
use Senac\Mvc\Controller\EditBookController;
use Senac\Mvc\Controller\Error404Controller;
use Senac\Mvc\Controller\FormBookController;
use Senac\Mvc\Controller\NewBookController;

require_once __DIR__ . "/../vendor/autoload.php";

//$host ="localhost";
//$dbname = 'db_book.sqlite';
//$user = 'root';
//$pwd = 'root';
//
//$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
//$pdo = new \PDO($dsn, $user, $pwd);

// Caminho para o banco de dados SQLite
$dbPath = __DIR__ . '/../db_book.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$bookRepository = new BookRepository($pdo);

// Verifica a rota e direciona para o controlador apropriado
if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    // Rota principal, lista de livros
    $controller = new BookListController($bookRepository);
} elseif ($_SERVER['PATH_INFO'] === '/novo-book') {
    // Rota para adicionar um novo livro
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Exibe o formulário para adicionar um novo livro
        $controller = new FormBookController($bookRepository);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Processa o envio do formulário de novo livro
        $controller = new NewBookController($bookRepository);
    }
} elseif ($_SERVER['PATH_INFO'] === '/editar-book') {
    // Rota para editar um livro existente
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Exibe o formulário para editar o livro
        $controller = new FormBookController($bookRepository);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Processa o envio do formulário de edição de livro
        $controller = new EditBookController($bookRepository);
    }
} elseif ($_SERVER['PATH_INFO'] === '/delete-book') {
    // Rota para deletar um livro
    $controller = new DeleteBookController($bookRepository);
} else {
    // Rota não encontrada (erro 404)
    $controller = new Error404Controller();
}

// Processa a requisição no controlador apropriado
/** @var Controller $controller */
$controller->processaRequisicao();

