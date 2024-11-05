<?php

require_once __DIR__ . '/../views/inicio-html.php';
?>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #514951;
            font-family: Arial, sans-serif;
        }

        form {
            width: 50%;
            background-color: #514951;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            color: #fff;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #c9ada7;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        #image{
            height: 5vh;
        }


        select.form-control {
            background-color: #000000;
            color: #fff;
        }

        input.form-control, select.form-control {
            background-color: #c9ada7;
            color: #514951;
        }

        .add-button {
            width: 100%;
            padding: 12px;
            background-color: rgba(0, 0, 0, 0.54); /* Verde para adicionar */
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: rgba(0, 0, 0, 0.54);
        }

        .edit-button {
            width: 100%;
            padding: 12px;
            background-color: #3e362a; /* Laranja para editar */
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-button:hover {
            background-color: #3e362a;
        }
    </style>
</head>
<body>
<h1 style=" transform: rotate(-90deg); font-size: 7rem"><?= isset($book) ? 'Editar <br> Livro' : 'Novo <br> Livro' ?><i class="bi bi-book-half" style="font-size: 200px"></i></h1>
<form method="post">
    <div>
        <label for="gender">Gênero:</label>
        <select name="gender" id="gender" class="form-control">
            <option value="Ficção" <?= isset($book) && $book->getGender() === 'Ficção' ? 'selected' : '' ?>>Ficção</option>
            <option value="Fantasia" <?= isset($book) && $book->getGender() === 'Fantasia' ? 'selected' : '' ?>>Fantasia</option>
            <option value="Romance" <?= isset($book) && $book->getGender() === 'Romance' ? 'selected' : '' ?>>Romance</option>
            <option value="Mistério" <?= isset($book) && $book->getGender() === 'Mistério' ? 'selected' : '' ?>>Mistério</option>
            <option value="Suspense" <?= isset($book) && $book->getGender() === 'Suspense' ? 'selected' : '' ?>>Suspense</option>
            <option value="Biografia" <?= isset($book) && $book->getGender() === 'Biografia' ? 'selected' : '' ?>>Biografia</option>
            <option value="Aventura" <?= isset($book) && $book->getGender() === 'Aventura' ? 'selected' : '' ?>>Aventura</option>
        </select>
    </div>
    <div>
        <label for="title">Título:</label>
        <input name="title" class="form-control" required id="title"
               value="<?= isset($book) ? ($book->getTitle()) : '' ?>">
    </div>

    <div>
        <label for="writer">Autor:</label>
        <input name="writer" class="form-control" required id="writer"
               value="<?= isset($book) ? ($book->getWriter()) : '' ?>">
    </div>

    <div>
        <label for="publisher">Editora:</label>
        <input name="publisher" class="form-control" id="publisher"
               value="<?= isset($book) ? ($book->getPublisher()) : '' ?>">
    </div>

    <div>
        <label for="edition">Edição:</label>
        <input name="edition" class="form-control" id="edition"
               value="<?= isset($book) ? ($book->getEdition()) : '' ?>">
    </div>

    <div>
        <label for="page">Páginas:</label>
        <input name="page" type="number" class="form-control" id="page"
               value="<?= isset($book) ? ($book->getPage()) : '' ?>">
    </div>

    <div>
        <label for="image">Imagem:</label>
        <input name="image" type="text" class="form-control" id="image"
               value="<?= isset($book) && $book->getImage() !== null ? ($book->getImage()) : '' ?>">
    </div>

    <!-- Botões diferentes para cadastro e edição -->
    <?php if (isset($book)): ?>
        <button type="submit" class="edit-button">Salvar Alterações</button>
    <?php else: ?>
        <button type="submit" class="add-button">Adicionar Livro</button>
    <?php endif; ?>
</form>
</body>
</html>
