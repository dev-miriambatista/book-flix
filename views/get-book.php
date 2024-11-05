<?php
// get-books.php

require_once __DIR__ . '/db-connection.php'; // Conexão com o banco de dados

// Obtém o gênero do parâmetro GET
$gender = $_GET['gender'] ?? '';

// Prepara a consulta para recuperar livros pelo gênero
$query = 'SELECT * FROM book WHERE gender = :gender';
$stmt = $pdo->prepare($query);
$stmt->execute(['gender' => $gender]);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Define o tipo de conteúdo como HTML e exibe os dados dos livros
header('Content-Type: text/html');
$html = '<div class="book-grid">';
if (!empty($books)) {
    foreach ($books as $book) {
        // Usa o operador de coalescência nula para definir um valor padrão caso o campo não exista ou seja null
        $title = htmlspecialchars($book['title'] ?? 'Título não disponível', ENT_QUOTES, 'UTF-8');
        $writer = htmlspecialchars($book['writer'] ?? 'Autor não disponível', ENT_QUOTES, 'UTF-8');
        $publish = htmlspecialchars($book['publisher'] ?? 'Editora não disponível', ENT_QUOTES, 'UTF-8');
        $edition = htmlspecialchars($book['edition'] ?? 'Edição não disponível', ENT_QUOTES, 'UTF-8');
        $page = htmlspecialchars($book['page'] ?? 'Páginas não disponíveis', ENT_QUOTES, 'UTF-8');
        $image = htmlspecialchars($book['image'] ?? 'views/image/padrao.png', ENT_QUOTES, 'UTF-8'); // Imagem padrão
        $id = htmlspecialchars($book['id'], ENT_QUOTES, 'UTF-8');

        // Adiciona o HTML do livro à variável $html
        $html .= '
        <div class="book-item">
            <img src="' . $image . '" alt="' . $title . '" class="book-image">
            <h3>' . $title . '</h3>
            <p>Autor: ' . $writer . '</p>
            <p>Editora: ' . $publish . '</p>
            <p>Edição: ' . $edition . '</p>
            <p>Páginas: ' . $page . '</p>
            <div class="acoes-book">
                <a href="/editar-book?id=' . $id . '">Editar</a>
                <a href="/remover-book?id=' . $id . '" onclick="return confirm(\'Tem certeza de que deseja excluir este livro?\');">Excluir</a>
            </div>
        </div>';
    }
} else {
    $html .= '<p>Nenhum livro encontrado.</p>';
}
$html .= '</div>';

echo $html;
?>
