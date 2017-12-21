<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Group;
use AppBundle\Entity\Patient;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadPropertyManagerData
 */
class LoadPatientData extends AbstractFixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $group = new Group();
        $group->setName('Manuela');
        $manager->persist($group);

        $group1 = new Group();
        $group1->setName('Ittri');
        $manager->persist($group1);

        $group2 = new Group();
        $group2->setName('Mulham');
        $manager->persist($group2);

        $group3 = new Group();
        $group3->setName('Mende');
        $manager->persist($group3);

        $group4 = new Group();
        $group4->setName('Empty');
        $manager->persist($group4);

        $patient = new Patient();
        $patient->setEmail('artur@gmail.com');
        $patient->setName('Vier Testfall');
        $patient->setStatus(true);
        $patient->addGroup($group1);
        $patient->addGroup($group2);
        $patient->setPhone('+1223456899');

        $manager->persist($patient);

        $patient = new Patient();
        $patient->setEmail('kirill@gmail.com');
        $patient->setName('Beata Brysz');
        $patient->setStatus(false);
        $patient->addGroup($group1);
        $patient->addGroup($group2);
        $patient->setPhone('+1223456891');

        $manager->persist($patient);

        $patient = new Patient();
        $patient->setEmail('artur@gmail.com');
        $patient->setName('Claus Nolte');
        $patient->setStatus(true);
        $patient->addGroup($group3);
        $patient->addGroup($group);
        $patient->setPhone('+1223456899');

        $manager->persist($patient);

        $patient = new Patient();
        $patient->setEmail('kirill@gmail.com');
        $patient->setName('Andrea Kuckuck');
        $patient->setStatus(true);
        $patient->addGroup($group3);
        $patient->addGroup($group);
        $patient->setPhone('+1223456891');

        $manager->persist($patient);

        $patient = new Patient();
        $patient->setEmail('artur@gmail.com');
        $patient->setName('Frank Weigel');
        $patient->setStatus(false);
        $patient->addGroup($group1);
        $patient->addGroup($group2);
        $patient->setPhone('+1223456899');

        $manager->persist($patient);

        $patient = new Patient();
        $patient->setEmail('kirill@gmail.com');
        $patient->setName('Marie Meier');
        $patient->setStatus(true);
        $patient->addGroup($group1);
        $patient->addGroup($group2);
        $patient->setPhone('+1223456891');

        $manager->persist($patient);

        $patient = new Patient();
        $patient->setEmail('kirill@gmail.com');
        $patient->setName('Heike Otto');
        $patient->setStatus(true);
        $patient->addGroup($group1);
        $patient->addGroup($group2);
        $patient->setPhone('+1223456891');

        $manager->persist($patient);

        for($i=0; $i<2000; $i++) {
            $patient = new Patient();
            $patient->setEmail('kirill@gmail.com');
            $patient->setName('Heike Otto' . $i);
            $patient->setStatus(true);
            $patient->addGroup($group1);
            $patient->addGroup($group2);
            $patient->setPhone('+1223456891');

            $manager->persist($patient);
        }

        $patient = new Patient();
        $patient->setEmail('kirill@gmail.com');
        $patient->setName('Test User');
        $patient->setStatus(false);
        $patient->addGroup($group4);
        $patient->setPhone('+1223456891');

        $manager->persist($patient);

        $manager->flush();
    }
}
