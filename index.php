<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-whidt, initial-scale=1">
    <meta charset="utf-8">
    <title>Calculadora Hexadecimal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style media="screen">
      .container{
        position: absolute;
        top:250px;
        left:350px;
      }
      .w-input{
        width: 150px;
        text-transform:uppercase;
      }
      .titulo{
        text-align: center;
        margin-top: 60px;
      }
    </style>
    <?php
    $operaciones=["+","-","*","/"];
    include"funciones.php";
    ?>
  </head>
  <body>
    <div class="titulo">
      <h1>Calculadora Hexadecimal</h1>
    </div>
    <div class="container">
    <form class="" action="" method="POST">
      <input type="text" class="form-control d-inline w-input" maxlength="1" name="factor_1" value="<?=$factor1?>">
      <select class="form-control d-inline" name="operacion" style="width: auto;">
        <?php
          foreach ($operaciones as $value) {
            if ($value == $seleccionado) {
              echo "<option value='".$value."' selected> ".$value." </option>";
            }else {
              echo "<option value='".$value."'> ".$value." </option>";
            }
          }
         ?>
      </select>
      <input type="text" class="form-control d-inline w-input" maxlength="1" name="factor_2" value="<?=$factor2?>">
      <label>=</label>
      <input type="text" class="form-control d-inline w-input" readonly id="resultado" name="resultado" value="<?=$resultado?>">

      <input type="submit" class="btn btn-primary" name="calcular" value="Calcular">
      <input type="submit" class="btn btn-danger" name="limpiar" value="Limpiar">
  </form>
  </div>
  </body>
</html>
