<?php

     class WS
     {

          private $data;
          private $url;
          private $path;

          public function __construct()
          {
               if (!function_exists("curl_init"))
               {
                    echo("Função CURL não existe");
                    return false;
               }
               $this->url = "https://www.potigas.com.br/webservice/ws-intranet.php";
          }

          function Executa($data)
          {

               $this->data = $data;

               $ch = curl_init();
               curl_setopt($ch, CURLOPT_URL, $this->url);
               curl_setopt($ch, CURLOPT_POST, true);
               curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
               curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               $out = curl_exec($ch);
               curl_close($ch);

               return $out;
          }
     }

     $ws = new WS();
     $data = array('auth' => '24e23677d6722931c4fe84d781e8e32b');
     $retorno = $ws->executa($data);
     $obj = json_decode($retorno);
     foreach ($obj as $out)
     {
          $data = date("d/m/Y", strtotime($out->dataIni));
          echo<<<TEXTO
          <a href="$out->link" target="_blank"><img src="../img/ico_seta_dir.png" width="16" height="16" border="0" align="absmiddle" />$data - $out->titulo</a><br />
TEXTO;
     }
?>
