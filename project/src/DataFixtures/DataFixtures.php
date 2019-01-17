<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\DataFixtures\UserFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use App\Entity\StreamPlatform;
use App\Entity\Stream;
use App\Entity\Genre;
use App\Entity\VideoGame;
use App\Entity\Competitor;
use App\Entity\Event;

use Cocur\Slugify\Slugify;

class DataFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $sg = new Slugify();
        //Users
        $shig=$this->getReference(UserFixtures::SHIG_REF);
        $hogan=$this->getReference(UserFixtures::HH_REF);
        $andre=$this->getReference(UserFixtures::ANDRE_REF);
        $piper=$this->getReference(UserFixtures::PIPER_REF);
        $shawn=$this->getReference(UserFixtures::SHAWN_REF);
        $taker=$this->getReference(UserFixtures::TAKER_REF);
        $users = compact("shig", "hogan", "andre", "piper", "shawn", "taker");

        //Streams & platforms -- actually it most likely be only twitch...
        $youtube = new StreamPlatform();
        $youtube->setName("YouTube");
        $youtube->setUrl("https://www.youtube.com/user/%s");
        $manager->persist($youtube);

        $twitch = new StreamPlatform();
        $twitch->setName("Twitch");
        $twitch->setUrl("https://www.twitch.tv/%s");
        $manager->persist($twitch);

        $st_ow = new Stream();
        $st_ow->setName("Overwatch official (English)");
        $st_ow->setSeo("playoverwatch");
        $st_ow->setPlatform($twitch);
        $manager->persist($st_ow);

        $st_lck1 = new Stream();
        $st_lck1->setName("LCK (English)");
        $st_lck1->setSeo("lck1");
        $st_lck1->setPlatform($twitch);
        $manager->persist($st_lck1);

        $st_oglol = new Stream();
        $st_oglol->setName("O'gaming LoL (French)");
        $st_oglol->setSeo("ogaminglol");
        $st_oglol->setPlatform($twitch);
        $manager->persist($st_oglol);

        //Videogames & Genres
        $fps = new Genre();
        $fps->setName("First-person Shooter");
        $fps->setAcronym("FPS");
        $fps->setSeo($sg->slugify($fps->getAcronym()));
        $manager->persist($fps);

        $tps = new Genre();
        $tps->setName("Third-person Shooter");
        $tps->setAcronym("TPS");
        $tps->setSeo($sg->slugify($tps->getAcronym()));
        $manager->persist($tps);

        $moba = new Genre();
        $moba->setName("Multiplayer Online Battle Arena");
        $moba->setAcronym("MOBA");
        $moba->setSeo($sg->slugify($moba->getAcronym()));
        $manager->persist($moba);

        $racing = new Genre();
        $racing->setName("Racing game");
        $racing->setAcronym("RACING");
        $racing->setSeo($sg->slugify($racing->getAcronym()));
        $manager->persist($racing);

        $br = new Genre();
        $br->setName("Battle Royale");
        $br->setAcronym("BR");
        $br->setSeo($sg->slugify($br->getAcronym()));
        $manager->persist($br);

        $fg = new Genre();
        $fg->setName("Fighting Game");
        $fg->setAcronym("FG");
        $fg->setSeo($sg->slugify($fg->getAcronym()));
        $manager->persist($fg);

        $sports = new Genre();
        $sports->setName("Sports");
        $sports->setAcronym("SPORTS");
        $sports->setSeo($sg->slugify($sports->getAcronym()));
        $manager->persist($sports);

        $tb = new Genre();
        $tb->setName("Team-based game");
        $tb->setAcronym("TEAM");
        $tb->setSeo($sg->slugify($tb->getAcronym()));
        $manager->persist($tb);

        $sp = new Genre();
        $sp->setName("Single-player game");
        $sp->setAcronym("SP");
        $sp->setSeo($sg->slugify($sp->getAcronym()));
        $manager->persist($sp);

        $strat = new Genre();
        $strat->setName("Strategy game");
        $strat->setAcronym("STRAT");
        $strat->setSeo($sg->slugify($strat->getAcronym()));
        $manager->persist($strat);

        $lol = new VideoGame();
        $lol->setName("League of Legends");
        $lol->setAcronym("LoL");
        $lol->setSeo($sg->slugify($lol->getAcronym()));
        $lol->setEditor("Riot Games");
        $lol->setWebsite("http://wwww.leagueoflegends.com/");
        $lol->setPic($lol->getSeo().".png");
        $lol->addGenre($moba);
        $lol->addGenre($tb);
        $manager->persist($lol);

        $dota = new VideoGame();
        $dota->setName("DoTA 2");
        $dota->setAcronym("DoTA2");
        $dota->setSeo($sg->slugify($dota->getAcronym()));
        $dota->setEditor("Valve Software");
        $dota->setWebsite("http://wwww.dota2.com/");
        $dota->setPic($dota->getSeo().".png");
        $dota->addGenre($moba);
        $dota->addGenre($tb);
        $manager->persist($dota);

        $ow = new VideoGame();
        $ow->setName("Overwatch");
        $ow->setAcronym("OW");
        $ow->setSeo($sg->slugify($ow->getAcronym()));
        $ow->setEditor("Blizzard Entertainment");
        $ow->setWebsite("http://wwww.playoverwatch.com/");
        $ow->setPic($ow->getSeo().".png");
        $ow->addGenre($fps);
        $ow->addGenre($tb);
        $manager->persist($ow);

        $csgo = new VideoGame();
        $csgo->setName("Counter Strike : Global Offensive");
        $csgo->setAcronym("CS:GO");
        $csgo->setSeo($sg->slugify($csgo->getAcronym()));
        $csgo->setEditor("Valve Software");
        $csgo->setWebsite("https://blog.counter-strike.net/");
        $csgo->setPic($csgo->getSeo().".png");
        $csgo->addGenre($fps);
        $csgo->addGenre($tb);
        $manager->persist($csgo);

        $sfv = new VideoGame();
        $sfv->setName("Street Fighter V");
        $sfv->setAcronym("SFV");
        $sfv->setSeo($sg->slugify($sfv->getAcronym()));
        $sfv->setEditor("Capcom");
        $sfv->setWebsite("http://www.streetfighter.com/");
        $sfv->setPic($sfv->getSeo().".png");
        $sfv->addGenre($fg);
        $sfv->addGenre($sp);
        $manager->persist($sfv);

        $dbfz = new VideoGame();
        $dbfz->setName("DragonBall FighterZ");
        $dbfz->setAcronym("DBFZ");
        $dbfz->setSeo($sg->slugify($dbfz->getAcronym()));
        $dbfz->setEditor("Namco Bandai");
        $dbfz->setWebsite("https://www.bandainamcoent.com/games/dragon-ball-fighterz");
        $dbfz->setPic($dbfz->getSeo().".png");
        $dbfz->addGenre($fg);
        $dbfz->addGenre($sp);
        $manager->persist($dbfz);

        $fifa = new VideoGame();
        $fifa->setName("FIFA 2019");
        $fifa->setAcronym("FIFA19");
        $fifa->setSeo($sg->slugify($fifa->getAcronym()));
        $fifa->setEditor("Electronic Arts");
        $fifa->setWebsite("https://www.easports.com/fr/fifa");
        $fifa->setPic($fifa->getSeo().".png");
        $fifa->addGenre($sports);
        $fifa->addGenre($sp);
        $manager->persist($fifa);

        $sc2 = new VideoGame();
        $sc2->setName("Starcraft II");
        $sc2->setAcronym("SC2");
        $sc2->setSeo($sg->slugify($sc2->getAcronym()));
        $sc2->setEditor("Blizzard Entertainment");
        $sc2->setWebsite("https://starcraft2.com/");
        $sc2->setPic($sc2->getSeo().".png");
        $sc2->addGenre($strat);
        $sc2->addGenre($sp);
        $sc2->addGenre($tb);
        $manager->persist($sc2);

        //Some events
        $lck = new Event();
        $lck->setVideoGame($lol);
        $lck->setName("LCK Spring 2019");
        $lck->setSeo($sg->slugify($lck->getName()));
        $lck->setDateStart(new \Datetime("2019-01-23", new \DateTimeZone("UTC")));
        $lck->setDateEnd(new \Datetime("2019-03-31", new \DateTimeZone("UTC")));
        $lck->addStream($st_lck1);
        $lck->addStream($st_oglol);
        $manager->persist($lck);

        $owl = new Event();
        $owl->setVideoGame($ow);
        $owl->setName("Overwatch League 2019");
        $owl->setSeo($sg->slugify($owl->getName()));
        $owl->setDateStart(new \Datetime("2019-02-15", new \DateTimeZone("UTC")));
        $owl->setDateStart(new \Datetime("2019-08-25", new \DateTimeZone("UTC")));
        $owl->addStream($st_ow);
        $manager->persist($owl);

        //Teams - players
        $fnc = new Competitor();
        $fnc->setName("Fnatic");
        $fnc->setAcronym("FNC");
        $fnc->setSeo($sg->slugify($fnc->getAcronym()));
        $fnc->setPic($fnc->getSeo().".png");
        $fnc->setIsTeam(true);
        $fnc->setUrl("https://www.fnatic.com/");
        $fnc->addVideoGame($lol);
        $fnc->addVideoGame($csgo);
        $fnc->addVideoGame($dota);
        $manager->persist($fnc);

        $tsm = new Competitor();
        $tsm->setName("Team SoloMid");
        $tsm->setAcronym("TSM");
        $tsm->setSeo($sg->slugify($tsm->getAcronym()));
        $tsm->setPic($tsm->getSeo().".png");
        $tsm->setIsTeam(true);
        $tsm->setUrl("https://tsm.gg/");
        $tsm->addVideoGame($lol);
        $tsm->addVideoGame($ow);
        $manager->persist($tsm);

        $lsf = new Competitor();
        $lsf->setName("London Spitfire");
        $lsf->setAcronym("LSF");
        $lsf->setSeo($sg->slugify($lsf->getAcronym()));
        $lsf->setPic($lsf->getSeo().".png");
        $lsf->setIsTeam(true);
        $lsf->setUrl("https://spitfire.overwatchleague.com/");
        $lsf->addVideoGame($ow);
        $manager->persist($lsf);

        $pe = new Competitor();
        $pe->setName("Paris Eternal");
        $pe->setAcronym("PET");
        $pe->setSeo($sg->slugify($pe->getAcronym()));
        $pe->setPic($pe->getSeo().".png");
        $pe->setIsTeam(true);
        $pe->addVideoGame($ow);
        $manager->persist($pe);

        $sf = new Competitor();
        $sf->setName("SonicFox");
        $sf->setAcronym("SFx");
        $sf->setSeo($sg->slugify($sf->getAcronym()));
        $sf->setPic($sf->getSeo().".png");
        $sf->setIsTeam(false);
        $sf->setUrl("https://twitter.com/sonicfox5000");
        $sf->addVideoGame($dbfz);
        $manager->persist($sf);

        $go1 = new Competitor();
        $go1->setName("Goichi Kishida");
        $go1->setAcronym("GO1");
        $go1->setSeo($sg->slugify($go1->getAcronym()));
        $go1->setPic($go1->getSeo().".png");
        $go1->setIsTeam(false);
        $go1->addVideoGame($dbfz);
        $manager->persist($go1);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
