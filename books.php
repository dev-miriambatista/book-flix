
<?php
// Dados dos livros por gênero
$books = [
    1 => ["Duna - Frank Herbert", "Neuromancer - William Gibson", "Fundação - Isaac Asimov", "O Guia do Mochileiro das Galáxias - Douglas Adams", "Hyperion - Dan Simmons", "A Guerra dos Tronos - George R. R. Martin", "O Senhor dos Anéis - J.R.R. Tolkien"],
    2 => ["O Nome do Vento - Patrick Rothfuss", "Harry Potter e a Pedra Filosofal - J.K. Rowling", "Crônicas de Nárnia - C.S. Lewis", "O Hobbit - J.R.R. Tolkien", "Mistborn - Brandon Sanderson", "O Ciclo da Herança - Christopher Paolini", "O Senhor dos Anéis - J.R.R. Tolkien"],
    3 => ["Orgulho e Preconceito - Jane Austen", "A Culpa é das Estrelas - John Green", "O Morro dos Ventos Uivantes - Emily Brontë", "A Menina que Roubava Livros - Markus Zusak", "Pride and Prejudice - Jane Austen", "O Sol é para Todos - Harper Lee", "O Diário de uma Paixão - Nicholas Sparks"],
    4 => ["O Código Da Vinci - Dan Brown", "Sherlock Holmes - Arthur Conan Doyle", "Assassinato no Expresso Oriente - Agatha Christie", "O Silêncio dos Inocentes - Thomas Harris", "A Garota no Trem - Paula Hawkins", "O Homem de Giz - C.J. Tudor", "O Caso dos Dez Negrinhos - Agatha Christie"],
    5 => ["A Garota no Trem - Paula Hawkins", "O Silêncio dos Inocentes - Thomas Harris", "A Menina que Roubava Livros - Markus Zusak", "A Última Festa - Liv Constantine", "A Verdade Sobre o Caso Harry Quebert - Joel Dicker", "O Segredo do Vale - Robyn Carr", "O Homem de Giz - C.J. Tudor"],
    6 => ["A Vida de Steve Jobs - Walter Isaacson", "Eu Sei Por Que Canta o Pássaro Cativo - Maya Angelou", "O Diário de Anne Frank - Anne Frank", "O Que é História - Edson Nery da Fonseca", "A História do Mundo para Quem Tem Pressa - Emma Marriott", "O Lado Bom da Vida - Matthew Quick", "Steve Jobs - Walter Isaacson"],
    7 => ["O Nome da Rosa - Umberto Eco", "Cem Anos de Solidão - Gabriel García Márquez", "O Senhor dos Anéis - J.R.R. Tolkien", "A Revolução dos Bichos - George Orwell", "Os Miseráveis - Victor Hugo", "Guerra e Paz - Liev Tolstói", "A Caverna - José Saramago"],
    8 => ["O Iluminado - Stephen King", "Drácula - Bram Stoker", "Frankenstein - Mary Shelley", "A Coisa - Stephen King", "O Exorcista - William Peter Blatty", "A Assombração da Casa da Colina - Shirley Jackson", "O Enigma de Outro Mundo - John Carpenter"],
    9 => ["Como Fazer Amigos e Influenciar Pessoas - Dale Carnegie", "O Poder do Hábito - Charles Duhigg", "A Mágica da Arrumação - Marie Kondo", "Inteligência Emocional - Daniel Goleman", "Mindset - Carol S. Dweck", "O Segredo - Rhonda Byrne", "Os 7 Hábitos das Pessoas Altamente Eficazes - Stephen R. Covey"],
    10 => ["O Lobo de Wall Street - Jordan Belfort", "O Alquimista - Paulo Coelho", "A Vida Secreta das Abelhas - Sue Monk Kidd", "O Caçador de Pipas - Khaled Hosseini", "O Mínimo que Você Precisa Saber para Não Ser um Idiota - Olavo de Carvalho", "A Arte da Felicidade - Dalai Lama", "A Verdade Sobre o Caso Harry Quebert - Joel Dicker"]
];

$genreId = isset($_GET['genre']) ? (int)$_GET['genre'] : 0;

if (array_key_exists($genreId, $books)) {
    header('Content-Type: application/json');
    echo json_encode($books[$genreId]);
} else {
    echo json_encode([]);
}
