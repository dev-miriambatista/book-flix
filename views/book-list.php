<?php require_once __DIR__ . '/../views/inicio-html.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<?php
$dbPath = __DIR__ . '/../db_book.sqlite';
$pdo = new PDO("sqlite:$dbPath");

if (isset($_GET['action']) && $_GET['action'] == 'fetchBooks' && isset($_GET['gender'])) {
    $gender = $_GET['gender'];

    $query = "SELECT id, title, writer, publisher, edition, page, image FROM book WHERE gender = :gender";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $html = '<div class="book-grid">';
    if (!empty($books)) {
        foreach ($books as $book) {
            $title =($book['title']);
            $writer =($book['writer']);
            $publish =($book['publisher']);
            $edition =($book['edition']);
            $page =($book['page']);
            $image =($book['image'] ?? 'imagem/padrao.png');
            $id =($book['id']);

            $html .= '
            <div class="book-item">
                <img src="' . $image . '" alt="' . $title . '" class="book-image">
                <div class="text">
                <h3 id="h3_title">' . $title . '</h3>
                <p id="p_writer">' . $writer . '</p>
                <p id="p_publish"> ' . $publish . '</p>
                <p id="p_edition"> ' . $edition . '</pp_edition>
                <p id="p_page"> ' . $page . 'pag</p>
                
                <div class="acoes-book">
                    <a href="/editar-book?id=' . $id . '">
                    <i class="bi bi-pen" style="color:black; font-size: 20px"></i></a>
                    
                    <a href="/delete-book?id=' . $id . '">
                    <i class="bi bi-trash" style="color:black; font-size: 20px"></i></a>
                </div>
                </div>
            </div>';
        }
    } else {
        $html .= '<p>Nenhum livro encontrado.</p>';
    }
    $html .= '</div>';

    // Exibe o HTML gerado
    echo $html;
    exit; // Adicionado para evitar que mais HTML seja enviado após o conteúdo dos livros
}
?>

<div class="sidebar">

    <select id="gender-select" style="background-color: black; border:none"<i class="bi bi-caret-down-square-fill"></i></option>>
        <option value="disabled selected" style="background-color: black">

        <option value="Ficção">Ficção</option>
        <option value="Fantasia">Fantasia</option>
        <option value="Romance">Romance</option>
        <option value="Mistério">Mistério</option>
        <option value="Suspense">Suspense</option>
        <option value="Biografia">Biografia</option>
        <option value="Histórico">Histórico</option>
        <option value="Terror">Terror/Horror</option>
        <option value="Autoajuda">Des.Pessoal</option>
        <option value="Cristão">Cristão</option>
        <option value="Policial">Policial</option>
        <option value="Aventura">Aventura</option>
        <option value="Clássico">Clássico</option>
        <option value="Dramáticos">Dramáticos</option>
        <option value="Ficção Científica">Ficção Científica</option>
        <option value="Literatura Infantil">Literatura Infantil</option>
        <option value="Juvenil">Juvenil</option>
        <option value="Romance Histórico">Romance Histórico</option>
        <option value="Técnico">Técnico</option>
        <option value="Programação">Programação</option>
    </select>
    <h1 style=" transform: rotate(-90deg);margin:8%; margin-top:%">BOOK FLIX </h1>
    <i class="bi bi-book-half" style="font-size: 200px"></i>
    <div class="cabecalho__icones">
        <a href="/novo-book" style="background-color: black;color:white">Novo Livro</a>
<!--        <a href="/logout">Sair</a>-->

    </div>
</div>

<div id="bookDisplay"></div>

<style>
    body {
        display: flex;
        background-color: #514951;
        font-family: 'Arial', sans-serif; /* Fonte sans-serif */
    }

    .sidebar {
        width: 15vw;
        padding: 20px;
    }

    body h1 {
        margin-bottom: 10px;
        font: normal bolder 4rem 'Arial', sans-serif;
    }

    #h3_title {
        font: normal bolder 0.9rem 'Arial', sans-serif;
        margin: 0;
        padding: 2%;
    }

    .text {
        font: normal bolder 0.8rem 'Arial', sans-serif;
        line-height: 0.8rem;
        padding: 2%;
        margin-top: -6%;
        max-width: 100%;
        height: 5%;
        border-radius: 4px;
    }

    #gender-select {
        width: 15vw;
        padding: 10px;
        font-size: 1rem;
        color: #514951;
        margin-bottom: 10vh;
        border-radius: 0.5em;
        background-color: rgba(0, 0, 0, 0.18)
    }

    gender-select:hover{
        border:1px solid black;
    }

    #gender-select option {
        background-color: #514951;
        color: black;
    }

    .book-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 10px;
        padding: 20px;
        background-color: black;
        flex: 1;
    }

    .book-item {
        flex-direction: column;
        height: 70vh;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        text-align: center;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        background-image: linear-gradient(to right, #c9ada7, #9a8c98);
    }

    .book-item img {
        max-width: 100%;
        height: 60%;
        border-radius: 4px;
    }

    .cabecalho__icones {
        margin-top: 20px;
    }

    .cabecalho__icones a {

        padding: 10px 15px;
        margin-top: 30px;
        display: flex;
        justify-content: space-evenly;
        align-items: stretch;
        text-decoration: none;
        color: #000000;
        background-color: rgba(0, 0, 0, 0.18); /* Cor de fundo */
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.3s;
        font-family: 'Arial'; /* Fonte sans serif */
    }

    .cabecalho__icones a:hover {
        background-color: #9a8c98; /* Cor de fundo ao passar o mouse */
        transform: scale(1.05); /* Leve aumento ao passar o mouse */
    }
</style>



<?php require_once __DIR__ . '/../views/fim-html.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('gender-select').addEventListener('change', function() {
            var gender = this.value;

            var xhr = new XMLHttpRequest();
            xhr.open('GET', '?action=fetchBooks&gender=' + encodeURIComponent(gender), true);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    document.getElementById('bookDisplay').innerHTML = xhr.responseText;
                } else {
                    console.error('Erro na solicitação:', xhr.statusText);
                }
            };

            xhr.onerror = function() {
                console.error('Erro na solicitação.');
            };

            xhr.send();
        });
    });
</script>
