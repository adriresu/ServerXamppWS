<?php
include "connection.php";
include "utility.php";
$dbConn =  connect($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if ($_POST['Tipo'] == 'Login'){
    if (isset($_POST['username']) && isset($_POST['password']))
    {
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT Usuario, Contrasenha FROM usuario WHERE Usuario=:usuario AND Contrasenha=:contrasenha");
      $sql->bindValue(':usuario', $_POST['username']);
      $sql->bindValue(':contrasenha', $_POST['password']);
      $sql->execute();

      header("HTTP/1.1 200 OK");
      $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);

      if (count($dataReceived) > 0) {
        $response = array('response' => 'True');
      }
      else{
        $response = array('response' => $_POST['password']);
      }
      echo json_encode($response);
      exit();
	  }
    else{
      $response->response = 'False';
      echo json_encode($response);
    }

  }
  else if($_POST['Tipo'] == 'Register'){

  }
  else if($_POST['Tipo'] == 'GetSeries'){

  }

  else {
    //Mostrar lista de post
    $sql = $dbConn->prepare("SELECT * FROM usuario");
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    echo json_encode( $sql->fetchAll()  );
    exit();
}
}
// Crear un nuevo post
// if ($_SERVER['REQUEST_METHOD'] == 'POST')
// {
//     $input = $_POST;
//     $sql = "INSERT INTO posts
//           (title, status, content, user_id)
//           VALUES
//           (:title, :status, :content, :user_id)";
//     $statement = $dbConn->prepare($sql);
//     bindAllValues($statement, $input);
//     $statement->execute();
//     $postId = $dbConn->lastInsertId();
//     if($postId)
//     {
//       $input['id'] = $postId;
//       header("HTTP/1.1 200 OK");
//       echo json_encode($input);
//       exit();
// 	 }
// }
//Borrar
// if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
// {
// 	$id = $_GET['id'];
//   $statement = $dbConn->prepare("DELETE FROM posts where id=:id");
//   $statement->bindValue(':id', $id);
//   $statement->execute();
// 	header("HTTP/1.1 200 OK");
// 	exit();
// }
// //Actualizar
// if ($_SERVER['REQUEST_METHOD'] == 'PUT')
// {
//     $input = $_GET;
//     $postId = $input['id'];
//     $fields = getParams($input);
//     $sql = "
//           UPDATE posts
//           SET $fields
//           WHERE id='$postId'
//            ";
//     $statement = $dbConn->prepare($sql);
//     bindAllValues($statement, $input);
//     $statement->execute();
//     header("HTTP/1.1 200 OK");
//     exit();
// }
//En caso de que ninguna de las opciones anteriores se haya ejecutado
?>