<?php
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\LexerConfig;

require_once __DIR__ . '/vendor/autoload.php';

$config = new LexerConfig();
$config->setDelimiter("\t")
    ->setFromCharset('SJIS-win')
    ->setToCharset('UTF-8');

$lexer = new Lexer($config);

$interpreter = new Interpreter();

$interpreter->addObserver(function(array $columns) {
    var_dump($columns);
});

$lexer->parse('sample.csv', $interpreter);