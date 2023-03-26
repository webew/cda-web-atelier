<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Marque;
use App\Entity\Piece;
use App\Entity\Statut;
use App\Entity\Type;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $userPwdHasher;

    public function __construct(UserPasswordHasherInterface $userPwdHasher)
    {
        $this->userPwdHasher = $userPwdHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // USERS
        $toto = new User();
        $toto->setEmail('toto@toto.fr');
        $userPwdHash = $this->userPwdHasher->hashPassword($toto, 'toto');
        $toto->setPassword($userPwdHash);
        $manager->persist($toto);

        $admin = new User();
        $admin->setEmail('admin@admin.fr');
        $userPwdHash = $this->userPwdHasher->hashPassword($admin, 'admin');
        $admin->setPassword($userPwdHash);
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        // CLIENTS
        $clients = ['Helioparc', 'Total', 'Step', 'Terega'];
        foreach ($clients as $client) {
            $c = new Client();
            $c->setRaisonSociale($client);
            $manager->persist($c);
        }

        // MARQUES
        $marques = ['Dell', 'HP', 'Lenovo', 'Xerox'];
        foreach ($marques as $marque) {
            $m = new Marque();
            $m->setNom($marque);
            $manager->persist($m);
        }

        // TYPES
        $types = ['PC portable', 'PC fixe', 'Imprimante', 'Ecran'];
        foreach ($types as $type) {
            $t = new Type();
            $t->setLibelle($type);
            $manager->persist($t);
        }

        // STATUTS
        $statuts = ['En cours', 'Clôturé'];
        foreach ($statuts as $statut) {
            $s = new Statut();
            $s->setLibelle($statut);
            $manager->persist($s);
        }

        // PIECES
        $pieces = [
            ["designation" => "Disque dur SSD 512 Go", "pachat" => 50, "pvente" => 60],
            ["designation" => "Disque dur 7200 tr/min 256Go", "pachat" => 30, "pvente" => 40],
            ["designation" => "Connecteur spécial", "pachat" => 15, "pvente" => 20]
        ];
        foreach ($pieces as $piece) {
            $p = new Piece();
            $p->setDesignation($piece['designation']);
            $p->setPuAchatHt($piece["pachat"]);
            $p->setPuVenteHt($piece["pvente"]);
            $manager->persist($p);
        }


        // MATERIELS
        // $materiels = [];

        $manager->flush();
    }
}
