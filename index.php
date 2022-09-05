<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>bookstore</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <script src="script.js"></script>
</head>

<body>
  <header>
      <aside>
          <form action="">
              <div class="form-group">
                  <label for="txt_email"> e-mail </label>
                  <input type="email" name="txt_email" 
                    id="txt_email" class="form-control">
              </div>
              <div class="form-group">
                  <label for="txt_senha"> e-mail </label>
                  <input type="password" name="txt_senha" 
                    id="txt_senha" class="form-control">
              </div>
                  <a href="#"> Esqueci a senha </a>
              <div>
                  <input type="submit" value="Login"
                    class="btn btn-primary">
                  <a href="#" class="btn btn-primary">
                    Cadastre-se </a>
              </div>
          </form>
      </aside>
    <h1> 
        <?= "Books"; ?>
    </h1>
    <h2> 
        <?php
        echo "Os mais diversos mundos em só lugar";
        ?>
    </h2>
  </header>
  <main>
      <form action="ws/salvar-livro.php" 
          class="form-inline justify-content-center">
          <div>
              <input type="text" name="txt_livro"
                id="txt_livro" class="form-control">
              <input type="button" value="Salvar"
                class="btn btn-primary"
                onclick="criarLivro()">
          </div>
      </form>
    <section id="sessaoDeLivros">
        <?php 
        require_once "Conexao.php";
        $sql = "SELECT * FROM book;";
        if (!Conexao::execWithReturn($sql)){
            echo Conexao::getErro();
            print_r(Conexao::getData());  
            exit(1);
        }
        
        //print_r(Conexao::getData());

        foreach(Conexao::getData() as $livro):
        ?>
        <article>
            <div>
                <img src="aselecao.jpg" alt="Foto do livro">
            </div>
            <div class="livro-dados">
                <h3> Livro: <span> 
                <?= $livro ["nome"] ?> </span> </h3>
                <h3> Páginas: <span> <?= $livro ["paginas"] ?> </span> </h3>
                <h3> Autora: <span> <?= $livro ["autor"] ?> </span> </h3>
            </div>
            <div>
                <div class="marcador">
                    <span class="material-icons"> book </span>
                    <span class="contador"> 12 </span>
                </div>
              <div class="marcador">
                    <span class="material-icons"> favorite </span>
                    <span class="contador"> 12 </span>
              </div>
            </div>
        
        </article>
        <?php endforeach; ?>
    </section>
    
  </main>
  

 
  <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 
</body>

</html>