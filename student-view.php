<!-- Visualizar aluno -->

<?php
require 'dbcon.php'; //Inclui o arquivo de conexão com o banco de dados
?>

<?php include('includes/header.php'); ?> <?//Inclui o cabeçalho da página ?>
    
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Visualizar aluno
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
                                
                                <!-- Exibe os detalhes do aluno -->

                                <div class="mb-3">
                                    <label>Nome do aluno:</label>
                                    <p class="form-control">
                                        <?=$student['name'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Email:</label>
                                    <p class="form-control">
                                        <?=$student['email'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                 <label>Telefone:</label>
                                    <p class="form-control">
                                        <?=$student['phone'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Mensalidade:</label>
                                    <p class="form-control">
                                        <?=$student['monthly'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Senha:</label>
                                    <p class="form-control">
                                        <?=$student['password'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                <label>Situação:</label>
                                    <p class="form-control">
                                        <?= htmlspecialchars(ucfirst($student['status'])); // Exibe "Ativo" ou "Inativo" com a primeira letra maiúscula ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Observação</label>
                                    <p class="form-control">
                                        <?=$student['notes'];?>
                                    </p>
                                </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>Id não encontrado</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?> <?// Inclui o rodapé da página