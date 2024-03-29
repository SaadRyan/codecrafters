<?php
    include_once('config.php');

    if(!empty($_GET['id_coletivo']))
    {
        $id_coletivo = $_GET['id_coletivo'];
        $sqlSelect = "SELECT * FROM coletivo WHERE id_coletivo=$id_coletivo";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nomes = $user_data['nomes'];
                $equipe = $user_data['equipe'];
                $modalidade = $user_data['modalidade'];
                $serie = $user_data['serie'];
            }
        }
        else
        {
            header('Location: sistema.php');
        }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir equipes</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            background: url("../imagens/fundodaora.jpeg");
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }

        .inputReturn {
            background-color: #dc3545;
            border: none;
            padding: 15px;
            width: 80%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            transition: background-color 0.3s;

        }

        .inputReturn:hover {
            background-color: #a3232e;
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Editar Equipe</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nomes" id="nomes" class="inputUser" value=<?php echo $nomes;?> required>
                    <label for="nomes" class="labelInput">Nome dos participantes:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="equipe" id="equipe" class="inputUser"value=<?php echo $equipe;?> required>
                    <label for="equipe" class="labelInput">Nome da equipe:</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="modalidade" id="modalidade" class="inputUser" value=<?php echo $modalidade;?> required>
                    <label for="modalidade" class="labelInput">Modalidade:</label>
                </div>
                <br><br>
                <label for="serie">Selecione a série escolar:</label>
<input list="series" name="serie" id="serie" value=<?php echo $serie;?> required>

<datalist id="series">
  <option value="6ºEF">
  <option value="7ºEF">
  <option value="8ºEF">
  <option value="9ºEF">
  <option value="1ºEM">
  <option value="2ºEM">
  <option value="3ºEM">
</datalist>
                <br><br>
	<input type="hidden" name="id_coletivo" value="<?php echo $id_coletivo;?>">
    <input type="submit" name="update" id="submit" value="Atualizar">
    <button class="inputReturn" href="indi_lista.php">Voltar</button>
    <br><br>
            </fieldset>
        </form>
    </div>
</body>
</html>