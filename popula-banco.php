<?php

// Definir o caminho para o banco de dados SQLite
$dbPath = __DIR__ . '/db_book.sqlite';

// Criar uma nova conexão PDO com o banco de dados SQLite
$pdo = new PDO("sqlite:$dbPath");

// Definir o modo de erro para exceções
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// SQL de inserção
$sql = "
INSERT INTO book (gender, title, writer, publisher, edition, page, image)
VALUES
-- Inserir livros de Fantasia
('Fantasia', 'O Nome do Vento', 'Patrick Rothfuss', 'DAW Books', '1ª Edição', 672, 'image/fantasia/O-Nome-do-Vento.jpg'),
('Fantasia', 'O Ciclo da Herança: Eragon', 'Christopher Paolini', 'Knopf', '1ª Edição', 509, 'image/fantasia/O-Ciclo-da-Ergancia-Eragon.jpg'),
('Fantasia', 'A Roda do Tempo: A Grande Caçada', 'Robert Jordan', 'Tor Books', '1ª Edição', 406, 'image/fantasia/A-Roda-do-Tempo-A-Grande-Cacada.jpg'),
('Fantasia', 'O Mago', 'Raymond E. Feist', 'Ace Books', '1ª Edição', 342, 'image/fantasia/O-Mago.jpg'),
('Fantasia', 'O Senhor dos Anéis: As Duas Torres', 'J.R.R. Tolkien', 'HarperCollins', '1ª Edição', 352, 'image/fantasia/O-Senhor-dos-Aneis-As-Duas-Torres.jpg'),

-- Inserir livros de Ficção
('Ficção', '1984', 'George Orwell', 'Secker & Warburg', '1ª Edição', 328, 'image/ficcao/1984.jpg'),
('Ficção', 'Brave New World', 'Aldous Huxley', 'Chatto & Windus', '1ª Edição', 268, 'image/ficcao/Brave-New-World.jpg'),
('Ficção', 'O Sol é Para Todos', 'Harper Lee', 'J.B. Lippincott & Co.', '1ª Edição', 281, 'image/ficcao/O-Sol-e-Para-Todos.jpg'),
('Ficção', 'A Revolução dos Bichos', 'George Orwell', 'Secker & Warburg', '1ª Edição', 112, 'image/ficcao/A-Revolucao-dos-Bichos.jpg'),
('Ficção', 'O Grande Gatsby', 'F. Scott Fitzgerald', 'Charles Scribner’s Sons', '1ª Edição', 180, 'image/ficcao/O-Grande-Gatsby.jpg'),
('Ficção', 'O Apanhador no Campo de Centeio', 'J.D. Salinger', 'Little, Brown and Company', '1ª Edição', 277, 'image/ficcao/O-Apanhador-no-Campo-de-Centeio.jpg'),
('Ficção', 'A Culpa é das Estrelas', 'John Green', 'Dutton Books', '1ª Edição', 313, 'image/ficcao/A-Culpa-e-das-Estrelas.jpg'),
('Ficção', 'O Morro dos Ventos Uivantes', 'Emily Brontë', 'Thomas Cautley Newby', '1ª Edição', 416, 'image/ficcao/O-Morro-dos-Ventos-Uivantes.jpg'),
('Ficção', 'O Estrangeiro', 'Albert Camus', 'Gallimard', '1ª Edição', 123, 'image/ficcao/O-Estrangeiro.jpg'),
('Ficção', 'A Mão Esquerda da Escuridão', 'Ursula K. Le Guin', 'Harper & Row', '1ª Edição', 304, 'image/ficcao/A-Mao-Esquerda-da-Escuridao.jpg'),

