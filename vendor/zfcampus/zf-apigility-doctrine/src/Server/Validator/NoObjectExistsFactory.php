<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\Apigility\Doctrine\Server\Validator;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Validator\NoObjectExists;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayUtils;

class NoObjectExistsFactory implements FactoryInterface
{
    /**
     * Required for v2 compatibility.
     *
     * @var array
     */
    protected $options = [];

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return NoObjectExists
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        if (isset($options['entity_class'])) {
            $objectRepository = $container
                ->get(EntityManager::class)
                ->getRepository($options['entity_class']);

            $options = ArrayUtils::merge($options, ['object_repository' => $objectRepository]);
        }

        return new NoObjectExists($options);
    }

    /**
     * Create and return an NoObjectExists validator (v2).
     *
     * Proxies to `__invoke()`.
     *
     * @param ServiceLocatorInterface $container
     * @return NoObjectExists
     */
    public function createService(ServiceLocatorInterface $container)
    {
        if ($container instanceof AbstractPluginManager) {
            $container = $container->getServiceLocator() ?: $container;
        }

        return $this($container, NoObjectExists::class, $this->options);
    }

    /**
     * Allow injecting options at build time; required for v2 compatibility.
     *
     * @param array $options
     */
    public function setCreationOptions(array $options)
    {
        $this->options = $options;
    }
}
