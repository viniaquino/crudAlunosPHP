<!-- Registrar aluno. -->

<?php
session_start(); // Inicia a sessão para gerenciar dados de sessão.
?>

<?php include('includes/header.php'); // Inclui o cabeçalho da página. ?> 
    
    <div class="container mt-5 ms-1">

        <?php include('message.php'); // Inclui mensagens de feedback. ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar aluno
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a> 
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Nome do aluno:</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Telefone:</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Mensalidade:</label>
                                <input type="text" name="monthly" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Senha:</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Observação</label>
                                <input type="text" name="notes" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary">Salvar aluno</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); // Inclui o rodapé da página. ?> 