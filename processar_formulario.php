<?php

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Define as variáveis para cada campo
    $nome = $_POST['nome'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $dono = $_POST['dono'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $servico = $_POST['servico'];
    $mensagem = $_POST['mensagem'];

    // Validação de dados (pode ser mais robusta dependendo do caso)
    if (empty($nome) || empty($raca) || empty($idade) || empty($dono) || empty($telefone) || empty($email) || empty($servico)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
        exit;
    }

    // Cria uma mensagem de e-mail com os dados do formulário
    $assunto = "Formulário de Atendimento Pet Shop";
    $mensagem_email = "Nome do Pet: $nome\n";
    $mensagem_email .= "Raça: $raca\n";
    $mensagem_email .= "Idade: $idade\n";
    $mensagem_email .= "Nome do Dono: $dono\n";
    $mensagem_email .= "Telefone: $telefone\n";
    $mensagem_email .= "E-mail: $email\n";
    $mensagem_email .= "Serviços Desejados: $servico\n";
    $mensagem_email .= "Mensagem Adicional: $mensagem\n";

    // Envia o e-mail (este exemplo usa a função mail do PHP, mas pode ser substituída por uma biblioteca mais avançada)
    $para = "atendimento@petshop.com.br"; // Endereço de e-mail do destinatário
    $cabecalho = "From: $email";
    if (mail($para, $assunto, $mensagem_email, $cabecalho)) {
        echo "Obrigado por entrar em contato! Sua mensagem foi enviada com sucesso.";
    } else {
        echo "Ocorreu um erro ao enviar sua mensagem. Por favor, tente novamente mais tarde.";
    }

} else {
    // Se o formulário não foi enviado, redireciona para a página do formulário
    header("Location: formulario.php");
    exit;
}