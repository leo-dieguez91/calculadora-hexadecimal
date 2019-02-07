<?php
$factor1= '';
$factor2= '';
$operador= '';
$resultado='';
if (isset($_POST['calcular'])) {
  $seleccionado="";
  $factor1= $_POST['factor_1'];
  $factor2= $_POST['factor_2'];
  $operador= $_POST['operacion'];
  $factor1H=validacion($factor1);
  $factor2H=validacion($factor2);
  $resultado=operacion($factor1H, $operador, $factor2H);
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $seleccionado= $_POST['operacion'];
  }
}
if (isset($_POST['limpiar'])) {
  $seleccionado="";
  $factor1= '';
  $factor2= '';
  $operador= '';
}

  function validacion($f){
    if (!is_numeric($f)) {
      $fhex= hexdec($f);
      if($fhex !== 0){
        return $fhex;
      }elseif (!empty($f)) {
         echo '<script type="text/javascript">
                  alert("'.strtoupper($f).' No es un número Hexadecimal");
                  window.location.href="index.php"
                </script>';
      }else{
        echo '<script type="text/javascript">
                 alert("Complete los campos");
                 window.location.href="index.php"
               </script>';
      }
    }else{
      return $f;
    }
  }

  function operacion($f1, $op, $f2){
    if ($op == "+") {
      $resultado= $f1 + $f2;
      return $resultado=hexadecimal($resultado);
    }elseif ($op == "-") {
      $resultado= $f1 - $f2;
      return $resultado=hexadecimal($resultado);
    }elseif ($op == "*") {
      $resultado= $f1 * $f2;
      return $resultado=hexadecimal($resultado);
    }elseif ($op == "/") {
      $resultado= $f1 / $f2;
      return $resultado=hexadecimal($resultado);
    }
  }

  function hexadecimal($r){
    if ($r >= 16) {
      $a=0;
      while ($r > 16) {
        $a++;
        $r=($r - 16);
      }
      $r=hexacalcu($r, $a);
      return $r;
    }elseif ($r >9 && $r < 16) {
      return $r=strtoupper(dechex($r));
    }else {
      return $r;
    }
  }

  function hexacalcu($r, $a){
    if ($r>9 && $r<16) {
      $h=dechex($r);
      if ($a == 0) {
        $a="";
      }
      return $r=$a.$h;
    }elseif ($r == 16) {
      return$r=10;
    }elseif ($a>9 && $a<16) {
      $a2=dechex($a);
      return $r=$a2.$r;
    }elseif (($r>9 && $r<16)&&($a>9 && $a<16)) {
      $h=dechex($r);
      $a2=dechex($a);
      return $r=$a2.$h;
    }else{
     return $r=$r+($a*10);
    }
  }


 ?>
