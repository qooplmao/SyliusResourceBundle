<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\ResourceBundle;

use Sylius\Bundle\ResourceBundle\DependencyInjection\Compiler\ObjectToIdentifierServicePass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Resource bundle.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@sylius.pl>
 */
class SyliusResourceBundle extends Bundle
{
    // Bundle driver list.
    const DRIVER_DOCTRINE_ORM           = 'doctrine/orm';
    const DRIVER_DOCTRINE_MONGODB_ODM   = 'doctrine/mongodb-odm';
    const DRIVER_DOCTRINE_PHPCR_ODM     = 'doctrine/phpcr-odm';

    const MAPPING_ANNOTATION            = 'annotation';
    const MAPPING_XML                   = 'xml';
    const MAPPING_YAML                  = 'yaml';

    const SERVICES_XML                  = 'xml';
    const SERVICES_YAML                 = 'yml';

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ObjectToIdentifierServicePass());
    }
}
