<?php include('layouts/header.php'); ?>

<main class="container mt-5">
    <h1>Resultado do Seu Signo</h1>

    <?php
    function getSigno($dia, $mes) {
        // Carrega o XML
        $xml = simplexml_load_file('signos.xml');

        foreach ($xml->signo as $signo) {
            list($inicioDia, $inicioMes) = explode('/', $signo->dataInicio);
            list($fimDia, $fimMes) = explode('/', $signo->dataFim);

            if (($mes == $inicioMes && $dia >= $inicioDia) || ($mes == $fimMes && $dia <= $fimDia)) {
                return [
                    'nome' => (string)$signo->signoNome,
                    'descricao' => (string)$signo->descricao
                ];
            }
        }
        return null;
    }

    // Verifica se a data foi enviada via POST
    if (isset($_POST['data_nascimento']) && !empty($_POST['data_nascimento'])) {
        $data_nascimento = $_POST['data_nascimento'];
        $data = explode('-', $data_nascimento);
        $dia = $data[2]; 
        $mes = $data[1]; 


        $signo_info = getSigno($dia, $mes);

        if ($signo_info) {
            echo "<h2>Seu signo é: {$signo_info['nome']}</h2>";
            echo "<p>{$signo_info['descricao']}</p>";
        } else {
            echo "<p>Signo não encontrado. Verifique a data inserida.</p>";
        }
    } else {
        echo "<p>Por favor, insira sua data de nascimento.</p>";
    }
    ?>
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</main>

<?php include('layouts/footer.php'); ?>
