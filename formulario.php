<form class="container" method="post" action="processa_mensagem.php">
    <div class="form-group col-md-6">
        <br><br>
        <label for="email">Qual o seu endereço de e-mail?</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="name@example.com">

        <label for="nome">Qual o seu nome?</label>
        <input type="text" class="form-control" name="nome" placeholder="Digite o seu nome">

        <label for="assunto">Qual o assunto da sua mensagem?</label>
        <input type="text" class="form-control" name="assunto" placeholder="Digite o assunto">

        <label for="mensagem">Qual a sua mensagem?</label>
        <textarea class="form-control" name="mensagem" rows="3"></textarea>

        <input type="submit" value="Enviar mensagem">

        <br><br>

    </div>

</form>