-- Inserir livros de Romance
('Romance', 'Orgulho e Preconceito', 'Jane Austen', 'T. Egerton', '1ª Edição', 279, 'image/romance/Orgulho-e-Preconceito.jpg'),
('Romance', 'A Ponte do Rio Kwai', 'Pierre Boulle', 'Secker & Warburg', '1ª Edição', 272, 'image/romance/A-Ponte-do-Rio-Kwai.jpg'),
('Romance', 'Pride and Prejudice', 'Jane Austen', 'T. Egerton', '1ª Edição', 279, 'image/romance/Pride-and-Prejudice.jpg'),
('Romance', 'A Hospedeira', 'Stephenie Meyer', 'Little, Brown and Company', '1ª Edição', 624, 'image/romance/A-Hospedeira.jpg'),
('Romance', 'Como Eu Era Antes de Você', 'Jojo Moyes', 'Penguin Books', '1ª Edição', 368, 'image/romance/Como-Eu-Era-Antes-de-Voc.jpg'),
('Romance', 'O Casamento', 'Nicholas Sparks', 'Warner Books', '1ª Edição', 290, 'image/romance/O-Casamento.jpg'),
('Romance', 'A Culpa é das Estrelas', 'John Green', 'Dutton Books', '1ª Edição', 313, 'image/romance/A-Culpa-e-das-Estrelas.jpg'),
('Romance', 'A Menina que Roubava Livros', 'Markus Zusak', 'Knopf', '1ª Edição', 552, 'image/romance/A-Menina-que-Roubava-Livros.jpg'),
('Romance', 'O Diário de uma Paixão', 'Nicholas Sparks', 'Warner Books', '1ª Edição', 214, 'image/romance/O-Diario-de-uma-Paixao.jpg'),
('Romance', 'A Última Música', 'Nicholas Sparks', 'Grand Central Publishing', '1ª Edição', 368, 'image/romance/A-Última-Música.jpg'),

-- Inserir livros de Mistério
('Mistério', 'O Código Da Vinci', 'Dan Brown', 'Doubleday', '1ª Edição', 489, 'image/misterio/O-Codigo-Da-Vinci.jpg'),
('Mistério', 'Sherlock Holmes: O Cão dos Baskervilles', 'Arthur Conan Doyle', 'George Newnes Ltd', '1ª Edição', 256, 'image/misterio/Sherlock-Holmes-O-Cao-dos-Baskervilles.jpg'),
('Mistério', 'O Silêncio dos Inocentes', 'Thomas Harris', 'Putnam', '1ª Edição', 352, 'image/misterio/O-Silencio-dos-Inocentes.jpg'),
('Mistério', 'O Menino do Pijama Listrado', 'John Boyne', 'David Fickling Books', '1ª Edição', 216, 'image/misterio/O-Menino-do-Pijama-Listrado.jpg'),
('Mistério', 'A Garota no Trem', 'Paula Hawkins', 'Riverhead Books', '1ª Edição', 395, 'image/misterio/A-Garota-no-Trem.jpg'),
('Mistério', 'Agatha Christie: O Assassinato de Roger Ackroyd', 'Agatha Christie', 'Collins Crime Club', '1ª Edição', 256, 'image/misterio/O-Assassinato-de-Roger-Ackroyd.jpg'),
('Mistério', 'A Verdade Sobre o Caso Harry Quebert', 'Joël Dicker', 'Albin Michel', '1ª Edição', 640, 'image/misterio/A-Verdade-Sobre-o-Caso-Harry-Quebert.jpg'),
('Mistério', 'O Caso dos Dez Negrinhos', 'Agatha Christie', 'Collins Crime Club', '1ª Edição', 272, 'image/misterio/O-Caso-dos-Dez-Negrinhos.jpg'),
('Mistério', 'A Garota que Roubava Livros', 'Markus Zusak', 'Knopf', '1ª Edição', 552, 'image/misterio/A-Garota-que-Roubava-Livros.jpg'),
('Mistério', 'O Quinto Mandamento', 'J.D. Barker', 'Redhook', '1ª Edição', 368, 'image/misterio/O-Quinto-Mandamento.jpg'),

-- Inserir livros de Suspense
('Suspense', 'A Garota no Trem', 'Paula Hawkins', 'Riverhead Books', '1ª Edição', 395, 'image/suspense/A-Garota-no-Trem.jpg'),
('Suspense', 'O Silêncio dos Inocentes', 'Thomas Harris', 'Putnam', '1ª Edição', 352, 'image/suspense/O-Silencio-dos-Inocentes.jpg'),
('Suspense', 'Garota Exemplar', 'Gillian Flynn', 'Crown Publishing Group', '1ª Edição', 422, 'image/suspense/Garota-Exemplar.jpg'),
('Suspense', 'A Verdade Sobre o Caso Harry Quebert', 'Joël Dicker', 'Albin Michel', '1ª Edição', 640, 'image/suspense/A-Verdade-Sobre-o-Caso-Harry-Quebert.jpg'),
('Suspense', 'A Mulher na Janela', 'A.J. Finn', 'William Morrow', '1ª Edição', 448, 'image/suspense/A-Mulher-na-Janela.jpg'),
('Suspense', 'A Cadeira de Rodas', 'Emma Donoghue', 'Little, Brown and Company', '1ª Edição', 304, 'image/suspense/A-Cadeira-de-Rodas.jpg'),
('Suspense', 'Noites de Tormenta', 'Nicholas Sparks', 'Warner Books', '1ª Edição', 256, 'image/suspense/Noites-de-Tormenta.jpg'),


