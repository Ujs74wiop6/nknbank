<?php session_start();

include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$datanascimento = mysqli_real_escape_string($conexao, strtotime($_POST['datanascimento']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$whatsapp = mysqli_real_escape_string($conexao, trim($_POST['whatsapp']));

$datanascimento = date('Y-m-d', $datanascimento);

$hoje = date('Y-m-d');

$diff_anos = date_diff(date_create($datanascimento), date_create($hoje))->y;

if ($diff_anos < 18){
    $conexao -> close();

    $_SESSION['erro_idade'] = true;

    header('Location: cadastrar.php');
    exit();
} else {
    $sql_email = "SELECT COUNT(*) AS TOTAL FROM LeadBank WHERE email = '$email';";
    $rs_email = mysqli_query($conexao, $sql_email);
    $row_email = mysqli_fetch_assoc($rs_email);

    if ($row_email['TOTAL'] == 1){
        $conexao -> close();

        $_SESSION['erro_email'] = true;

        header('Location: cadastrar.php');
        exit();
    } else {
        $sql_insert = "INSERT INTO LeadBank (nome, datanascimento, email, senha, whatsapp, datalog) VALUES ('$nome', '$datanascimento', '$email', '$senha', '$whatsapp', NOW());";

        if ($conexao -> query($sql_insert) === TRUE){
            $_SESSION['cadastro_sucesso'] = true;

            // Os códigos comentados abaixo permitem o envio de um e-mail de validação final. Configure seu servidor local de email para que funcione corretamente.

            /*
            $enviarSucesso = $email;
            $assuntoSucesso = 'Cadastro concluído com sucesso!';
            $mensagemSucesso = "Olá, seu cadastro foi concluído com sucesso!\n\nEquipe do NKN Bank.";
            $cabecalhoSucesso = 'De: nkn@bank.com' . "\r\n" .
                        'Reply-To: nkn@bank.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

            mail($enviarSucesso, $assuntoSucesso, $mensagemSucesso, $cabecalhoSucesso)
            */

        } else {
            $_SESSION['erro'] = true;
        }

        $conexao -> close();

        header('Location: cadastrar.php');
        exit();
    }
}