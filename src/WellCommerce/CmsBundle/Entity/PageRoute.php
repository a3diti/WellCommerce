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

namespace WellCommerce\CmsBundle\Entity;

use WellCommerce\CommonBundle\Entity\Route;
use WellCommerce\CommonBundle\Entity\RouteInterface;

/**
 * Class PageRoute
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class PageRoute extends Route implements RouteInterface
{
    /**
     * @var PageInterface
     */
    protected $identifier;

    public function getType()
    {
        return 'page';
    }
}