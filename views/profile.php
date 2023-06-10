<?php
  require "../process/validation-process.php";
  validarLogin();

  require "../daos/user.php";
  require "../daos/post.php";

  $loggedUser = getCurrentUser();
  $allPostsFromUser = getAllPostsFromUser($_COOKIE['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/components.css">
    <link rel="stylesheet" href="../assets/styles/pages/profile.css">

    <title>Pinterest</title>
</head>
<body>
    <header class="header">
        <nav>
            <div class="header-left">
              <!--Aqui ficaram os itens do menu do lado ESQUERDO-->
              <a href="./home.php">
                  <img class="logo" src="https://api.iconify.design/logos:pinterest.svg?color=%23ffffff" alt="Logotipo do Site"> <!--Aqui ficará a logo para retornar a home-->
              </a>
              <a href="./home.php">Página inicial</a>
              <a href="./newpost.php">Criar</a>
            </div>

            <div class="header-search">
                <!--Aqui está o ícone de lupa e o campo de busca-->
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 12 12"><path fill="#707069" d="M5 1a4 4 0 1 0 2.248 7.31l2.472 2.47a.75.75 0 1 0 1.06-1.06L8.31 7.248A4 4 0 0 0 5 1ZM2.5 5a2.5 2.5 0 1 1 5 0a2.5 2.5 0 0 1-5 0Z"/></svg> 
                <input type="text" placeholder="Procurar">
            </div>
            <!--Aqui ficaram os itens do lado DIREITO do menu-->
            <div>
                <a href="./profile.php">
                    <!--Aqui ficará o link da imagem do USUÁRIO-->
                    <?php
                        echo '<object data="data:image/png;base64,'.$loggedUser['photo'].'" type="image/png" class="avatar">';
                        echo '<img src="https://ui-avatars.com/api/?name='.$loggedUser['username'].'" alt="" class="avatar">';
                        echo '</object>';
                    ?>
                </a>
                </a>
                <a href="../process/logout-process.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#000" d="M15.325 16.275q-.275-.325-.275-.737t.275-.688l1.85-1.85H10q-.425 0-.713-.288T9 12q0-.425.288-.713T10 11h7.175l-1.85-1.85q-.3-.3-.3-.713t.3-.712q.275-.3.688-.3t.687.275l3.6 3.6q.15.15.213.325t.062.375q0 .2-.062.375t-.213.325l-3.6 3.6q-.325.325-.713.288t-.662-.313ZM5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h6q.425 0 .713.288T12 4q0 .425-.288.713T11 5H5v14h6q.425 0 .713.288T12 20q0 .425-.288.713T11 21H5Z"/></svg>
                </a>
            </div>
        </nav>
    </header>

    <main>
        <section class="personal-informations">
            <!--Aqui ficarão as informações pessoais-->
            <?php
              echo '<object data="data:image/png;base64,'.$loggedUser['photo'].'" type="image/png">';
              echo '<img src="https://ui-avatars.com/api/?name='.$loggedUser['username'].'" alt="">';
              echo '</object>';

              echo '<h1>' .$loggedUser['name']. '</h1> <!--Nome do usuário-->';
              echo '<p>' .$loggedUser['username']. '</p> <!--Usuário-->';
              echo '<!--Se der tempo, ACRESCENTAR EDITÇÃO DE PERFIL-->';
            ?>
        </section>
        <section class="user-actions">
            <button>Compartilhar</button>
            <a href="./editprofile.php">Editar perfil</a>
        </section>

        <section class="pins-nav">
          <a href="#" class="pins-nav-current-page">
            Criados
          </a>
          <a href="./folders.php" >
            Salvos
          </a>
        </section>

        <section class="pins-actions">
          <a href="./newpost.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#000" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2Z"/></svg>
          </a>
        </section>

        <section class="masonry">
          <?php
            if ($allPostsFromUser->num_rows > 0) {
              while ($row = $allPostsFromUser->fetch_assoc()) {
                echo '<figure>';
                echo '<a href="./post.php?id=' . $row['id'] .'">';
                echo '<img src="data:image/png;base64,' . $row['image'] . '" />';
                echo '</a>';
                echo '</figure>';
              }
            }
          ?>
          <!-- <figure>
            <a href="./post.html">
              <img src="https://i.pinimg.com/564x/63/34/4e/63344e1ba4888c4f00b27b06f3598b25.jpg" alt="">
              <div>
                <div>
                  <img src="https://github.com/itsmecamila.png" alt="">
                  <p>itsmecamila</p>
                </div>
              </div>
            </a> 
          </figure>
          <figure>
            <a href="./post.html">
              <img src="https://i.pinimg.com/564x/0c/77/99/0c779927bd67cc6597a0872634820bbc.jpg" alt=""> 
              <div>
                <p>Nyan</p>
                <div>
                  <img src="https://github.com/itsmecamila.png" alt="">
                  <p>itsmecamila</p>
                </div>
              </div>
            </a>
          </figure>
          <figure>
            <a href="./post.html">
              <img src="https://i.pinimg.com/564x/fa/cd/1f/facd1f76ffa175c3ce3770baeed9d6ec.jpg" alt=""> 
              
            </a>
          </figure>
          <figure>
            <a href="./post.html">
              <img src="https://i.pinimg.com/564x/b2/70/d6/b270d60b7b423f6f9e656aa4edd08a21.jpg" alt="">
            </a>
          </figure>
          <figure>
            <a href="./post.html">
              <img src="https://i.pinimg.com/564x/63/34/4e/63344e1ba4888c4f00b27b06f3598b25.jpg" alt="">
              <div>
                <div>
                  <img src="https://github.com/itsmecamila.png" alt="">
                  <p>itsmecamila</p>
                </div>
              </div>
            </a> 
          </figure>
          <figure>
            <a href="./post.html">
              <img src="https://i.pinimg.com/564x/0c/77/99/0c779927bd67cc6597a0872634820bbc.jpg" alt=""> 
              <div>
                <p>Nyan</p>
                <div>
                  <img src="https://github.com/itsmecamila.png" alt="">
                  <p>itsmecamila</p>
                </div>
              </div>
            </a>
          </figure>
          <figure>
            <a href="./post.html">
              <img src="https://i.pinimg.com/564x/fa/cd/1f/facd1f76ffa175c3ce3770baeed9d6ec.jpg" alt=""> 
              
            </a>
          </figure>
          <figure>
            <a href="./post.html">
              <img src="https://i.pinimg.com/564x/b2/70/d6/b270d60b7b423f6f9e656aa4edd08a21.jpg" alt="">
            </a>
          </figure> -->
        </section>
    </main>
    
</body>
</html>