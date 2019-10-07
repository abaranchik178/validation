<?php

    require '../vendor/autoload.php';

    use \chungachanga\simpleform\HTMLForm;
    use \chungachanga\simpleform\validation\rules\{
        StringLength,
        NotEmpty,
        Email
    };
    use \chungachanga\simpleform\validation\DataSourceValidator;

//    $i18nConfig = \chungachanga\i18n\Config::getInstance();
//    $i18nConfig->setLang('ru');
//    $i18nConfig->setTranslationSourceDir( dirname(__FILE__, 2) . '/' . 'i18n');
//
//    $i18n = \chungachanga\i18n\I18N::getInstance();
//    $i18n->setConfig($i18nConfig);

    $formValidator = new DataSourceValidator();

    if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
        $form = new HTMLForm($_POST);

        $formValidator->addRule('name', new StringLength(8, 3));
        $formValidator->addRule('name', new NotEmpty());
        $formValidator->addRule('email', new NotEmpty());
        $formValidator->addRule('email', new Email());
        $formValidator->validate($form);
    }

    if (
        'GET' == $_SERVER['REQUEST_METHOD'] ||
        ( 'POST' == $_SERVER['REQUEST_METHOD'] && $formValidator->isHasErrors() )
    ) {
        require 'form-template.php';
    }
