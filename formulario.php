<script type="text/javascript">
    function validar() {
        var nome = formulario.nome.value;
        var assunto = formulario.assunto.value;
        var mensagem = formulario.mensagem.value;

        if(nome == "" || assunto == "" || mensagem == ""){
            alert("Preencha todos os campos.");
            formulario.nome.focus();
            return false;
        }
    }
</script>


<form name="formulario" class="container" method="post" action="processa_mensagem.php">
    <div class="form-group col-md-6">
        <br>
        <label for="nome">Qual o seu nome?</label>
        <input type="text" class="form-control" name="nome" placeholder="Digite o seu nome">

        <label for="assunto">Qual o assunto da sua mensagem?</label>
        <input type="text" class="form-control" name="assunto" placeholder="Digite o assunto">

        <label for="mensagem">Qual a sua mensagem?</label>
        <textarea class="form-control" name="mensagem" rows="3" placeholder="Digite sua mensagem"></textarea>

        <input type="submit" value="Enviar mensagem" onclick="return validar()">

        <br><br>

    </div>

</form>