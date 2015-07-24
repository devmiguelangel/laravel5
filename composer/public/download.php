<?php

use App\Core\View\Template;
use App\Helpers\Pdf;

// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require '../vendor/autoload.php';

//require '../Course/Template.php';
//require '../Course/Pdf.php';

$data = array(
    'name'      => 'Miguel Mamani',
    'course'    => 'Curso de Laravel'
);

$html = Template::render('pdf/certificate', $data);

Pdf::render('sample', $html);