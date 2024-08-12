<!-- Arquivo responsável pelo gerenciamento das operações CRUD e requisições POST -->

<?php
session_start(); // Inicia a sessão para gerenciar dados de sessão.
require 'dbcon.php'; // Inclui o arquivo de conexão com o banco de dados.

// Exclui um aluno do banco de dados
if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']); // Obtém o ID do aluno a ser excluído.

    $query = "DELETE FROM students WHERE id='$student_id' "; // Query para deletar o aluno
    $query_run = mysqli_query($con, $query);

    // Verifica se a query foi executada com sucesso
    if($query_run)
    {
        $_SESSION['message'] = "Aluno deletado com sucesso!"; // Define mensagem de sucesso na sessão.
        header("Location: index.php"); // Redireciona de volta para a página inicial.
        exit(0); // Encerra o script após o redirecionamento.
    }
    else
    {
        $_SESSION['message'] = "A operação falhou!";
        header("Location: index.php");
        exit(0);
    }
}

// Atualiza os dados de um aluno no banco de dados
if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    // Obtém os novos dados do aluno a partir dos inputs do formulário
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $monthly = mysqli_real_escape_string($con, $_POST['monthly']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $notes = mysqli_real_escape_string($con, $_POST['notes']);  

    // Query para atualizar os dados do aluno
    $query = "UPDATE students SET name='$name', email='$email', phone='$phone',
    monthly='$monthly', password='$password', status='$status', notes='$notes' 
                WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Aluno atualizado com sucesso!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "O registro do aluno falhou!";
        header("Location: index.php");
        exit(0); 
    }
}

// Registra um novo aluno no banco de dados
if(isset($_POST['save_student']))
{
    // Obtém os dados do novo aluno a partir dos inputs do formulário
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $monthly = mysqli_real_escape_string($con, $_POST['monthly']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $notes = mysqli_real_escape_string($con, $_POST['notes']);

    // Query para inserir um novo aluno no banco de dados
    $query = "INSERT INTO students (name,email,phone,monthly,password,status,notes) VALUES 
        ('$name','$email','$phone','$monthly','$password','$status','$notes')";

    $query_run = mysqli_query($con, $query); // Executa a query no banco de dados.
    
    // Verifica se a query foi executada com sucesso
    if($query_run)
    {
        $_SESSION['message'] = "Aluno registrado com sucesso!";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "O cadastro do aluno falhou!";
        header("Location: student-create.php");
        exit(0); 
    }
}

?>