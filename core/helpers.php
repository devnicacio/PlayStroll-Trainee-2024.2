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

// Função para formatar a data no padrão brasileiro (dd/mm/yyyy)
function formatarDataBrasileira($data) {
    if ($data) {
        return (new DateTime($data))->format('d-m-Y');
    }
    return null; // Retorna nulo se a data for vazia ou inválida
}
function limitTextTwo($text, $maxWidthPercentage = 70, $maxLines = 5, $charsPerLine = 50) {
    // Calcula o número máximo de caracteres com base no número de linhas e caracteres por linha
    $maxChars = $maxLines * $charsPerLine;

    // Trunca o texto se exceder o número máximo de caracteres
    if (strlen($text) > $maxChars) {
        $text = substr($text, 0, $maxChars) . '...'; // Adiciona "..." no final
    }

    return $text;
}


?>




