<?php

// config.php
$value = getenv('BOOK-FLIX');
if ($value === false) {
    // A variável de ambiente não foi encontrada
    throw new Exception('A variável de ambiente BOOK-FLIX não está definida.');
}

// Você pode usar a variável em todo o seu projeto
echo $value; // Deve imprimir I9JU23NF394R6HH

?>
