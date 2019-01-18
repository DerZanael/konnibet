<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_home")
     */
    public function index()
    {
        return $this->render('admin/default/index.html.twig', [
        ]);
    }
}
