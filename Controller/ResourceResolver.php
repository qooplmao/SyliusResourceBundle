<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\ResourceBundle\Controller;

use Sylius\Component\Resource\Repository\RepositoryInterface;

/**
 * Resource resolver.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@sylius.pl>
 */
class ResourceResolver
{
    /**
     * @var Configuration
     */
    private $config;

    public function __construct(Configuration $config)
    {
        $this->config = $config;
    }

    /**
     * Get resources via repository based on the configuration.
     *
     * @param object              $provider
     * @param string              $defaultMethod
     * @param array               $defaultArguments
     *
     * @return mixed
     */
    public function getResource($provider, $defaultMethod, array $defaultArguments = array())
    {
        $callable = array($provider, $this->config->getProviderMethod($defaultMethod));
        $arguments = $this->config->getProviderArguments($defaultArguments);

        return call_user_func_array($callable, $arguments);
    }

    /**
     * Create resource.
     *
     * @param object              $factory
     * @param string              $defaultMethod
     * @param array               $defaultArguments
     *
     * @return mixed
     */
    public function createResource($factory, $defaultMethod, array $defaultArguments = array())
    {
        $callable = array($factory, $this->config->getFactoryMethod($defaultMethod));
        $arguments = $this->config->getFactoryArguments($defaultArguments);

        return call_user_func_array($callable, $arguments);
    }
}
