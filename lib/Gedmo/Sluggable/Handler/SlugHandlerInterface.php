<?php

namespace Gedmo\Sluggable\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Gedmo\Sluggable\SluggableListener;
use Gedmo\Sluggable\Mapping\Event\SluggableAdapter;

interface SlugHandlerInterface
{
    /**
     * Construct the slug handler
     *
     * @param Doctrine\Common\Persistence\ObjectManager $om
     * @param Gedmo\Sluggable\SluggableListener $sluggable
     * @param array $options
     */
    function __construct(ObjectManager $om, SluggableListener $sluggable, array $options);

    /**
     * Callback on slug handlers right after the slug is built
     *
     * @param Gedmo\Sluggable\Mapping\Event\SluggableAdapter $ea
     * @param array $config
     * @param object $object
     * @param string $slug
     * @return void
     */
    function postSlugBuild(SluggableAdapter $ea, array &$config, $object, &$slug);

    /**
     * Callback for slug handlers on slug completion
     *
     * @param Gedmo\Sluggable\Mapping\Event\SluggableAdapter $ea
     * @param array $config
     * @param object $object
     * @param string $slug
     * @return void
     */
    function onSlugCompletion(SluggableAdapter $ea, array &$config, $object, &$slug);

    /**
     * Validate handler options
     *
     * @param array $options
     */
    static function validate(array $options, ClassMetadata $meta);
}