<?php

namespace Album\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollections as ArrayCollections;

/**
 * Album
 *
 * @ORM\Table(name="album")
 * @ORM\Entity
 */
class Album
{
    /**
     * @var integer
     *
     * @ORM\Column(name="album_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $albumId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=125, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * //@ORM\Column(name="description", type="string", length=400, nullable=false)
     */
    //private $description;

    /**
     * Get albumId
     *
     * @return integer 
     */
    public function getAlbumId()
    {
        return $this->albumId;
    }
    /**
     * Set albumId
     *
     */
    public function setAlbumId($albumId)
    {
        $this->albumId = $albumId;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($albumTitle)
    {
        $this->title = $albumTitle;
    }

    /*public function getDescription(){
        return $this->description;
    }

    public function setDescription($albumDesc)
    {
        $this->description = $albumDesc;
    }*/
}