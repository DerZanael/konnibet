<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public const SHIG_REF = "shig";
    public const HH_REF = "hogan";
    public const ANDRE_REF = "andre";
    public const PIPER_REF = "piper";
    public const SHAWN_REF = "shawn";
    public const TAKER_REF = "taker";

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $shig = new User();
        $shig->setEmail("francois@fdweb.fr");
        $shig->setDisplayedName("Shig");
        $shig->setDateCreation(new \Datetime("now"));
        $shig->setIsValid(true);
        $shig->setIsBanned(false);
        $shig->setIsAdmin(true);
        $shig->setIsSuperAdmin(true);
        $shig->setPassword($this->passwordEncoder->encodePassword($shig, "admin"));
        $manager->persist($shig);

        $hogan = new User();
        $hogan->setEmail("hh@kn.local");
        $hogan->setDisplayedName("Hulk Hogan");
        $hogan->setDateCreation(new \Datetime("now"));
        $hogan->setIsValid(false);
        $hogan->setIsBanned(false);
        $hogan->setIsAdmin(false);
        $hogan->setIsSuperAdmin(false);
        $hogan->setPassword($this->passwordEncoder->encodePassword($hogan, "hulkamania"));
        $manager->persist($hogan);

        $andre = new User();
        $andre->setEmail("andre@kn.local");
        $andre->setDisplayedName("Andre the Giant");
        $andre->setDateCreation(new \Datetime("now"));
        $andre->setIsValid(true);
        $andre->setIsBanned(false);
        $andre->setIsAdmin(false);
        $andre->setIsSuperAdmin(false);
        $andre->setPassword($this->passwordEncoder->encodePassword($andre, "megaslap"));
        $manager->persist($andre);

        $rowdy = new User();
        $rowdy->setEmail("rrp@kn.local");
        $rowdy->setDisplayedName("Rowdy Roddy Piper");
        $rowdy->setDateCreation(new \Datetime("now"));
        $rowdy->setIsValid(true);
        $rowdy->setIsBanned(true);
        $rowdy->setIsAdmin(false);
        $rowdy->setIsSuperAdmin(false);
        $rowdy->setPassword($this->passwordEncoder->encodePassword($rowdy, "kilt"));
        $manager->persist($rowdy);

        $shawn = new User();
        $shawn->setEmail("sexy@kn.local");
        $shawn->setDisplayedName("Shawn Michaels");
        $shawn->setDateCreation(new \Datetime("now"));
        $shawn->setIsValid(true);
        $shawn->setIsBanned(false);
        $shawn->setIsAdmin(true);
        $shawn->setIsSuperAdmin(false);
        $shawn->setPassword($this->passwordEncoder->encodePassword($shawn, "sexyboy"));
        $manager->persist($shawn);

        $taker = new User();
        $taker->setEmail("dead@kn.local");
        $taker->setDisplayedName("The Undertaker");
        $taker->setDateCreation(new \Datetime("now"));
        $taker->setIsValid(false);
        $taker->setIsBanned(false);
        $taker->setIsAdmin(false);
        $taker->setIsSuperAdmin(false);
        $taker->setPassword($this->passwordEncoder->encodePassword($taker, "tombstone"));
        $manager->persist($taker);

        $manager->flush();
        //For further use in other fixtures
        $this->addReference(self::SHIG_REF, $shig);
        $this->addReference(self::HH_REF, $hogan);
        $this->addReference(self::ANDRE_REF, $andre);
        $this->addReference(self::PIPER_REF, $rowdy);
        $this->addReference(self::SHAWN_REF, $shawn);
        $this->addReference(self::TAKER_REF, $taker);
    }
}
