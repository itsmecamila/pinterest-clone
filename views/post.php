<?php
    require "../process/validation-process.php";
    validarLogin();

    require "../daos/user.php";
    require "../daos/post.php";
    require "../daos/comment.php";

    $loggedUser = getCurrentUser();
    $post = getPostById($_GET['id']);
    $postAuthor = getUserByUsername($post['user']);
    $comments = getCommentsFromPost($post['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/components.css">
    <link rel="stylesheet" href="../assets/styles/pages/post.css">

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
                        echo '<object data="'.$loggedUser['photo'] ? $loggedUser['photo'] : null.'" type="image/png" class="avatar">';
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
        <div> 
             <!--Aqui ficará a SETA para voltar para a HOME-->
            <a href="./home.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 20 20"><path fill="#000" d="m5.83 9l5.58-5.58L10 2l-8 8l8 8l1.41-1.41L5.83 11H18V9z"/></svg>
            </a>
        </div>
        <!--Post-->
        <section class="post-content">
            <div class="post-content-image"> <!--Imagem-->
                <?php
                    echo '<img src="data:image/png;base64,' . $post['image'] . '" />';
                ?>
            </div>
            <div class="post-details"> <!--Informações do post-->
                <header><!--Botão para SALVAR post-->
                    <button>Salvar</button>
                </header>
                <div> <!--Título e descrição-->
                    <?php
                        echo "<h1>" . $post['title'] . "</h1>";
                        echo "<p>" . $post['description'] . "</p>";

                        echo '<div class="post-author">';
                        echo '<object data="'.$postAuthor['photo'] ? $postAuthor['photo'] : null.'" type="image/png">';
                        echo '<img src="https://ui-avatars.com/api/?name='.$postAuthor['username'].'" alt="">';
                        echo '</object>';
                        echo '<p>' . $postAuthor['username'] . '</p>';
                        echo '</div>';
                    ?>
                </div>
                <footer> <!--Comentários-->
                    <h2>Comentários</h2>
                    <section class="all-comments">
                        <?php
                            if ($comments->num_rows > 0) {
                                while ($row = $comments->fetch_assoc()) {
                                    $user = getUserByUsername($row['user_id']);

                                    echo '<div class="comment">';
                                    echo '<object data="'.$user['photo'] ? $user['photo'] : null.'" type="image/png">';
                                    echo '<img src="https://ui-avatars.com/api/?name='.$user['username'].'" alt="">';
                                    echo '</object>';
                                    echo '<div class="comment-content">';
                                    echo '<p class="comment-author">' . $user['username'] . '</p>';
                                    echo '<p class="comment-message">' . $row['comment'] . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }
                        ?>
                    </section>
                    <!--Aqui ficarão os comentários-->
                    <div><!--Aqui serão feitos os comentários-->
                        <form action="../process/comment-process.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <?php
                                echo '<object data="'.$loggedUser['photo'] ? $loggedUser['photo'] : null.'" type="image/png">';
                                echo '<img src="https://ui-avatars.com/api/?name='.$loggedUser['username'].'" alt="">';
                                echo '</object>';
                            ?>
                            <!-- <img src="https://github.com/itsmecamila.png" alt=""> Ícone do usuário -->
                            <input type="text" name="comment" id="comment" placeholder="Escreva seu comentário">
                            <button type="submit"> <!--Botão para ENVIAR comentário-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path fill="#fff" d="M27.71 4.29a1 1 0 0 0-1.05-.23l-22 8a1 1 0 0 0 0 1.87l8.59 3.43L19.59 11L21 12.41l-6.37 6.37l3.44 8.59A1 1 0 0 0 19 28a1 1 0 0 0 .92-.66l8-22a1 1 0 0 0-.21-1.05Z"/></svg>
                            </button>
                        </form>
                    </div>
                </footer>
            </div>

        </section>
    </main>
    
</body>
</html>