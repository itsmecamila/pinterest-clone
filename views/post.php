<?php
    require "../process/validation-process.php";
    validarLogin();

    require "../services/db.php";

    $conn = connectDatabase();
    $sql = "select * from posts where id = " . $_GET['id'];

    $post = mysqli_query($conn,$sql)->fetch_assoc();
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
                    <img src="https://github.com/itsmecamila.png" alt="" class="avatar">
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
                <!-- <img src="https://i.pinimg.com/564x/63/34/4e/63344e1ba4888c4f00b27b06f3598b25.jpg" alt=""> -->
            </div>
            <div class="post-details"> <!--Informações do post-->
                <header><!--Botão para SALVAR post-->
                    <button>Salvar</button>
                </header>
                <div> <!--Título e descrição-->
                    <?php
                        echo "<h1>" . $post['title'] . "</h1>";
                        echo "<p>" . $post['description'] . "</p>";
                    ?>
                </div>
                <footer> <!--Comentários-->
                    <h2>Comentários</h2>
                    <!--Aqui ficarão os comentários-->
                    <div><!--Aqui serão feitos os comentários-->
                        <form action="../process/comment-process.php" method="POST">
                            <img src="https://github.com/itsmecamila.png" alt=""> <!--Ícone do usuário-->
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