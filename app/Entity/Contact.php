<?php
// app/Model/Entity/Contact.php
namespace App\Entity;

/**
 * @Entity
 * @Table(name="contacts")
 */
class Contact
{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer")
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $state;

    // Getters and setters...
}