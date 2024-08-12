<!-- Editar aluno -->

<?php
session_start();
require 'dbcon.php'; // Inclui o cabeçalho da página
?>

<?php include('includes/header.php'); // Inclui o cabeçalho da página ?> 
    
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar aluno
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']); // Escapa o ID do aluno para prevenir SQL injection
                            $query = "SELECT * FROM students WHERE id='$student_id' "; // Query para selecionar dados do aluno pelo ID
                            $query_run = mysqli_query($con, $query); // Executa a query

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run); // Obtém os dados do aluno como um array
                                ?>

                                <!-- Formulário para editar os dados do aluno -->

                                <form action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $student_id ?>">

                                    <div class="mb-3">
                                        <label>Nome do aluno:</label>
                                        <input type="text" name="name" value="<?=$student['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email:</label>
                                        <input type="email" name="email" value="<?=$student['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Telefone:</label>
                                        <input type="text" name="phone" value="<?=$student['phone'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Mensalidade:</label>
                                        <input type="text" name="monthly" value="<?=$student['monthly'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Senha:</label>
                                        <input type="password" name="password" value="<?=$student['password'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Observação</label>
                                        <input type="text" name="notes" value="<?=$student['notes'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">Editar aluno</button>
                                    </div>
                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>Id não encontrado</h4>"; // Exibe mensagem se o ID não existir no banco de dados
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); // Inclui o rodapé da página ?>
