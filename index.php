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
      $sql = $dbConn->prepare("SELECT * FROM usuario WHERE Usuario=:usuario AND Contrasenha=:contrasenha");
      $sql->bindValue(':usuario', $_POST['username']);
      $sql->bindValue(':contrasenha', $_POST['password']);
      $sql->execute();

      header("HTTP/1.1 200 OK");
      $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);

      if (count($dataReceived) > 0) {
        echo json_encode($dataReceived);
      }
      exit();
	  }
    else{
    }
  }
  else if($_POST['Tipo'] == 'Register'){
    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
      $sql = $dbConn->prepare("INSERT INTO usuario(Rol, Nombre, Apellidos, Correo, Usuario, Contrasenha) VALUES (1,:name,:surname,:email,:username,:password)");
      $sql->bindValue(':name', $_POST['name']);
      $sql->bindValue(':surname', $_POST['surname']);
      $sql->bindValue(':username', $_POST['username']);
      $sql->bindValue(':password', $_POST['password']);
      $sql->bindValue(':email', $_POST['email']);
      $sql->execute();

      header("HTTP/1.1 200 OK");
      $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);

      if (count($dataReceived) > 0) {
        echo json_encode($dataReceived);
      }
      exit();
    }
    else{
      $response->response = 'False';
      echo json_encode($response);
    }
  }

  else if($_POST['Tipo'] == 'CheckIfUser'){
    if (isset($_POST['username']))
    {
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT * FROM usuario WHERE Usuario=:usuario");
      $sql->bindValue(':usuario', $_POST['username']);
      $sql->execute();

      header("HTTP/1.1 200 OK");
      $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);

      if (count($dataReceived) > 0) {
        echo json_encode($dataReceived);
      }
      exit();
	  }
    else{
    }
  }
  
  else if($_POST['Tipo'] == 'Series'){
    $sql = $dbConn->prepare("SELECT * FROM serie WHERE Tipo=0");
    $sql->execute();
    header("HTTP/1.1 200 OK");
    $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($dataReceived) > 0) {
      echo json_encode($dataReceived);
    }
  }
  else if($_POST['Tipo'] == 'Peliculas'){
    $sql = $dbConn->prepare("SELECT * FROM serie WHERE Tipo=1");
    $sql->execute();
    header("HTTP/1.1 200 OK");
    $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($dataReceived) > 0) {
      echo json_encode($dataReceived);
    }
  }
  else if($_POST['Tipo'] == 'Animes'){
    $sql = $dbConn->prepare("SELECT * FROM serie WHERE Tipo=2");
    $sql->execute();
    header("HTTP/1.1 200 OK");
    $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($dataReceived) > 0) {
      echo json_encode($dataReceived);
    }
  }
  elseif ($_POST['Tipo'] == 'SerieInfo') {
    $sql = $dbConn->prepare("SELECT * FROM serie WHERE ID=:id");
    $sql->bindValue(':id', $_POST['id']);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($dataReceived) > 0) {
      echo json_encode($dataReceived);
    }
  }
  elseif ($_POST['Tipo'] == 'SerieInfoCharacter') {
    $sql = $dbConn->prepare("SELECT * FROM personaje WHERE ID_serie=:id");
    $sql->bindValue(':id', $_POST['id']);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($dataReceived) > 0) {
      echo json_encode($dataReceived);
    }
  }
  elseif ($_POST['Tipo'] == 'CharacterInfo') {
    $sql = $dbConn->prepare("SELECT * FROM personaje WHERE ID=:id");
    $sql->bindValue(':id', $_POST['id']);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($dataReceived) > 0) {
      echo json_encode($dataReceived);
    }
  }
  elseif ($_POST['Tipo'] == 'SerieName') {
    $sql = $dbConn->prepare("SELECT * FROM serie");
    $sql->execute();
    header("HTTP/1.1 200 OK");
    $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($dataReceived) > 0) {
      echo json_encode($dataReceived);
    }
  }
  elseif ($_POST['Tipo'] == 'SerieInfo') {
    $sql = $dbConn->prepare("SELECT * FROM usuario WHERE Usuario=:usuario");
    $sql->bindValue(':usuario', $_POST['usuario']);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($dataReceived) > 0) {
      echo json_encode($dataReceived);
    }
  }

  elseif ($_POST['Tipo'] == 'SerieExtraInfo') {
    $sql = $dbConn->prepare("SELECT * FROM usuarios_serie WHERE ID_Usuario=:usuario AND ID_Serie=:serie");
    $sql->bindValue(':usuario', $_POST['idUser']);
    $sql->bindValue(':serie', $_POST['id']);
    $sql->execute();
    header("HTTP/1.1 200 OK");
    $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($dataReceived) > 0) {
      echo json_encode($dataReceived);
    }
  }

  else if($_POST['Tipo'] == 'serieViewed'){
    if (isset($_POST['id']) && isset($_POST['idUser'])) {
      $viewed = intval($_POST['viewed']);

      $sql = $dbConn->prepare("SELECT * FROM usuarios_serie WHERE ID_Usuario=:usuario AND ID_Serie=:serie");
      $sql->bindValue(':usuario', $_POST['idUser']);
      $sql->bindValue(':serie', $_POST['id']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      $dataReceivedSelect = $sql->fetchAll(PDO::FETCH_ASSOC);
      
      if (count($dataReceivedSelect) > 0){
        $sql = $dbConn->prepare("UPDATE usuarios_serie SET Estado = :viewed WHERE ID_Usuario=:usuario AND ID_Serie=:serie");
        $sql->bindValue(':usuario', $_POST['idUser']);
        $sql->bindValue(':serie', $_POST['id']);
        $sql->bindValue(':viewed', $viewed);
        $sql->execute();
        header("HTTP/1.1 200 OK");
        $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);
        $response = array('response' => 'True');
      }
      else{
        $sql = $dbConn->prepare("INSERT INTO usuarios_serie(ID_usuario, ID_serie, Estado) VALUES (:usuario,:serie,:viewed)");
        $sql->bindValue(':usuario', $_POST['idUser']);
        $sql->bindValue(':serie', $_POST['id']);
        $sql->bindValue(':viewed', $viewed);
        $sql->execute();
        header("HTTP/1.1 200 OK");
        $dataReceived = $sql->fetchAll(PDO::FETCH_ASSOC);
        $response = array('response' => 'True');
      }

      echo json_encode($response);
      exit();
    }
    else{
      $response->response = 'False';
      echo json_encode($response);
    }
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