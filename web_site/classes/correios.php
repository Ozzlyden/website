<?php
    use FlyingLuscas\Correios\Client;

    require 'correios/vendor/autoload.php';

    //$correios = new Client;

    $correios->zipcode()
        ->find('01001-000');

?>