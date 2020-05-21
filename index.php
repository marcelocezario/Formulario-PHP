<?php

include 'header.php';
if (isset($_GET['envio'])) {
    if ($_GET['envio'] == 'ok') {
?>
        <div class="alert alert-success" role="alert">
            <div class="container">
                E-mail enviado com sucesso!
            </div>
        </div>
<?php
    }
}
include 'formulario.php';
include 'footer.php';
?>