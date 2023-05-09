<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="/css/pesquisa.css" media="screen" />
    <link rel="icon" type="image/png" href="/images/fonelogo.png"/>
      
    <title>site de e-commerce</title>
       
</head>
<body>
<main>
<style type="text/css">
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    text-decoration: none;
    list-style: none;

}

:root {
    --bg-color: var(--bg-color) #051b36;
    --tex-color: #fff;
    --main-color: #edb24c;
    --other-color: #fcfcfc;
    --h1-font: 4rem;
    --p-font: 1rem;
}


body {
    background-color: #1d2631;
    color: var(--tex-color);
    margin: 0;
    height: 100vh;
    width: 100vw;
    align-items: center;
    justify-content: center;

}



header {
    width: 100%;
    top: 0;
    right: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 30px 8%;
    

}

.logo {
    display: flex;
    align-items: center;
    color: var(--tex-color);
    font-size: 35px;
    font-weight: bold;
}

.logo i {
    color: var(--main-color);
    font-size: 32px;
    margin-right: 5px;
}

.navegação {
    display: flex;
}

.navegação a {
    color: var(--other-color);
    font-size: var(--p-font);
    font-weight: 500;
    margin: 0 30px;
    transition: a .55s ease;
}

.navegação a:hover {
    color: var(--main-color);

}


.header-icons {
    display: flex;
    align-items: center;
    transform: translate(-50%);
}

#menu {
    font-size: 35px;
    color: var(--tex-color);
    z-index: 10001;
    cursor: pointer;
}

.header-icons i {
    margin-right: 25px;
    font-size: 28px;
    cursor: pointer;
    transition: all .5s ease;
}

.header-icons i:hover {
    transform: translateY(-5px);
    color: var(--main-color);
}


.section {
    padding: 0 15%;
}

.home {
    position: relative;
    height: 100vh;
    width: 100%;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    align-items: center;
    gap: 2rem;
}

.home-text h1 {
    font-size: var(--h1-font);
    line-height: 1.2;
    margin-bottom: 2px;
}

.home-text h5 {
    color: #ffffff99;
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 60px;
}

.home-text h3 {
    font-size: 40px;
    font-weight: 700;
    letter-spacing: 2px;
    margin-bottom: 35px;
}

.search-div{
    position: relative;
    align-items: center;
    background: #1d2631;
    border-radius: 40px;
    display: flex;
    justify-content: space-between;
    padding: 10px;
}

.search-text{
    color: white;
    background:none;
    border: 0;
    outline: 0;
    width: 0;
    padding: 0;
    transition: 0.6s;
}

.bx bx-search{
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    border-radius: 50%;
}
.search-div:hover > .search-text{
    width: 100px;

}



footer {
    bottom: 0;
    width: 100%;
}
  
.container {
    width: 100%;
    overflow: hidden; /* para evitar que a altura da div seja afetada */
    padding: 50px;
  }
  
.col-md-3 {
    color: #fcfcfc;
    float: left;
    width: 25%;
    box-sizing: border-box; /* para incluir as bordas e o preenchimento no cálculo da largura */
    text-align: center; /* para centralizar o conteúdo na coluna */
  }
.list-unstyled li a {

    color: #fcfcfc;

}
.fig{
  max-width:350px;
  max-height:250px;
  width: auto;
  height: auto;
}

</style>
<header>
        <a href="#" class="logo"><i class='bx bx-headphone'>HeadPhone</i></a>
        <ul class="navegação">
            <li><a href="../inicio/inicio.html">inicio</a></li>
            <li><a href="#">Produtos</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
        <!--navegação-->
        <div class="header-icons">
            <div id="caixa" class="search-div">
                <input type="text" name= "search" class="search-text" placeholder="Pesquisar">
                <form method="post" action="12.php">
                <button  type="submit">Pesquisar</button>
                </form>
            </div>
            <i class='bx bx-cart'></i>
            <div id ="menu"><i class='bx bx-menu'></i></div>
    
            <!--header-icons-->
</header>

<div class="container">
      <?php
          $titulo = 'produtos';
      ?>
      <h1>Página de <?php echo $titulo; ?></h1>
      <p>Lista de <?php echo $titulo; ?></p>
      <section>
      <?php
          function imprime_prod($descricao, $valor, $imagem){
              echo "<div class=\"lista\">";
              echo "Produto: $descricao - R$ $valor <br />";
              echo "
                  <figure>
                  <img src=\"$imagem\"  class=\"fig\" />
                      <figcaption>$valor</figcaption>
                  </figure>
              "; 
              echo "</div>";
          }
          if (isset($_POST['search']) && !empty($_POST['search'])) {
            $x = $_POST['search'];
        } else {
            $x = "";
        }

          $con = mysqli_connect('localhost', 'root', '', 'loja');
          $qr = "SELECT * FROM produtos WHERE nome LIKE '%$x%'";
          $res = mysqli_query($con, $qr);
  
          while ($linha = mysqli_fetch_array($res)) { 
              imprime_prod($linha[4],$linha[3],$linha[2]);
          }
      ?>
      </section>
      <div class="total">Total de <?php echo mysqli_affected_rows($con); ?> prdutos</div>
</div>
 <!--Rodape-->
 <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                          <h4>Sobre Nós</h4>
                          <p>Somos uma loja online que oferece os melhores produtos a preços acessíveis.</p>
                        </div>
                        <div class="col-md-3">
                          <h4>Categorias</h4>
                          <ul class="list-unstyled">
                            <li><a href="#">Fones</a></li>
                            <li><a href="#">Tipos de Fones</a></li>
                            <li><a href="#">Acessórios</a></li>
                            
                          </ul>
                        </div>
                        <div class="col-md-3">
                          <h4>Atendimento ao Cliente</h4>
                          <ul class="list-unstyled">
                            <li><a href="#">Central de Atendimento</a></li>
                            <li><a href="#">Perguntas Frequentes</a></li>
                            <li><a href="#">Política de Trocas e Devoluções</a></li>
                            <li><a href="#">Política de Privacidade</a></li>
                          </ul>
                        </div>
                        <div class="col-md-3">
                          <h4>Entre em Contato</h4>
                          <ul class="list-unstyled">
                            <li><i class="fa fa-envelope"></i> contato@lojaonline.com.br</li>
                            <li><i class="fa fa-phone"></i> (00) 5555-5555</li>
                            <li><i class="fa fa-map-marker"></i>Endereco : Em Breve</li>
                          </ul>
                        </div>
                    </div>
                </div>
    </footer>