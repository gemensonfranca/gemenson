<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Projeto 2U</title>
        <!-- CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <!-- MÁSCARA DE CPF -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

        <style>
            .span_required{
                display: none;
                font-size: 11px;
                color: orange;
            }

            #alertaMensagem{
                font-size: 11px;
                margin-top: 20px;
            }

            #bt_submit{
                background: red;
            }

            .resp-input{
                width: 50%;
            }

            .resp-mid{
                width: 33.3%;
            }

            .resp-small{
                width: 33.3%;
            }

            .resp-mini{
                width: 33.3%;
            }
            .coluna{
                display: block;
            }

            @media all and (min-width:2px) and (max-width:742px) {
                .resp-input{
                    width: 100%;
                }

                .resp-mid{
                    width: 100%;
                }

                .resp-small{
                    width: 70%;
                }

                .resp-mini{
                    width: 30%;
                }

                .coluna{
                    display: none;
                }
                .lead{
                    line-height: 20px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                <h2><b>Cadastro de Usuários</b></h2>
                <p class="lead">Abaixo inclua informações de usuários, infomando seu nome, sobrenome, cep e endereço completo.</p>
                </div>
            </main>
            <!--  -->
        </div>
        <!--  -->
        <div class="container">
            <form action="/php/cadastrar.php" method="POST">
                <div class="row">
                    <div class="col-6">
                        <b>Nome</b>
                        <input type="text" class="form-control my-1 required" name="nome" placeholder="Nome" aria-label="Nome" oninput="nomeValidate()">
                        <span class="span_required">O nome deve ter no minimo 3 caractéres!</span>
                    </div>
                    <div class="col-6">
                        <b>Sobrenome</b>
                        <input type="text" class="form-control my-1 required" name="sobrenome" placeholder="Sobrenome" aria-label="Sobrenome" oninput="sobrenomeValidate()">
                        <span class="span_required">O sobrenome deve ter no minimo 3 caractéres!</span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="resp-input">
                        <b>CEP</b>
                        <input type="text" id="campo_cep" class="form-control my-1 required" placeholder="CEP" name="cep" onkeypress="$(this).mask('00000-000')" oninput="cepValidate()" aria-label="CEP">
                        <span class="span_required">O CEP é obrigatório!</span>
                    </div>
                    <div class="resp-input">
                        <b>Endereço</b>
                        <input type="text" class="form-control my-1" id="campo_endereco" name="endereco" placeholder="Endereço" aria-label="Endereço">
                    </div>
                    <div class="resp-mid">
                        <b>Bairro</b>
                        <input type="text" class="form-control my-1" id="campo_bairro" name="bairro" placeholder="Bairro" aria-label="Bairro">
                    </div>
                    <div class="resp-small">
                        <b>Cidade</b>
                        <input type="text" class="form-control my-1" id="campo_cidade" name="cidade" placeholder="Cidade" aria-label="Cidade">
                    </div>
                    <div class="resp-mini">
                        <b>Estado</b>
                        <input type="text" class="form-control my-1" id="campo_estado" name="estado" placeholder="Estado" aria-label="Estado">
                    </div>
                </div>
                <!--  -->
                <button id="bt_submit" disabled type="submit" class="btn btn-primary mt-2 btn-sm">Registrar Usuário</button>
            </form>
            <!--  -->
            <p id="alertaMensagem"></p>
        </div>
        <!--  -->
        <div class="container">
            <!--  -->
            <div class="table-responsive">
                <!--  -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th class="coluna" scope="col">CEP</th>
                            <th scope="col">Localidade</th>
                        </tr>
                    </thead>
                    <!--  -->
                    <?php

                    // BANCO DE DADOS
                    $host   = "localhost";
                    $user   = "root";
                    $pass   = "Mysql2023@root";
                    $dbname = "usuarios";
                    $port   = 3306;

                    $conn   = new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);

                    // RESGATAR INFORMAÇÕES DA EMPRESA
                    $stmt   = $conn->prepare('SELECT * FROM usuarios');
                    $stmt->execute(); 
                    $result = $stmt->fetchAll();

                    foreach ($result as $key) {
                        
                        echo '
                        
                        <tbody>
                            <tr>
                            <th scope="row">'.$key['id'].'</th>
                                <td>'.$key['nome'].' '.$key['sobrenome'].'</td>
                                <td class="coluna">'.$key['cep'].'</td>
                                <td>'.$key['cidade'].' '.$key['estado'].'</td>
                            </tr>
                        </tbody>
                        
                        ';
                    }                    

                    ?>
                </table>
            </div>
        </div>
        <!-- JS -->
        <script src="js/script.js"></script>
        <!-- CONSULTA DE CEP -->
        <script src="/js/bootstrap.bundle.min.js"></script>
    </body>
    <!-- VALIDAÇÃO -->
    <script src="js/validation.js"></script>
</html>