<?php 
    if(isset($_POST['submit'])){
        include_once('../config/config.php');

        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
        $curso = mysqli_real_escape_string($conexao, $_POST['curso']);

        $query = "INSERT INTO aluno (nome, email, telefone, curso) VALUES('$nome', '$email', '$telefone', '$curso')";
        $resultado = mysqli_query($conexao, $query);

        if ($resultado){
             echo "<script language='javascript' type='text/javascript'>
                     alert('Você foi matriculado com sucesso');
                     window.location.href='../public/index.php';
                   </script>";
        } else {
             echo "Erro de matricula! Tente novamente! " . mysqli_error($conexao);
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="../public/css/cadastro.css">
</head>
<body>

    <header>
        <h1>Formulário de Cadastro</h1>
    </header>
    <section class="form-section">
        <form action="cadastro.php" method="POST">
            <div class="form-item">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-item">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-item">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required>
            </div>
            <div class="form-item">
                <span>Escolha o Curso:</span>
                <label>
                    <input type="radio" name="curso" value="curso1" required> Curso de Segurança Básica
                </label>
                <label>
                    <input type="radio" name="curso" value="curso2" required> LUCKyHAT
                </label>
            </div>
            <div class="form-item">
                <button type="submit" name="submit">Enviar</button>
            </div>
        </form>
    </section>

</body>
</html>
