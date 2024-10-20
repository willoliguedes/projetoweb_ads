<?php include('layouts/header.php'); ?>

<main class="container mt-5">
    <h1>Resultado do Seu Signo</h1>

    <?php
    // Função para obter o signo a partir da data de nascimento
    function getSigno($dia, $mes) {
        $signos = [
            ['Áries', 21, 3, 20, 4],
            ['Touro', 21, 4, 20, 5],
            ['Gêmeos', 21, 5, 20, 6],
            ['Câncer', 21, 6, 22, 7],
            ['Leão', 23, 7, 22, 8],
            ['Virgem', 23, 8, 22, 9],
            ['Libra', 23, 9, 22, 10],
            ['Escorpião', 23, 10, 21, 11],
            ['Sagitário', 22, 11, 21, 12],
            ['Capricórnio', 22, 12, 19, 1],
            ['Aquário', 20, 1, 18, 2],
            ['Peixes', 19, 2, 20, 3],
        ];

        foreach ($signos as $signo) {
            list($nome, $inicioDia, $inicioMes, $fimDia, $fimMes) = $signo;
            if (($mes == $inicioMes && $dia >= $inicioDia) || ($mes == $fimMes && $dia <= $fimDia)) {
                return $nome;
            }
        }
        return 'Signo não encontrado';
    }

    // Verifica se a data foi enviada via POST
    if (isset($_POST['data_nascimento']) && !empty($_POST['data_nascimento'])) {
        $data_nascimento = $_POST['data_nascimento'];
        // Divide a data para obter o dia, mês e ano
        $data = explode('-', $data_nascimento);
        $dia = $data[2]; // Dia
        $mes = $data[1]; // Mês

        // Obtém o signo chamando a função
        $signo = getSigno($dia, $mes);

        // Exibe o resultado
        echo "<h2>Seu signo é: $signo</h2>";
    } else {
        echo "<p>Por favor, insira sua data de nascimento.</p>";
    }
    ?>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</main>

<?php include('layouts/footer.php'); ?>