('Aventura', 'As Aventuras de Huckleberry Finn', 'Mark Twain', 'Oxford University Press', '1ª Edição', 366, 'image/aventura/As-Aventuras-de-Huckleberry-Finn.jpg'),
('Aventura', 'A Ilha do Tesouro', 'Robert Louis Stevenson', 'Cassell & Company', '1ª Edição', 240, 'image/aventura/A-Ilha-do-Tesouro.jpg'),
('Aventura', 'Robinson Crusoé', 'Daniel Defoe', 'W. Taylor', '1ª Edição', 320, 'image/aventura/Robinson-Crusoe.jpg'),
('Aventura', 'O Hobbit', 'J.R.R. Tolkien', 'George Allen & Unwin', '1ª Edição', 310, 'image/aventura/O-Hobbit.jpg'),
('Aventura', 'As Crônicas de Nárnia', 'C.S. Lewis', 'Geoffrey Bles', '1ª Edição', 208, 'image/aventura/As-Cronicas-de-Narnia.jpg'),
('Aventura', 'O Senhor dos Anéis', 'J.R.R. Tolkien', 'George Allen & Unwin', '1ª Edição', 1178, 'image/aventura/O-Senhor-dos-Aneis.jpg'),
('Aventura', 'O Conde de Monte Cristo', 'Alexandre Dumas', 'Charles Lévy', '1ª Edição', 1243, 'image/aventura/O-Conde-de-Monte-Cristo.jpg'),
('Aventura', 'O Vento nos Salgueiros', 'Kenneth Grahame', 'Methuen & Co.', '1ª Edição', 247, 'image/aventura/O-Vento-nos-Salgueiros.jpg'),
('Aventura', 'O Lobo da Estepe', 'Hermann Hesse', 'S. Fischer Verlag', '1ª Edição', 216, 'image/aventura/O-Lobo-da-Estepe.jpg'),
('Aventura', 'Moby Dick', 'Herman Melville', 'Richard Bentley', '1ª Edição', 635, 'image/aventura/Moby-Dick.jpg'),
('Aventura', 'A Cidade dos Deuses Selvagens', 'Isabel Allende', 'Sudamericana', '1ª Edição', 264, 'image/aventura/A-Cidade-dos-Deuses-Selvagens.jpg'),
('Aventura', 'O Sol é Para Todos', 'Harper Lee', 'J.B. Lippincott & Co.', '1ª Edição', 336, 'image/aventura/O-Sol-e-Para-Todos.jpg'),

('Biografia', 'A Longa Caminhada', 'Sławomir Rawicz', 'William Morrow', '1ª Edição', 288, 'image/biografia/A-Longa-Caminhada.jpg'),
('Biografia', 'Steve Jobs', 'Walter Isaacson', 'Simon & Schuster', '1ª Edição', 656, 'image/biografia/Steve-Jobs.jpg'),
('Biografia', 'O Diário de Anne Frank', 'Anne Frank', 'Contact Publishing', '1ª Edição', 283, 'image/biografia/O-Diario-de-Anne-Frank.jpg'),
('Biografia', 'A Vida de Pi', 'Yann Martel', 'Canongate Books', '1ª Edição', 319, 'image/biografia/A-Vida-de-Pi.jpg'),
('Biografia', 'Minha Luta', 'Karl Ove Knausgård', 'Farrar, Straus and Giroux', '1ª Edição', 400, 'image/biografia/Minha-Luta.jpg'),
('Biografia', 'Os Diários de Malala', 'Malala Yousafzai', 'Little, Brown and Company', '1ª Edição', 288, 'image/biografia/Os-Diarios-de-Malala.jpg'),
('Biografia', 'Eu Sou Malala', 'Malala Yousafzai', 'Weidenfeld & Nicolson', '1ª Edição', 288, 'image/biografia/Eu-Sou-Malala.jpg'),
('Biografia', 'A História do Mundo em 100 Objetos', 'Neil MacGregor', 'Viking Press', '1ª Edição', 688, 'image/biografia/A-Historia-do-Mundo-em-100-Objetos.jpg'),
('Biografia', 'O Mito da Beleza', 'Naomi Wolf', 'Doubleday', '1ª Edição', 368, 'image/biografia/O-Mito-da-Beleza.jpg'),
('Biografia', 'Os Sete Maridos de Evelyn Hugo', 'Taylor Jenkins Reid', 'Atria Books', '1ª Edição', 400, 'image/biografia/Os-Sete-Maridos-de-Evelyn-Hugo.jpg'),

