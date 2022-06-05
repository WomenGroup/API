 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>VAGAS GERAIS</title>
     <link rel="stylesheet" href="css/CSSCursosti.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    include_once "../SITE PRONTO/conexao/conexao.vagas.php"
  
    ?>
</head>
 <body>
     
 <!-- MENU -->
    <div class="navbar">
    <a href="Home.html">Home</a>
    <div class="subnav">
      <button class="subnavbtn" style="background-color: #1e8f8f">Vagas de Emprego </button>
        <div class="subnav-content">
          <a href="VagasTi.php">Área de TI</a>
          <a href="">Áreas Gerais</a>
        </div>
    </div> 
    <div class="subnav">
      <button class="subnavbtn">Cursos e Certificações </button>
        <div class="subnav-content">
          <a href="Cursosti.php">Área de TI</a>
          <a href="Cursos.php">Áreas Gerais</a>
        </div>
    </div> 
    <a href="Metricas.html">Métricas</a>
    <a href="Localização.php">Localização</a>
    </div> 

<!-- TÍTULO DA PÁG -->
    <div class="h1"> VAGAS DE EMPREGO EM DIVERSAS ÁREAS</div>

<!-- BARRA DE PESQUISA -->

    <div class="h2"> PESQUISE AQUI</div>

  <div class="box2">
  
    <form method="GET" class="example" action=""> 
        <input type="text" placeholder="Escreva a sua vaga aqui..." name="search" list="filtros">
        <button type="submit"><i class="fa fa-search"></i></button>
        <datalist id="filtros">
          <option value="Financeiro">
          <option value="Administrativo">
          <option value="Comercial">
          <option value="Vendedor">

        </datalist>
    </form>
    <?php  
      $busca = filter_input(INPUT_GET, 'search');
    ?>
  </div>
<!-- VAGAS -->

  <section>
    <?php

    $pag = (isset($_GET['pagina'])) ? $_GET ['pagina'] : 1;
    $qtd = 100;
    $inicio = ($qtd*$pag)-$qtd;
    $sql = "SELECT * FROM vw_vagas WHERE nome_vagas LIKE '%$busca%' OR localizacao_vagas LIKE '%$busca%' OR salario_vagas LIKE '%$busca%' OR empresa_vagas LIKE '%$busca%' LIMIT $inicio, $qtd";
    $res = mysqli_query($con, $sql,);
    $tr = mysqli_num_rows($res);
    $tp = ceil(630/100);
      if ($res) {
        $nomeVagas = array();
        $localizacaoVagas = array();
        $salarioVagas = array ();
        $empresaVagas = array ();
        $linkVagas = array();
        $i = 0;
        while ($reg=mysqli_fetch_assoc($res)) {
          $nomeVagas[$i] = $reg['nome_vagas'];
          $localizacaoVagas[$i] = $reg['localizacao_vagas'];
          $salarioVagas[$i] = $reg['salario_vagas'];
          $empresaVagas[$i] = $reg['empresa_vagas'];
          $linkVagas[$i] = $reg['link_vagas'];
          ?>
          <div class="box">
          <h2 style="margin-top: -2%; color: #0f5c5c"> <?php echo $nomeVagas[$i] ?></h2>
          <h4 style="margin-top: -2%; color: #5f5f5f"> Localização: <?php echo $localizacaoVagas[$i] ?></h4><br>
          <h4 style="margin-top: -4%; color: #5f5f5f"> Salário: <?php echo $salarioVagas[$i] ?></h4><br>
          <h4 style="margin-top: -4%; color: #5f5f5f"> Empresa: <?php echo $empresaVagas[$i] ?></h4><br>
          <button class="btn2" >
            <a href=" <?php echo  $linkVagas[$i] ?>"
            style="text-decoration:none; color:rgb(255, 255, 255); font-family:'Trebuchet MS'; 
            text-align: center;"> SABER MAIS...</a>
          </button>
          </div>
          <?php
            $i++;
          }
        }

    
    ?>
  </section>
          
        


<!--PAGINAÇÃO-->

  <?php
  $proximo = $pag + 1;
  $anterior = $pag - 1;
 
  ?>
  <section id="paginate">
    <div class="pagination">

    
    <?php
      if ($anterior != 0){?> 
        <div class="prev" ><a style="text-decoration: none; color: #1e8f8f;font-size: 20px;
        "href="Vagas.php"> ↞ </div>
      <?php } ?>

      <?php
      if ($anterior != 0){?> 
        <div class="prev" ><a style="text-decoration: none; color: #1e8f8f; font-size: 20px;"
        href="Vagas.php?pagina=<?php echo $anterior;?>"<?php echo $anterior;?>> ← </div>
      <?php } ?>
     
      
      <?php
      if ($proximo <= $tp){?> 
        <div class="last" ><a style="text-decoration: none; color: #1e8f8f; font-size: 20px
        "href="Vagas.php?pagina=<?php echo $proximo;?>"> → </div>
      <?php } ?>

      <?php
      if ($proximo <= $tp){?> 
        <div class="last" ><a style="text-decoration: none; color: #1e8f8f; font-size: 20px
        "href="Vagas.php?pagina=<?php echo $tp;?>"> ↠ </div>
      <?php } ?>

    </div>
  </section>
     


 


<!---RODAPÉ-->
  <div class="footer">
    <a href=" ">Facebook</a>
    <a href="">Instagram</a>
    <a href="https://github.com/WomenGroup">Github</a>
  </div>


<!-- BOTÃO JAVA, SOBE PRO MENU -->
  <button onclick="topFunction()" id="myBtn" title="Go to top">⬆︎</button>
  <script>//Get the button:
    mybutton = document.getElementById("myBtn");
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() 
    {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) 
      {
        mybutton.style.display = "block";
      } 
      else 
      {
        mybutton.style.display = "none";
      }
    }
    function topFunction() 
    {
      document.body.scrollTop = 0; 
      document.documentElement.scrollTop = 0; 
    }
  </script>

</body>
</html>