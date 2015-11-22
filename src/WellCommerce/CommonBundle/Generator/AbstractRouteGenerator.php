<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\CommonBundle\Generator;

use Symfony\Component\Routing\Route as SymfonyRoute;
use WellCommerce\CommonBundle\Entity\RouteInterface;

/**
 * Class AbstractRouteGenerator
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
abstract class AbstractRouteGenerator implements RouteGeneratorInterface
{
    /**
     * @var array
     */
    protected $defaults;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var array
     */
    protected $requirements;

    /**
     * @var array
     */
    protected $pattern;

    /**
     * Constructor
     *
     * @param array  $defaults
     * @param array  $requirements
     * @param string $pattern
     * @param array  $options
     */
    public function __construct(array $defaults = [], array $requirements = [], array $pattern = [], array $options = [])
    {
        $this->defaults     = $defaults;
        $this->options      = $options;
        $this->requirements = $requirements;
        $this->pattern      = $this->generateStaticPattern($pattern);
    }

    /**
     * {@inheritdoc}
     */
    public function generate(RouteInterface $resource)
    {
        $this->defaults['id']      = $resource->getIdentifier()->getId();
        $this->defaults['_locale'] = $resource->getLocale();

        return new SymfonyRoute(
            $this->getPath($resource),
            $this->defaults,
            $this->requirements,
            $this->options
        );
    }

    /**
     * Returns a concatenated path
     *
     * @param RouteInterface $resource
     *
     * @return string
     */
    protected function getPath(RouteInterface $resource)
    {
        if (strlen($this->pattern)) {
            return $resource->getPath() . RouteGeneratorInterface::PATH_PARAMS_SEPARATOR . $this->pattern;
        }

        return $resource->getPath();
    }

    /**
     * @return string
     */
    protected function generateStaticPattern(array $pattern = [])
    {
        $parts = [];
        foreach ($pattern as $key => $val) {
            $parts[] = '{' . $key . '}';
        }

        return implode(RouteGeneratorInterface::PATH_PARAMS_SEPARATOR, $parts);
    }

    /**
     * {@inheritdoc}
     */
    abstract public function supports($strategy);
}