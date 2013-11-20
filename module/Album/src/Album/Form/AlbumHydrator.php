<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kuleshov
 * Date: 19.11.13
 * Time: 15:26
 * To change this template use File | Settings | File Templates.
 */

namespace Album\Form;


use Album\Entity\Album;
use Zend\Stdlib\Hydrator\AbstractHydrator;

class AlbumHydrator extends AbstractHydrator
{
    /** @var \Album\Mapper\Album */
    protected $albumMapper;

    public function __construct($albumMapper)
    {
        $this->albumMapper = $albumMapper;
    }

    /**
     * Extract values from an object
     *
     * @param  Album/Entity/Album $album
     * @return array
     */
    public function extract($album)
    {
        return array(
            'albumId'     => $album->getAlbumId(),
            'title'       => $album->getAlbumTitle(),
            'artistTitle' => $album->getAlbumArtistTitle()
        );
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array  $data
     * @param  object $object
     * @return object
     */
    public function hydrate(array $data, $object)
    {

    }
}