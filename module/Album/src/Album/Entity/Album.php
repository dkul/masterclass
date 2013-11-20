<?php

namespace Album\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="title_artist", type="string", length=255, nullable=true)
     */
    private $titleArtist;

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
     * @return integer
     */
    public function setAlbumId($albumId)
    {
        $this->albumId = $albumId;
    }

    public function getAlbumTitle(){
        return $this->title;
    }

    public function setAlbumTitle($albumTitle)
    {
        $this->title = $albumTitle;
    }

    public function getAlbumArtistTitle(){
        return $this->titleArtist;
    }

    public function setAlbumArtistTitle($albumArtistTitle)
    {
        $this->titleArtist = $albumArtistTitle;
    }

}