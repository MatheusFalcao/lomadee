
<?php
// Dados da API
$page_id = '140123039471413';
$page_access_token = 'EAADrpddRX5IBALvtrBShZCQh39iBmxQVaG1cSMp0NPQfCTZCKZBECC6lEMBsc2wNAludJuuyZAzgrIGeVGqdn8NMws8RT6OZCXKju3PaZAVZBCYIcZCKYKlk5jXuE3ozQwwjP7iN9XWmK0atkKBoc4QWL98g6jZBMXDQo3rq8xEUvwc2bXKy2ym9S8ZCVdIWqhFQvxta9M7Ox5NwZDZD';

/*##############################################################
*##############################################################
*                                                                    Functions
*/##############################################################

function post($data){
$page_id = '140123039471413';
$page_access_token = 'EAADrpddRX5IBALvtrBShZCQh39iBmxQVaG1cSMp0NPQfCTZCKZBECC6lEMBsc2wNAludJuuyZAzgrIGeVGqdn8NMws8RT6OZCXKju3PaZAVZBCYIcZCKYKlk5jXuE3ozQwwjP7iN9XWmK0atkKBoc4QWL98g6jZBMXDQo3rq8xEUvwc2bXKy2ym9S8ZCVdIWqhFQvxta9M7Ox5NwZDZD';
// Efetua a chamada da API
$post_url = 'https://graph.facebook.com/'.$page_id.'/feed';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $post_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0);
curl_setopt($ch, CURLOPT_TIMEOUT, 1000); //timeout in seconds
$return = curl_exec($ch);
// Escreve na tela o retorno da API
echo($return);
curl_close($ch);
}

function my_file_get_contents( $site_url ){
  $ch = curl_init();
  $timeout = 10;
  curl_setopt ($ch, CURLOPT_URL, $site_url);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $file_contents = curl_exec($ch);
  curl_close($ch);
  return $file_contents;
}

require 'facebook/autoload.php';

// solicita permissao publish_actions
$loginUrl = $facebook->getLoginUrl(array("scope" => "publish_actions"));
header("Location: $loginUrl");

$facebook->api("/140123039471413/feed", "post", array(
          'message' => "Site para desenvolvedores da linguagem PHP",
          'name' => "Site Oficial do PHP",
          'link' => "http://www.php.net",
));

// // $json_file = my_file_get_contents("./lomadee/Lomadee-Offers.json");
// $json_str = json_decode($json_file, true);
// $itens = $json_str['offer'];
// foreach ( $itens as $e ) {
//   // echo $e['offer']['offername']."<br>";
//   // print_r($json_str);
//   $data['nome'] = $e['offer']['seller']['sellername'];
//   // Monta o post do FB
//   $data['message'] = $e['offer']['offername']." por apenas R$ ".$json_str['offer'][0]['offer']['price']['value'];
//   // uma imagem para o seu post (opcional)
//   $data['picture'] = $e['offer']['thumbnail' ]['url'];
//   // um link para quando clicarem no seu post
//   $data['link'] = $e['offer']['links' ][0]['link']['url'];
//   // descrição do post
//   $data['description'] = "Não perca esta oferta de ".$data['nome'];
//   // subtítulo
//   $data['caption'] = "Informação atualizada em " . date("d/m/Y H:i:s");
//   print_r($data);
//   echo "<BR>";
//   $data['access_token'] = $page_access_token;
//
//   post($data);

// }





?>