('Infantil', 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'Reynal & Hitchcock', '1ª Edição', 96, 'image/infantil/O-Pequeno-Principe.jpg'),
('Infantil', 'Onde Vivem os Monstros', 'Maurice Sendak', 'Harper & Row', '1ª Edição', 48, 'image/infantil/Onde-Vivem-os-Monstros.jpg'),
('Infantil', 'A Fantástica Fábrica de Chocolate', 'Roald Dahl', 'Alfred A. Knopf', '1ª Edição', 160, 'image/infantil/A-Fantastica-Fabrica-de-Chocolate.jpg'),
('Infantil', 'Matilda', 'Roald Dahl', 'Jonathan Cape', '1ª Edição', 240, 'image/infantil/Matilda.jpg'),
('Infantil', 'Alice no País das Maravilhas', 'Lewis Carroll', 'Macmillan', '1ª Edição', 96, 'image/infantil/Alice-no-Pais-das-Maravilhas.jpg'),
('Infantil', 'Pipoca e a Grande Aventura', 'Ana Maria Machado', 'Fundaçao Nacional do Livro Infantil e Juvenil', '1ª Edição', 32, 'image/infantil/Pipoca-e-a-Grande-Aventura.jpg'),
('Infantil', 'A Menina que Roubava Livros', 'Markus Zusak', 'Knopf Publishing Group', '1ª Edição', 584, 'image/infantil/A-Menina-que-Roubava-Livros.jpg'),
('Infantil', 'O Jardim Secreto', 'Frances Hodgson Burnett', 'Heinemann', '1ª Edição', 331, 'image/infantil/O-Jardim-Secreto.jpg'),
('Infantil', 'O Bichinho da Seda', 'Robert Galbraith', 'Sphere', '1ª Edição', 450, 'image/infantil/O-Bichinho-da-Seda.jpg'),
('Infantil', 'O Mágico de Oz', 'L. Frank Baum', 'George M. Hill Company', '1ª Edição', 154, 'image/infantil/O-Magico-de-Oz.jpg'),

('História', 'Sapiens: Uma Breve História da Humanidade', 'Yuval Noah Harari', 'Harvill Secker', '1ª Edição', 464, 'image/historia/Sapiens-uma-Breve-Historia-da-Humanidade.jpg'),
('História', 'História do Mundo em 12 Mapas', 'Jerry Brotton', 'Viking', '1ª Edição', 256, 'image/historia/Historia-do-Mundo-em-12-Mapas.jpg'),
('História', 'O Mundo de Ontem', 'Stefan Zweig', 'Viking Press', '1ª Edição', 287, 'image/historia/O-Mundo-de-Ontem.jpg'),
('História', 'A Segunda Guerra Mundial', 'Antony Beevor', 'Little, Brown and Company', '1ª Edição', 896, 'image/historia/A-Segunda-Guerra-Mundial.jpg'),
('História', 'A História da Arte', 'E.H. Gombrich', 'Phaidon Press', '1ª Edição', 680, 'image/historia/A-Historia-da-Arte.jpg'),
('História', 'O Povo Brasileiro', 'Darcy Ribeiro', 'Companhia das Letras', '1ª Edição', 696, 'image/historia/O-Povo-Brasileiro.jpg'),
('História', 'A Revolução dos Bichos', 'George Orwell', 'Secker & Warburg',





";

// Executar a instrução SQL
$pdo->exec($sql);

echo "Livros inseridos com sucesso.";
