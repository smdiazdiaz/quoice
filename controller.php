<?php
require_once('db_connection.php');
$debug = false;

if ($debug)
  echo 'debug mode<br />';


$view_data_array = "";
$view_estado = "";
$view_candidato_id = "";
$view_mode = 1;
$view_cand_bens_2010 = "";
$view_cand_bens_2014 = "";

if (isset($_GET["state"]))
  $view_estado = $_GET["state"];

if (isset($_GET["active"]))
  $view_candidato_id = $_GET["active"];

if (isset($_GET["mode"]))
  $view_mode = $_GET["mode"];

if (isset($connection))
{

// Bens 2010
/*
SELECT SUM(candBens.valor) AS sum_bens_2010
            FROM candBens
            WHERE candBens.id = 280000000005
            AND candBens.ano = '2010'
            GROUP BY candBens.id
            LIMIT 10
        */

// Bens 2014
/*
SELECT candidato.*,
        SUM(candBens.valor) AS sum_bens_2010
        FROM candidato
        LEFT JOIN candBens
        ON candidato.id = candBens.id
        AND candBens.ano = '2014'
        GROUP BY candidato.id
        LIMIT 10
        */


// Receitas
/*
SELECT candidato.*, candCargo.nome AS NomeCargo, partido.sigla AS SiglaPartido, SUM(candReceitas.valor) AS sum_valor FROM candidato
        LEFT JOIN candReceitas
        ON candidato.id = candReceitas.id
        LEFT JOIN partido
        ON candidato.partido = partido.codigo
        LEFT JOIN candCargo
        ON candidato.cargo = candCargo.codigo
        AND candidato.situacao='ELEITO'
        GROUP BY candidato.id ORDER BY sum_valor DESC
        LIMIT 10
*/

// Despesas
/*
SELECT candidato.*, candCargo.nome AS NomeCargo, partido.sigla AS SiglaPartido, SUM(candDespesas.valor) AS sum_valor FROM candidato
        LEFT JOIN candDespesas
        ON candidato.id = candDespesas.id
        LEFT JOIN partido
        ON candidato.partido = partido.codigo
        LEFT JOIN candCargo
        ON candidato.cargo = candCargo.codigo
        AND candidato.situacao='ELEITO'
        GROUP BY candidato.id ORDER BY sum_valor DESC
        LIMIT 10
*/

// Bens Declarados
/*
SELECT candidato.*, candCargo.nome AS NomeCargo, partido.sigla AS SiglaPartido, SUM(candBens.valor) AS sum_valor FROM candidato
        LEFT JOIN candBens
        ON candidato.id = candBens.id
        LEFT JOIN partido
        ON candidato.partido = partido.codigo
        LEFT JOIN candCargo
        ON candidato.cargo = candCargo.codigo
        AND candidato.situacao='ELEITO'
        GROUP BY candidato.id ORDER BY sum_valor DESC
        LIMIT 10
*/

  // initialize

  switch ($view_mode)
  {
    case 1: // Receitas
      if ($view_estado != "")
      {
        $query = "SELECT candidato.*, candCargo.nome AS NomeCargo, partido.sigla AS SiglaPartido, SUM(candReceitas.valor) AS sum_valor FROM candidato
                LEFT JOIN candReceitas
                ON candidato.id = candReceitas.id
                LEFT JOIN partido
                ON candidato.partido = partido.codigo
                LEFT JOIN candCargo
                ON candidato.cargo = candCargo.codigo
                AND candidato.situacao='ELEITO'
                AND candidato.estado=?
                GROUP BY candidato.id ORDER BY sum_valor DESC
                LIMIT 10";
      }
      else {
        # code...
        $query = "SELECT candidato.*, candCargo.nome AS NomeCargo, partido.sigla AS SiglaPartido, SUM(candReceitas.valor) AS sum_valor FROM candidato
                LEFT JOIN candReceitas
                ON candidato.id = candReceitas.id
                LEFT JOIN partido
                ON candidato.partido = partido.codigo
                LEFT JOIN candCargo
                ON candidato.cargo = candCargo.codigo
                AND candidato.situacao='ELEITO'
                GROUP BY candidato.id ORDER BY sum_valor DESC
                LIMIT 10";
      }
      if ($debug)
        echo $query.'<br/>';
    break;
    case 2: // Despesas
      if ($view_estado != "")
      {
        $query = "SELECT candidato.*, candCargo.nome AS NomeCargo, partido.sigla AS SiglaPartido, SUM(candDespesas.valor) AS sum_valor FROM candidato
                LEFT JOIN candDespesas
                ON candidato.id = candDespesas.id
                LEFT JOIN partido
                ON candidato.partido = partido.codigo
                LEFT JOIN candCargo
                ON candidato.cargo = candCargo.codigo
                AND candidato.situacao='ELEITO'
                AND candidato.estado=?
                GROUP BY candidato.id ORDER BY sum_valor DESC
                LIMIT 10";
      }
      else {
        # code...
        $query = "SELECT candidato.*, candCargo.nome AS NomeCargo, partido.sigla AS SiglaPartido, SUM(candDespesas.valor) AS sum_valor FROM candidato
                LEFT JOIN candDespesas
                ON candidato.id = candDespesas.id
                LEFT JOIN partido
                ON candidato.partido = partido.codigo
                LEFT JOIN candCargo
                ON candidato.cargo = candCargo.codigo
                AND candidato.situacao='ELEITO'
                GROUP BY candidato.id ORDER BY sum_valor DESC
                LIMIT 10";
      }
    break;
    case 3: // Bens
      if ($view_estado != "")
      {
        $query = "SELECT candidato.*, candCargo.nome AS NomeCargo, partido.sigla AS SiglaPartido, SUM(candBens.valor) AS sum_valor FROM candidato
                LEFT JOIN candBens
                ON candidato.id = candBens.id
                LEFT JOIN partido
                ON candidato.partido = partido.codigo
                LEFT JOIN candCargo
                ON candidato.cargo = candCargo.codigo
                AND candidato.situacao='ELEITO'
                AND candidato.estado=?
                GROUP BY candidato.id ORDER BY sum_valor DESC
                LIMIT 10";
      }
      else {
        # code...
        $query = "SELECT candidato.*, candCargo.nome AS NomeCargo, partido.sigla AS SiglaPartido, SUM(candBens.valor) AS sum_valor FROM candidato
                LEFT JOIN candBens
                ON candidato.id = candBens.id
                LEFT JOIN partido
                ON candidato.partido = partido.codigo
                LEFT JOIN candCargo
                ON candidato.cargo = candCargo.codigo
                AND candidato.situacao='ELEITO'
                GROUP BY candidato.id ORDER BY sum_valor DESC
                LIMIT 10";
      }
    break;
    default: // Maiores Doadores de Campanha
      if ($view_estado != "")
      {
        $query = "SELECT candidato.*, candCargo.nome AS NomeCargo, partido.sigla AS SiglaPartido, SUM(candBens.valor) AS sum_valor FROM candidato
                LEFT JOIN candBens
                ON candidato.id = candBens.id
                LEFT JOIN partido
                ON candidato.partido = partido.codigo
                LEFT JOIN candCargo
                ON candidato.cargo = candCargo.codigo
                AND candidato.situacao='ELEITO'
                AND candidato.estado=?
                GROUP BY candidato.id ORDER BY sum_valor DESC
                LIMIT 10";
      }
      else {
        # code...
        $query = "SELECT candidato.*, candCargo.nome AS NomeCargo, partido.sigla AS SiglaPartido, SUM(candBens.valor) AS sum_valor FROM candidato
                LEFT JOIN candBens
                ON candidato.id = candBens.id
                LEFT JOIN partido
                ON candidato.partido = partido.codigo
                LEFT JOIN candCargo
                ON candidato.cargo = candCargo.codigo
                AND candidato.situacao='ELEITO'
                GROUP BY candidato.id ORDER BY sum_valor DESC
                LIMIT 10";
      }
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
  while ($myrow = $result->fetch_assoc())
  {
    $view_data_array[] = $myrow;
  }

  $result->close();

  foreach ($view_data_array as $row)
  {
    $result = $connection->query("SELECT SUM(candBens.valor) AS sum_bens_2010
            FROM candBens
            WHERE candBens.id = ".$row['id']."
            AND candBens.ano = '2010'
            GROUP BY candBens.id
            LIMIT 10");
    if ($result->num_rows > 0)
    {
      $sum = $result->fetch_assoc();
      $view_cand_bens_2010[$row['id']] = $sum['sum_bens_2010'];
    }
    else {
      # code...
      $view_cand_bens_2010[$row['id']] = "Sem informação";
    }
    $result->close();

    $result = $connection->query("SELECT SUM(candBens.valor) AS sum_bens_2014
            FROM candBens
            WHERE candBens.id = ".$row['id']."
            AND candBens.ano = '2014'
            GROUP BY candBens.id
            LIMIT 10");
    if ($result->num_rows > 0)
    {
      $sum = $result->fetch_assoc();
      $view_cand_bens_2014[$row['id']] = $sum['sum_bens_2014'];
    }
    else {
      # code...
      $view_cand_bens_2014[$row['id']] = "Sem informação";
    }
    $result->close();
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
