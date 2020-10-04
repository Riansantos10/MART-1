<?php session_start(); ?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-static-top">
    <a class="navbar-brand" href="../menu_empresa/menu.php"><?php print $_SESSION['nome_empresa']; ?></a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link"id = "eventos">Criar evento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id = "lista">Lista de eventos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id = "eventos_proprios">Eventos da empresa</a>
        </li>

        <?php
            //há de fazer a verificação se é ou não empresa itinerante
            $localizacao = $_SESSION['localizacao'];
            if($localizacao == "Itinerante")
            {
                //Depois há de criar um botão para receber as notificações de oferta de trabalho
                //e dar a opção de escolha. 

                print ' <li class="nav-item">
                            <a class="nav-link" onClick = "listar();">Notificações</a>
                        </li>';
            }

          ?>
        <p class="text-right"></p>
        <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href = "../menu/logout.php">Logout</a>
            </li>
          </ul>
        </ul>
</nav>