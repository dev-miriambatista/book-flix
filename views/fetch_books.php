<?php
//header('Content-Type: text/html; charset=utf-8');
//
//if (isset($_GET['gender'])) {
//    $gender = $_GET['gender'];
//
//    // Conecte-se ao banco de dados SQLite
//    $dbPath = __DIR__ . '/db_book.sqlite';
//    $pdo = new PDO("sqlite:$dbPath");
//
//    // Prepare e execute a consulta SQL
//    $stmt = $pdo->prepare('SELECT * FROM book WHERE gender = :gender');
//    $stmt->execute(['gender' => $gender]);
//    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//    // Gere o HTML para os livros
//    foreach ($books as $book) {
//        echo '<div class="book-item">';
//        echo '<img src="' . htmlspecialchars($book['image']) . '" alt="' . htmlspecialchars($book['title']) . '">';
//        echo '<h3>' . htmlspecialchars($book['title']) . '</h3>';
//        echo '<p>' . htmlspecialchars($book['writer']) . '</p>';
//        echo '<p>' . htmlspecialchars($book['publisher']) . '</p>';
//        echo '<p>' . htmlspecialchars($book['edition']) . '</p>';
//        echo '<p>' . htmlspecialchars($book['page']) . ' páginas</p>';
//        echo '</div>';
//    }
//}
//?>
<!---->
