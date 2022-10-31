<?php 
Echo "<html>";
Echo
"<button style='width:200px; font-size:50px'>START!</button>"; 


/* comprobamos que el usuario nos viene como un parametro  Supuestamente esto es un WebService*/ 
// if(isset($_GET['user']) && intval($_GET['user'])) {

//         /* utilizar la variable que nos viene o establecerla nosotros */
//         $number_of_posts = isset($_GET['num']) ? intval($_GET['num']) : 10; //10 es por defecto
//         $format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml es por defecto
//         $user_id = intval($_GET['user']); 

//         /* conectamos a la bd */
//         $link = mysql_connect('localhost','usuario','password') or die('No se puede conectar a la BD');
//         mysql_select_db('nombrebd',$link) or die('No se puede seleccionar la BD');

//         /* sacamos los posts de bd */
//         $query = "SELECT post_title, guid FROM wp_posts WHERE post_author = $user_id AND post_status = 'publish' ORDER BY ID DESC LIMIT $number_of_posts";
//         $result = mysql_query($query,$link) or die('Query no funcional:  '.$query);

//         /* creamos el array con los datos */
//         $posts = array();
//         if(mysql_num_rows($result)) {
//                 while($post = mysql_fetch_assoc($result)) {
//                         $posts[] = array('post'=>$post);
//                 }
//         }

//         /* formateamos el resultado */
//         if($format == 'json') {
//                 header('Content-type: application/json');
//                 echo json_encode(array('posts'=>$posts));
//         }
//         else {
//                 header('Content-type: text/xml');
//                 echo '';
//                 foreach($posts as $index => $post) {
//                         if(is_array($post)) {
//                                 foreach($post as $key => $value) {
//                                         echo '<',$key,'>';
//                                         if(is_array($value)) {
//                                                 foreach($value as $tag => $val) {
//                                                         echo '<',$tag,'>',htmlentities($val),'';
//                                                 }
//                                         }
//                                         echo '';
//                                 }
//                         }
//                 }
//                 echo '';
//         }

//         /* nos desconectamos de la bd */
//         @mysql_close($link);
// }



// Con un array de opciones
// $proyectoseries = "proyectoseries";
// $user = "root";
// $password = "";

// try {
//     $dsn = "mysql:host=localhost;dbname=$proyectoseries";
//     $options = array(
//       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//     );
//     $dbh = new PDO($dsn, $user, $password);
//     Echo "<h1>WELL</h1>";

//     // Prepare
//     $stmt = $dbh->prepare("INSERT INTO usuario (ID, ROL, nombre, Apellidos, Usuario) VALUES (?, ?, ?, ?, ?)");
//     // Bind
//     $ID = "1";
//     $ROL = "1";
//     $nombre = "Resua";
//     $Apellidos = "Vidal";
//     $Usuario = "adriresu";
//     $stmt->bindParam(1, $ID);
//     $stmt->bindParam(2, $ROL);
//     $stmt->bindParam(3, $nombre);
//     $stmt->bindParam(4, $Apellidos);
//     $stmt->bindParam(5, $Usuario);

//     // Excecute
//     $stmt->execute();


//     // Bind
//     $ID = "2";
//     $ROL = "2";
//     $nombre = "Nerea";
//     $Apellidos = "Chouza";
//     $Usuario = "nereee";
//     $stmt->bindParam(1, $ID);
//     $stmt->bindParam(2, $ROL);
//     $stmt->bindParam(3, $nombre);
//     $stmt->bindParam(4, $Apellidos);
//     $stmt->bindParam(5, $Usuario);
//     // Execute
//     $stmt->execute();



// } catch (PDOException $e){
//     echo $e->getMessage();
// }

?>
