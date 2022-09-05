<?php

require_once "../Conexao";

$nome_livro = $_GET["txt_livro"];

$sql = "INSERT INTO public.book
      (nome, páginas, autor)
      VALUES('$nome_livro', 300, '???');";

Conexao::exec($sql);

header("location: ../index.php");