<?php
namespace Micromockup\Controllers;

use Micromockup\config\Init;
use Micromockup\db\models\Page as PageModel;

class Page extends Init{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new PageModel($this->connection);
    }
    
    public function index()
    {
        $pages = $this->model->getAllPages();
        echo $this->twig->render('views/page/page.html.twig', ['pages' => $pages]);
    }
}
