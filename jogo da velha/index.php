<?php
require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/validators.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/states.php';

do{
    $jogadores = pegarNomeJogadores();
    $jogador = JOGADOR1;
    $tabuleiro = construirTabuleiro();
    $vencedor = null;

    while($vencedor === null) {
        echo mostrarTabuleiro($tabuleiro);
        $posicao = (int) readline("\nPlayer {$jogador}, digite a sua posição: ");

        if(!localizarPosicaoCorreta($posicao, $tabuleiro)){
            continue;
        }

        $tabuleiro[$posicao] = $jogador;

        if(validarCampos($tabuleiro, JOGADOR1)){
            $vencedor = JOGADOR1;
        } elseif(validarCampos($tabuleiro, JOGADOR2)){
            $vencedor = JOGADOR2;
        } else{
            $vencedor = null;
        }

        if(validarTabuleiroCheio($tabuleiro)){
            break;
        }

        $jogador = trocarJogador($jogador);
    }
    
    echo mostrarTabuleiro($tabuleiro);
    echo mostrarResultado($vencedor, $jogadores);

    $jogarNovamente = jogarNovamente();

    echo "\n";

} while($jogarNovamente === true);
?>