    <div class="avaliacao-estrelas" data-id="<?= $id ?>" data-avaliation="<?= $avaliation ?>" style="font-size: <?= $tamanhoEstrela ?>px;">
        <?php 
        // Renderiza estrelas cheias
        for ($i = 1; $i <= $estrelasInteiras; $i++): ?>
            <span class="estrela" style="color: #FFC739;">&#9733;</span> <!-- Estrela cheia -->
        <?php endfor; ?>

        <?php 
        // Renderiza meia estrela, se houver
        if ($estrelaMeia): ?>
            <span class="estrela meia" style="background: linear-gradient(90deg, #FFC739 50%, #CCC 50%); -webkit-background-clip: text; color: transparent;">&#9733;</span> <!-- Estrela parcial -->
        <?php endif; ?>

        <?php 
        // Renderiza estrelas vazias
        for ($i = 1; $i <= $estrelasVazias; $i++): ?>
            <span class="estrela" style="color: #CCC;">&#9733;</span> <!-- Estrela vazia -->
        <?php endfor; ?>
    </div>
