<!-- Tela inicial -->

<?php
    session_start(); //Inicia a sessão para gerenciar dados.
    require 'dbcon.php'; // Inclui o arquivo de conexão com o banco de dados.

    // Verifica se o form foi submetido para atualizar o status
    if(isset($_POST['update_status'])) {
        $student_id = $_POST['student_id']; // Obtém o ID do aluno a ser atualizado.
        $status = $_POST['status']; // Obtém o novo status do aluno.

        // Atualiza o status do aluno no banco de dados
        $query = "UPDATE students SET status = '$status' WHERE id = '$student_id'";
        $query_run = mysqli_query($con, $query);

        // Verifica se a consulta foi executada com sucesso.
        if($query_run) {
            $_SESSION['success'] = "Status do aluno atualizado com sucesso!";
        } else {
            $_SESSION['status'] = "Erro ao atualizar o status do aluno.";
        }
    }
?>

<?php include('includes/header.php'); // Inclui o cabeçalho da página. ?>

<?php include('includes/style.php'); // Inclui o estilo da página. ?>


    <div class="container mt-4">
        <?php include('message.php'); // Inclui mensagens de feedback. ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Detalhes dos alunos
                            <a href="student-create.php" class="btn btn-primary float-end">Adicionar aluno</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do aluno</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Mensalidade</th>
                                    <th>Senha</th>
                                    <th>Situação</th>
                                    <th>Observação</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Consulta todos os alunos no banco de dados através da função MySQL Improved.
                                    $query = "SELECT * FROM students";
                                    $query_run = mysqli_query($con, $query);
                                   
                                    // Verifica se há alunos retornados pela consulta.
                                    if(mysqli_num_rows($query_run) > 0) {
                                        foreach($query_run as $student) {
                                            ?> 
                                            <tr>
                                                <td><?= $student['id']; ?></td>
                                                <td><?= $student['name']; ?></td>
                                                <td><?= $student['email']; ?></td>
                                                <td class="phone-column"><?= $student['phone']; ?></td>
                                                <td><?= 'R$ ' . number_format($student['monthly'], 2, ',', '.'); ?></td>
                                                <td><?= $student['password']; ?></td>
                                                <td>
                                                    <form action="index.php" method="POST">
                                                        <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                                                        <input type="radio" name="status" value="ativo" <?= ($student['status'] == 'ativo') ? 'checked' : ''; ?>> Ativo
                                                        <input type="radio" name="status" value="inativo" <?= ($student['status'] == 'inativo') ? 'checked' : ''; ?>> Inativo
                                                        <button type="submit" name="update_status" class="btn btn-primary btn-sm">Salvar</button>
                                                    </form>
                                                </td>
                                                <td><?= $student['notes']; ?></td>
                                                <td>
                                                    <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">Visualizar</a>
                                                    <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?= $student['id']; ?>" class="btn btn-danger btn-sm">Deletar</button>
                                                    </form> 
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<h5> No record found </h5>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
<?php include('includes/footer.php'); // Inclui o rodapé da página. ?>
