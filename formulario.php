<?php
$email = '';
$nome = '';
$assunto = '';
$mensagem = '';


if (isset($_GET['envio'])) {
    if ($_GET['envio'] == 'sucess') {
?>
        <div class="alert alert-success" role="alert">
            <div class="container">
                Mensagem enviada com sucesso!
            </div>
        </div>
    <?php
    } elseif ($_GET['envio'] == 'error') {
        $email = $_GET['email'];
        $nome = $_GET['nome'];
        $assunto = $_GET['assunto'];
        $mensagem = $_GET['mensagem'];
    ?>
        <div class="alert alert-danger" role="alert">
            <div class="container">
                Houve um problema ao enviar sua mensagem, por favor tente novamente!
            </div>
        </div>
<?php
    }
}
?>

<script type="text/javascript">
    function validar() {
        var email = formulario.email.value;
        var nome = formulario.nome.value;
        var assunto = formulario.assunto.value;
        var mensagem = formulario.mensagem.value;

        if (email == "" || nome == "" || assunto == "" || mensagem == "") {
            alert("Preencha todos os campos.");
            formulario.nome.focus();
            return false;
        }
    }
</script>


<form name="formulario" class="container" method="post" action="processa_mensagem.php">
    <div class="form-group col-md-6">
        <br>
        <label for="email">Qual o seu e-mail?</label>
        <input type="email" class="form-control" name="email" placeholder="exemplo@mail.com" value="<?php echo $email;?>">

        <label for="nome">Qual o seu nome?</label>
        <input type="text" class="form-control" name="nome" placeholder="Digite o seu nome" value="<?php echo $nome;?>">

        <label for="assunto">Qual o assunto da sua mensagem?</label>
        <input type="text" class="form-control" name="assunto" placeholder="Digite o assunto" value="<?php echo $assunto;?>">

        <label for="mensagem">Qual a sua mensagem?</label>
        <textarea class="form-control" name="mensagem" rows="3" placeholder="Digite sua mensagem"><?php echo $mensagem;?></textarea>

        <input type="submit" value="Enviar mensagem" onclick="return validar()">

        <br><br>

    </div>

</form>