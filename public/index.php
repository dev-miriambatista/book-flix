<?php
// Caminho para o banco de dados SQLite
$dbPath = __DIR__ . '/../db_book.sqlite';

try {
    $pdo = new PDO("sqlite:$dbPath");
    // Define o modo de erro do PDO para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Instancia o repositório de livros
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

} catch (PDOException $e) {
    // Tratar o erro de conexão ao banco de dados
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
