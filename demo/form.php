<?php

    require '../vendor/autoload.php';

    use \simpleform\HTMLForm;
    use \simpleform\validation\rules\{
        StringLength,
        NotEmpty
    };
    use \simpleform\validation\DataSourceValidator;

    $formValidator = new DataSourceValidator();

    if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
        $form = new HTMLForm($_POST);

        $formValidator->addRule('name', new StringLength(8, 3));
        $formValidator->addRule('email', new NotEmpty());
        $formValidator->validate($form);
    }

    if (
        'GET' == $_SERVER['REQUEST_METHOD'] ||
        ( 'POST' == $_SERVER['REQUEST_METHOD'] && $formValidator->isHasErrors() )
    ) {
        require 'form-template.php';
    }
