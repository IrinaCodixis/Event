<?php
namespace Test\EventBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Test\EventBundle\Entity\Guestss;
 
class LoadEventData extends AbstractFixture implements OrderedFixtureInterface
{
  public function load(ObjectManager $em)
  {
    $guest_one = new Guestss();
    $guest_one->setName('John Smith');
    $guest_one->setEmail('john.smith@example.com');
    $guest_one->setIsAttending(true);
 
     
    $em->persist($guest_one);
     
    $em->flush();
  }
  
  public function getOrder()
  {
    return 1; // the order in which fixtures will be loaded
  }
 
}

?>