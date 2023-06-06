<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/pages/login.css">

    <title>Pinterest</title>
</head>
<body>
    <main class="content">
        <header>
            <img src="https://api.iconify.design/logos:pinterest.svg?color=%23ffffff" alt="Logotipo do Site"> <!--Aqui ficará a logo para retornar a home-->

            <h1>Faça o login para ver mais</h1>
        </header>
        <section>
            <form action="">
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Digite seu email">
                </div>
                <div class="input">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" placeholder="Digite sua senha">
                    <a href="#">Esqueceu sua senha? </a> 
                </div>
                <button>Entrar</button>
            </form>
            <footer>
                <div> <!--Termos de uso-->
                    <small>Ao continuar, você concorda com os Termos de Serviço 
                        do Pinterest e confirma que leu a nossa Política de Privacidade.</small>
                </div>
                <div>
                    <p>Ainda não está no Pinterest? <a href="./register.php"> Criar uma conta </a> </p>
                </div>
            </footer>
        </section>
    </main>
    
</body>
</html>