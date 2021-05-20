<?php
    //Contrução do tabuleiro. 
    function construirTabuleiro(): array{
        return[
            CAMPO_VAZIO, CAMPO_VAZIO, CAMPO_VAZIO,
            CAMPO_VAZIO, CAMPO_VAZIO, CAMPO_VAZIO,
            CAMPO_VAZIO, CAMPO_VAZIO, CAMPO_VAZIO,
        ];
    }

    //Jogar novamente.
    function jogarNovamente(): bool{
        $result = readline("\nGostaria de jogar novamente? (s/n): ");
        return  $result === 's'? true : false;
    }

    //Localizar posição no tabuleiro.
    function localizarPosicaoCorreta(int $posicao, array $tabuleiro): bool{
        if(!in_array($posicao, [0, 1, 2, 3, 4, 5, 6, 7, 8])) {
            echo "\nPosição inexistente, digite novamente.\n";
            return false;
        } elseif($tabuleiro[$posicao] !== CAMPO_VAZIO) {
            echo "\nPosição ocupada, digite novamente.\n";
            return false;
        }
        return true;
    }

    //Mostrar resultado final.
    function mostrarResultado(string $vencedor, array $jogadores): string{
        if($vencedor === JOGADOR1){
            return "\nVencedor: {$jogadores[0]}.\n";
        } elseif($vencedor === JOGADOR2){
            return "\nVencedor: {$jogadores[1]}.\n";
        } else{
            return "\nPartida empatada!\n";
        }
    }

    //Mostrar o tabuleiro.
    function mostrarTabuleiro(array $tabuleiro): string{
        return <<< EOL
        Posições: | Tabuleiro
                  |
          0|1|2   |   $tabuleiro[0]|$tabuleiro[1]|$tabuleiro[2]
          3|4|5   |   $tabuleiro[3]|$tabuleiro[4]|$tabuleiro[5]
          6|7|8   |   $tabuleiro[6]|$tabuleiro[7]|$tabuleiro[8]
       EOL;
    }

    //Pegar nome dos jogadores.
    function pegarNomeJogadores(): array{
        return[
            readline('Jogador 1 (' . JOGADOR1 . ') - Digite o seu nome: '),
            readline('Jogador 2 (' . JOGADOR2 . ') - Digite o seu nome: '),
        ];
    }

    //Trocar a vez entre os jogadores.
    function trocarJogador(string $jogador): string{
        return $jogador === JOGADOR1 ? JOGADOR2 : JOGADOR1;
    }   
?>