<?php
require_once('db_connection.php');
$debug = false;

if ($debug)
  echo 'debug mode<br />';


$view_data_array = "";
$view_estado = "";
$view_candidato_id = "";
$view_mode = 1;


if (isset($_GET["state"]))
  $view_estado = $_GET["state"];

if (isset($_GET["active"]))
  $view_candidato_id = $_GET["active"];

if (isset($_GET["mode"]))
  $view_mode = $_GET["mode"];

if (isset($connection))
{

/*
SELECT candidato.*, SUM(candreceitas.valor) AS sum_valor FROM candidato
LEFT JOIN candreceitas ON candidato.id = candreceitas.id
WHERE candidato.situacao='ELEITO'
GROUP BY candreceitas.id ORDER BY sum_valor DESC
LIMIT 10
*/

  // initialize

  switch ($view_mode)
  {
    case 1: // Maiores Doadores de Campanha

      if ($view_estado != "")
      {
        $query = "SELECT candidato.* FROM candidato,candreceitas WHERE situacao='ELEITO' AND candidato.id = candreceitas.id AND candidato.estado = ? ORDER BY candreceitas.valor LIMIT 20";
      }
      else {
        # code...
        $query = "SELECT candidato.* FROM candidato,candreceitas WHERE situacao='ELEITO' AND candidato.id = candreceitas.id ORDER BY candreceitas.valor LIMIT 20";
      }
      if ($debug)
        echo $query.'<br/>';
    break;
    case 2: // Receitas e Despesas do Partido
    break;
    case 3: // Comparativo de Renda dos Politicos
      if ($view_estado != "")
      {
        $query = "SELECT candidato.*, SUM(candreceitas.valor) AS sum_valor FROM candidato LEFT JOIN candreceitas ON candidato.id = candreceitas.id WHERE candidato.situacao='ELEITO' AND candidato.estado = ? GROUP BY candreceitas.id ORDER BY sum_valor DESC LIMIT 20";
      }
      else {
        # code...
        $query = "SELECT candidato.*, SUM(candreceitas.valor) AS sum_valor FROM candidato LEFT JOIN candreceitas ON candidato.id = candreceitas.id WHERE candidato.situacao='ELEITO' GROUP BY candreceitas.id ORDER BY sum_valor DESC LIMIT 20";
      }

    break;
    default: // Maiores Doadores de Campanha
  }

  // prepare
  $stmt= $connection->prepare($query);

  // bind
  if ($view_estado != "")
  {
    $stmt->bind_param("s",$view_estado);
  }

  // execute
  if ( !$stmt->execute() )
  {
    if ($debug)
      echo 'Error executing MySQL query: ' . $stmt->error . '<br />';
  }
  else {
    if ($debug)
      echo 'query executed sucessfully<br />';
  }

  /* instead of bind_result: */
  $result = $stmt->get_result();

  /* now you can fetch the results into an array - NICE */

  while ($myrow = $result->fetch_assoc()) {
    $view_data_array[] = $myrow;
  }

  if ($debug)
  {
    foreach ($view_data_array as $myrow) {
      # code...
      // use your $myrow array as you would with any other fetch
      echo 'Row: '.$myrow['nome'].'<br />';
    }

  echo 'Scan again <br/>';
    foreach ($view_data_array as $myrow) {
      // use your $myrow array as you would with any other fetch
      echo 'Row: '.$myrow['nome'].'<br />';
    }
  }
}


?>
