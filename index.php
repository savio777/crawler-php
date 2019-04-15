<?php
// carregador de bibliotecas
require_once('vendor/autoload.php');


use KubAT\PhpSimple\HtmlDomParser;
use GuzzleHttp\Client;

// https://www.olx.com.br/brasil?o=2&q=dell
// o=pagina


$client = new Client([
    'headers'=>[
        // o bot usa o user-agent para poder ter acesso a requisições dos sites
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36'        
    ]
    
]);

$url = 'https://www.olx.com.br/brasil?q=dell&o=1';

// url usada no tutorial
$url1 = 'https://www.guiamais.com.br/encontre?what=&where=S%C3%A3o%20Jos%C3%A9%20do%20Rio%20Pardo,%20SP&order=alpha&page=1';

$html = $client->request('GET', $url)->getBody();

$dom = HtmlDomParser::str_get_html($html);

//echo($html);

foreach($dom->find('a') as $link){
    if($link->class=='OLXad-list-link')
    echo($link->href . PHP_EOL);
}





