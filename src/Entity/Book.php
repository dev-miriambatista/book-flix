<?php

namespace Senac\Mvc\Entity;

class Book
{
    private int $id;
    public string $gender;
    public string $title;
    public string $writer;
    public string $publisher;
    public string $edition;
    public int $page;
    public string $image;

    // Construtor
    public function __construct(
        string $gender,
        string $title,
        string $writer,
        string $publisher,
        string $edition,
        int $page,
        ?string $image = 'image/padrao.jpg'
    ) {

        $this->setGender($gender);
        $this->setTitle($title);
        $this->setWriter($writer);
        $this->setPublisher($publisher);
        $this->setEdition($edition);
        $this->setPage($page);
        $this->setImage($image);
    }

    // Métodos de validação e definição (setters)
    private function setGender(string $gender): void {
        $this->gender = $gender;
    }

    private function setTitle(string $title): void {
        $this->title = $title;
    }

    private function setWriter(string $writer): void {
        $this->writer = $writer;
    }

    private function setPublisher(string $publisher): void {
        $this->publisher = $publisher;
    }

    private function setEdition(string $edition): void {
        $this->edition = $edition;
    }

    private function setPage(int $page): void {
        $this->page = $page;
    }

    // Getter e Setter da imagem
    public function setImage(?string $image): void
    {
        $this->image = $image ?? 'image/padrao.jpg';
    }

//     Métodos de leitura (getters)
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getWriter(): string
    {
        return $this->writer;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function getEdition(): string
    {
        return $this->edition;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getImage(): string
    {
        return $this->image;
    }
}
