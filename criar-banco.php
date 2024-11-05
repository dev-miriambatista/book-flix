<?php
$dbPath = __DIR__ . '/db_book.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$pdo->exec('CREATE TABLE book (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    gender TEXT,
    title TEXT,
    writer TEXT,
    publisher TEXT,
    edition TEXT,
    page INT,
    image TEXT
);');
