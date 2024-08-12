<!-- Mensagem de alerta após uma operação -->

<?php
    if(isset($_SESSION['message'])) : // Verifica se existe uma mensagem na sessão para exibir.
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Feito!</strong> <?= $_SESSION['message']; ?> <!-- Exibe a mensagem armazenada na sessão. -->
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php 
    unset($_SESSION['message']); // Limpa a variável de sessão após exibir a mensagem.
    endif; // Finaliza a verificação da existência da mensagem na sessão.
?>