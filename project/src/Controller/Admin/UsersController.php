<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use App\Form\UserType;

/**
 * @Route("/admin/users")
 */
class UsersController extends AbstractController
{
    /**
     * @Route("/{page<\d+>?1}", name="admin_users")
     */
    public function index(Request $request)
    {
        $order = $request->get("order"); if($order === null) $order = "displayedName";
        $dir = $request->get("dir"); if($dir === null) $dir = "asc";
        $page = ($request->query->get("page") !== null) ? $request->query->get("page") : $request->get("page"); if($page === null) $page = 1;

        $em = $this->get("doctrine");
        $q = $em->getRepository(User::class)->createQueryBuilder("u")
          ->addOrderBy("u.{$order}", $dir);

        $users = $q->getQuery()->getResult();

        return $this->render('admin/users/index.html.twig', [
          "order"=>$order,
          "dir"=>$dir,
          "page"=>$page,
          "users"=>$users,
        ]);
    }

    /**
     * @Route("/add", name="admin_users_add", methods={"GET", "POST"})
     */
    public function add(Request $request)
    {

        return $this->render("admin/users/form.html.twig", array(
          "mode"=>"add",
        ));
    }

    /**
     * @Route("/edit/{id<\d+>}-{seo}", name="admin_users_edit", methods={"GET", "POST"}, requirements={"seo"="[a-z0-9-]+"})
     */
    public function edit(Request $request)
    {

        return $this->render("admin/users/form.html.twig", array(
          "mode"=>"edit",
        ));
    }

    /**
     * @Route("/ban-list/{id}", name="admin_user_ban_list", methods={"GET"}, options={"expose"=true})
     */
    public function listBans(User $user)
    {
        return new Response($this->renderView("admin/users/banlist.html.twig", array(
          "user"=>$user,
        )));
    }

    /**
     * @Route("/ban", name="admin_user_ban", methods={"PUT"})
     */
    public function statBan(Request $request)
    {

        return $this->json(array("return"=>true, "value"=>$val));
    }
}
