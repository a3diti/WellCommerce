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

namespace WellCommerce\AppBundle\Entity;

use Doctrine\Common\Collections\Collection;
use WellCommerce\AppBundle\Entity\Attribute\GroupInterface;
use WellCommerce\AppBundle\Entity\ShopCollectionAwareInterface;
use WellCommerce\AppBundle\Entity\TaxInterface;
use WellCommerce\AppBundle\Entity\BlameableInterface;
use WellCommerce\AppBundle\Entity\Dimension;
use WellCommerce\AppBundle\Entity\DiscountablePrice;
use WellCommerce\AppBundle\Entity\Price;
use WellCommerce\AppBundle\Entity\TimestampableInterface;
use WellCommerce\AppBundle\Entity\TranslatableInterface;
use WellCommerce\AppBundle\Calculator\ShippingCalculatorSubjectInterface;

/**
 * Interface ProductInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ProductInterface extends
    TranslatableInterface,
    TimestampableInterface,
    BlameableInterface,
    ShopCollectionAwareInterface,
    ProducerAwareInterface,
    UnitAwareInterface,
    AvailabilityAwareInterface,
    ShippingCalculatorSubjectInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getSku();

    /**
     * @param string $sku
     */
    public function setSku($sku);

    /**
     * @return float
     */
    public function getStock();

    /**
     * @param float $stock
     */
    public function setStock($stock);

    /**
     * @return boolean
     */
    public function getTrackStock();

    /**
     * @param boolean $trackStock
     */
    public function setTrackStock($trackStock);

    /**
     * @return Collection
     */
    public function getStatuses();

    /**
     * @return Collection
     */
    public function setStatuses(Collection $statuses);

    /**
     * @return Collection
     */
    public function getProductPhotos();

    /**
     * @param Collection $photos
     */
    public function setProductPhotos(Collection $photos);

    /**
     * @param ProductPhoto $photo
     */
    public function addProductPhoto(ProductPhoto $photo);

    /**
     * @return Collection
     */
    public function getCategories();

    /**
     * @param Collection $collection
     */
    public function setCategories(Collection $collection);

    /**
     * @param CategoryInterface $category
     */
    public function addCategory(CategoryInterface $category);

    /**
     * @return DiscountablePrice
     */
    public function getSellPrice();

    /**
     * @param DiscountablePrice $sellPrice
     */
    public function setSellPrice(DiscountablePrice $sellPrice);

    /**
     * @return Price
     */
    public function getBuyPrice();

    /**
     * @param Price $buyPrice
     */
    public function setBuyPrice(Price $buyPrice);

    /**
     * @return float
     */
    public function getWeight();

    /**
     * @param float $weight
     */
    public function setWeight($weight);

    /**
     * @return Dimension
     */
    public function getDimension();

    /**
     * @param Dimension $dimension
     */
    public function setDimension(Dimension $dimension);

    /**
     * @return float
     */
    public function getPackageSize();

    /**
     * @param float $packageSize
     */
    public function setPackageSize($packageSize);

    /**
     * @return GroupInterface
     */
    public function getAttributeGroup();

    /**
     * @param GroupInterface $attributeGroup
     */
    public function setAttributeGroup(GroupInterface $attributeGroup);

    /**
     * @return Collection
     */
    public function getAttributes();

    /**
     * @param Collection $attributes
     */
    public function setAttributes(Collection $attributes);

    /**
     * @param ProductAttributeInterface $productAttribute
     */
    public function removeAttribute(ProductAttributeInterface $productAttribute);

    /**
     * @return TaxInterface
     */
    public function getBuyPriceTax();

    /**
     * @param TaxInterface $buyPriceTax
     */
    public function setBuyPriceTax(TaxInterface $buyPriceTax);

    /**
     * @return TaxInterface
     */
    public function getSellPriceTax();

    /**
     * @param TaxInterface $sellPriceTax
     */
    public function setSellPriceTax(TaxInterface $sellPriceTax);

    /**
     * @return Collection
     */
    public function getReviews();
}