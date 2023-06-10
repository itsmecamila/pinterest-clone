<?php
  require "../process/validation-process.php";
  validarLogin();

  require "../daos/user.php";

  $loggedUser = getCurrentUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/components.css">
    <link rel="stylesheet" href="../assets/styles/pages/newpost.css">

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
        <form method="POST" action="../process/newpost-process.php" enctype="multipart/form-data">
            <div class="form-inputs">
              <!--Titulo do post-->
              <div class="input"> 
                  <label for="title">Título</label>
                  <input type="text" name="title" id="title" placeholder="Escreva o título aqui">    
              </div>
              <!--Descrição do post-->
              <div class="input"> 
                  <label for="description">Descrição</label>
                  <input type="text" name="description" id="description" placeholder="Escreva a descrição do post">
              </div>
            </div>
            <!--Imagem do post-->
            <div class="input-file">
                <label for="file">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#707069" d="m11 12.2l-.9-.9q-.275-.275-.7-.275t-.7.275q-.275.275-.275.7t.275.7l2.6 2.6q.3.3.7.3t.7-.3l2.6-2.6q.275-.275.275-.7t-.275-.7q-.275-.275-.7-.275t-.7.275l-.9.9V9q0-.425-.288-.713T12 8q-.425 0-.713.288T11 9v3.2Zm1 9.8q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z"/></svg>
                  <p>Arraste e solte ou clique para carregar</p>

                  <small>Recomendamos o uso de arquivos de alta qualidade .jpg com menos de 20 MB</small>
                </label>
                <input type="file" name="file" id="file" accept="image/*">
                <img class="image-preview">
                <!--Colocar PREVIEW imagem-->
            </div>
            <button type="submit">Criar</button>
            <!--Levar para a página do POST criado-->
        </form>
    </main>

    <script>
        const imageFileInputEl = document.querySelector("#file");
        const imagePreviewEl = document.querySelector(".image-preview");

        imageFileInputEl.onchange = e => {
            const [file] = imageFileInputEl.files;

            if (file) {
                imagePreviewEl.src = URL.createObjectURL(file);
            }
        }
    </script>
</body>
</html>