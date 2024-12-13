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

// Função para limitar o conteúdo de texto, mantendo algumas tags HTML
function limitText($content, $maxWords = 30, $allowedTags = '<p><strong>') {
    // Remove tags HTML indesejadas, mantendo <strong> e <p> (adapte conforme necessário)
    $filteredContent = strip_tags($content, $allowedTags);

    // Limitar o número de palavras
    $words = explode(' ', $filteredContent);
    $limitedContent = implode(' ', array_slice($words, 0, $maxWords));

    // Adicionar reticências se o texto for truncado
    if (count($words) > $maxWords) {
        $limitedContent .= '...';
    }

    return $limitedContent;
}


function limitTextToLines($content, $maxLines = 3, $maxCharsPerLine = 40, $allowedTags = '<p><strong>') {
    // Remove tags HTML indesejadas, mantendo as permitidas
    $filteredContent = strip_tags($content, $allowedTags);

    // Dividir o texto em palavras
    $words = explode(' ', $filteredContent);
    $lines = [];
    $currentLine = '';

    foreach ($words as $word) {
        // Adicionar a palavra à linha atual, se não ultrapassar o limite de caracteres
        if (strlen($currentLine . ' ' . $word) <= $maxCharsPerLine) {
            $currentLine .= ($currentLine === '' ? '' : ' ') . $word;
        } else {
            // Se ultrapassar o limite, mover para a próxima linha
            $lines[] = $currentLine;
            $currentLine = $word;

            // Parar se atingir o número máximo de linhas
            if (count($lines) >= $maxLines) {
                break;
            }
        }
    }

    // Adicionar a última linha ao array, se não estiver vazia
    if (!empty($currentLine) && count($lines) < $maxLines) {
        $lines[] = $currentLine;
    }

    // Montar o texto limitado
    $limitedContent = implode("\n", $lines);

    // Adicionar reticências se o texto foi truncado
    if (count($lines) >= $maxLines && strlen($currentLine) >= $maxCharsPerLine) {
        $limitedContent .= '...';
    }

    return $limitedContent;
}

?>




