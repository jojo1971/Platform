<?php
/**
 * Created by PhpStorm.
 * User: jojo2
 * Date: 15/09/2016
 * Time: 23:25
 */

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Skill;


class loadSkill implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
       $names = array('C++','Symfony', 'SQL', 'Bloc-notes', 'Photoshop');
        
        foreach ($names as $name){
            $skill = new Skill();
            $skill->setName($name);
        
            $manager->persist($skill);
        }
        $manager->flush();
        
    }
}