<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Formulário Cartão de Visita</title>
        <link rel="shortcut icon" href="imagens/icone.ico" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSS -->
        <link type="text/css" href="css/style.css" rel="stylesheet">
        <link type="text/css" href="css/reset.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/util.css">
	</head>
	
	<body>
		<div class="container" style="background-image: url('imagens/fundo.jpg');">
			<div class="box p-r-55 p-l-55 p-b-30 p-t-60">

                <!-- Formulário -->
                <form method="POST" action="fazer.php" enctype="multipart/form-data">
                    <scan class="texto m-b-20"> Insira seus dados para gerar seu cartão de visitas.</scan>

                    <!-- Campos Input -->
                    <!-- Imagem -->
                    <div class="input m-b-20 p-r-30">
                        <img src="imagens/avatar.png" style="width: 130px; height: 130px" alt="avatar" class="avatar p-r-10 p-l-55 p-b-20 p-t-10">
                        <input class="input100 file-upload" name="arquivo" id="arquivo" type="file" accept=".png, .jpg, .jpeg" placeholder="Foto" required></td>
                        <span class="focus-input100"></span>
                    </div>

                    <!-- Nome -->
                    <div class="input m-b-20">
                        <input class="input100" name="nome" id="nome" type="text" placeholder="Nome" required>
                        <span class="focus-input100"></span>
                    </div>

                    <!-- Sobrenome-->
                    <div class="input m-b-20">
                        <input class="input100" name="sobrenome" id="sobrenome" type="text" placeholder="Sobrenome" required>
                        <span class="focus-input100"></span>
                    </div>

                    <!-- Endereço Comercial-->
                    <div class="input m-b-20">
                        <input class="input100" name="enderecoComercial" id="enderecoComercial" type="text" placeholder="Endereço Comercial" required>
                        <span class="focus-input100"></span>
                    </div>

                    <!-- Número-->
                    <div class="input m-b-20">
                        <input class="input100" data-mask="00000" name="numeroCasa" id="numeroCasa" type="text" placeholder="Número" required>
                        <span class="focus-input100"></span>
                    </div>

                    <!-- Complemento -->
                    <div class="input m-b-20">
                        <input class="input100" name="complementoCasa" id="complementoCasa" type="text" placeholder="Complemento" required>
                        <span class="focus-input100"></span>
                    </div>

                    <!-- CEP -->
                    <div class="input m-b-20">
                        <input class="input100 cep-mask" name="cep" id="cep" type="text" placeholder="CEP" required>
                        <span class="focus-input100"></span>
                    </div>

                    <!-- Cidade -->
                    <div class="input m-b-20">
                        <input class="input100" name="cidade" id="cidade" type="text" placeholder="Cidade" required>
                        <span class="focus-input100"></span>
                    </div>

                    <!-- UF -->
                    <div class="input m-b-20">
                        <input class="input100" name="uf" id="uf" type="text" pattern="[A-Z]{2}" placeholder="UF" required>
                        <span class="focus-input100"></span>
                    </div>

                    <!-- Telefone Comercial -->
                    <div class="input m-b-20 ">
                        <input class="input100 phone-ddd-mask" name="telComercial" id="telComercial" type="text" placeholder="Tel. Comercial" required>
                        <span class="focus-input100"></span>
                    </div>

                    <!--Telefone Celular-->
                    <div class="input m-b-20">
                        <input class="input100 cel-sp-mask" name="telCelular" id="telCelular" type="text" pattern="(?:^\([0]?[1-9]{2}\)|^[0]?[1-9]{2}[\.-\s]?)[9]?[1-9]\d{3}[\.-\s]?\d{4}$" placeholder="Tel. Celular" required>
                        <span class="focus-input100"></span>
                    </div>

                    <!--E-mail -->
                    <div class="input m-b-20">
                        <input class="input100" name="email" id="email" type="email" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" placeholder="E-mail" required>
                        <span class="focus-input100"></span>
                    </div>

                    <!-- Botão -->
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" name="gerar" value="Gerar"> Gerar </button>
                    </div>
                </form>
			</div>
        </div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
            $(document).ready(function() {
                var readUrl = function(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.readAsDataURL(input.files[0]);
                        reader.onload = function(e) {
                            $(".avatar").attr('src', e.target.result);
                        }
                    }
                }
                $(".file-upload").on('change', function() {
                    readUrl(this);
                });
                $(".avatar").click(function() {
                    var btn = $(".file-upload");
                    btn.trigger('click');
                });
            }
            );
        </script>
        <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	</body>
</html>