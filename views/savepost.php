<?php
  require "../process/validation-process.php";
  onlyAuthenticatedUser();

  require "../daos/user.php";
  require "../daos/folder.php";

  $loggedUser = getCurrentUser();
  $postId = $_GET['post_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/components.css">
    <link rel="stylesheet" href="../assets/styles/pages/home.css">
    <link rel="stylesheet" href="../assets/styles/pages/folder.css">
    <link rel="stylesheet" href="../assets/styles/pages/savepost.css">

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
                <a href="../process/logout-process.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#000" d="M15.325 16.275q-.275-.325-.275-.737t.275-.688l1.85-1.85H10q-.425 0-.713-.288T9 12q0-.425.288-.713T10 11h7.175l-1.85-1.85q-.3-.3-.3-.713t.3-.712q.275-.3.688-.3t.687.275l3.6 3.6q.15.15.213.325t.062.375q0 .2-.062.375t-.213.325l-3.6 3.6q-.325.325-.713.288t-.662-.313ZM5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h6q.425 0 .713.288T12 4q0 .425-.288.713T11 5H5v14h6q.425 0 .713.288T12 20q0 .425-.288.713T11 21H5Z"/></svg>
                </a>
            </div>
        </nav>
    </header>

    <section class="folder-info">
        <h1>Salvar</h1>
        <p>Suas pastas </p>
    </section>
    
    <main>
        <!--Aqui ficarão todos os posts-->
        <?php
            $folders = getAllFoldersFromUser($loggedUser['username']);
            if ($folders->num_rows > 0) {
              echo '<section class="folders">';
              while ($row = $folders->fetch_assoc()) {
                $cont = getAllPostsFromFolder($row['id'])->num_rows;

                echo '<a href="../process/savepost-process.php?post_id='.$postId.'&folder_id='.$row['id'].'">';
                echo '  <div class="folder">';
                echo '     <div class="folder-cap"></div>';
                echo '     <div class="folder-info">';
                echo '         <p>'.$row['name'].'</p>';
                echo '         <span>'.$cont.' pins</span>';
                echo '     </div>';
                echo '  </div>';
                echo '</a>';
              }
              echo '</section>';
            } else {
              echo '<div class="empty-posts">';
              echo '<p>Ainda não há nada para mostrar. As pastas que você criar ficarão aqui.</p>';
              echo '<a href="./newfolder.php">Criar uma pasta</a>';
              echo '</div>';
            }
          ?>
       
    </main>

    
</body>
</html>