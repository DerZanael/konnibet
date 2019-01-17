<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Cocur\Slugify\Slugify;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $sg = new Slugify();
        dump($sg->slugify("frjklhjrf ehvgkj ezvhk KR KJHjhg rk"));
        return $this->render("default/index.html.twig", array(

        ));
    }
}
