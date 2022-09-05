<?php

    namespace php\projeto_turim\Exceptions;

    class AddFilhoException extends \DomainException{

        public function __construct(string $mensagem){
            parent::__construct($mensagem);
        }

    }
