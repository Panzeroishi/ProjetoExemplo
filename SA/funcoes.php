<?php
    //Função API cep
    function chama_endereco($cep){
        //Tira os caracteres que não são númericos e os substitui por espaço vazio
        $cep = preg_replace("/[^0-9]/", "", $cep);
        //Busca o cep na api
        $url = "http://viacep.com.br/ws/$cep/xml/";

        $xml = simplexml_load_file($url);
        return $xml;
    }
?>