<?php

require '../vendor/autoload.php';

use \simpleform\HTMLForm;
use \simpleform\validators\{
    StringLength,
    NotEmpty
};
var_dump($_POST);
$form = new HTMLForm();
$form->addRule('name', new StringLength(8, 3) );
$form->addRule('email', new NotEmpty() );
$form->loadData($_POST);

if ( ! $form->validate() ) {
    echo '<pre>';
    print_r( $form->getErrors() );
    echo '</pre>';
}