<?php

namespace Senac\Mvc\Repository;

use PDO;
use Senac\Mvc\Entity\Book;

class BookRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(Book $book): bool
    {
        $sql = 'INSERT INTO book (gender, title, writer, publisher, edition, page, image) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(1, $book->gender);
        $stmt->bindValue(2, $book->title);
        $stmt->bindValue(3, $book->writer);
        $stmt->bindValue(4, $book->publisher);
        $stmt->bindValue(5, $book->edition);
        $stmt->bindValue(6, $book->page, PDO::PARAM_INT);
        $stmt->bindValue(7, $book->image);

        $result = $stmt->execute();
        $id = $this->pdo->lastInsertId();

        // Atribuir o ID ao livro
        $book->setId($id);

        return $result;
    }

    public function update(Book $book): bool
    {
        $sql = 'UPDATE book SET 
    gender = :gender, 
    title = :title, 
    writer = :writer, 
    publisher = :publisher, 
    edition = :edition, 
    page = :page,
    image = :image 
    WHERE id = :id'; // Certifique-se de que o ID está incluído na cláusula WHERE

        $stmt = $this->pdo->prepare($sql);

        // Faz o bind dos valores do livro
        $stmt->bindValue(':gender', $book->getGender());
        $stmt->bindValue(':title', $book->getTitle());
        $stmt->bindValue(':writer', $book->getWriter());
        $stmt->bindValue(':publisher', $book->getPublisher());
        $stmt->bindValue(':edition', $book->getEdition());
        $stmt->bindValue(':page', $book->getPage(), PDO::PARAM_INT);
        $stmt->bindValue(':image', $book->getImage());
        $stmt->bindValue(':id', $book->getId(), PDO::PARAM_INT); // Agora estamos usando o ID

        return $stmt->execute();
    }



    /**
     * @return Book[]
     */
    public function all(): array
    {
        $bookList = $this->pdo
            ->query("SELECT * FROM book;")
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            [$this, 'hydrateBook'],
            $bookList
        );
    }

    public function find(int $id): ?Book
    //buscar registro no vanco de dados pela chave primaria
    {
        $sql = 'SELECT * FROM book WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        return $this->hydrateBook($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM book WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function hydrateBook(array $bookData): Book
    //pupular um objeto de uma classe com dados, geralmente vindos de uma fonte externa (BKP)
    {
        $book = new Book(
            $bookData['gender'],
            $bookData['title'],
            $bookData['writer'],
            $bookData['publisher'],
            (int)$bookData['edition'],
            (int)$bookData['page'],
            $bookData['image']
        );

//        $book->setId($bookData['id']);


        return $book;
    }
}
