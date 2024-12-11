<?php

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [])
{
    extract($data);

    return require "app/views/{$name}.view.php";
}

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}

function renderizarEstrelas($id, $tamanhoEstrela, $avaliation) {
    // Calcula as partes da avaliação
    $estrelasInteiras = floor($avaliation); // Número de estrelas inteiras
    $estrelaMeia = ($avaliation - $estrelasInteiras) >= 0.5 ? 1 : 0; // Meia estrela se a parte decimal for >= 0.5
    $estrelasVazias = 5 - $estrelasInteiras - $estrelaMeia; // Estrelas vazias

    // Compacta os dados para o HTML
    $dados = compact('id', 'tamanhoEstrela', 'avaliation', 'estrelasInteiras', 'estrelaMeia', 'estrelasVazias');
    extract($dados);

    // Renderiza o arquivo de estrelas
    return require __DIR__ . '/../app/views/site/estrelas.php';
}



