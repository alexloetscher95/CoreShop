<?php

declare(strict_types=1);

/*
 * CoreShop
 *
 * This source file is available under two different licenses:
 *  - GNU General Public License version 3 (GPLv3)
 *  - CoreShop Commercial License (CCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GPLv3 and CCL
 *
 */

namespace CoreShop\Bundle\CoreBundle\Fixtures\Data\Demo;

use CoreShop\Bundle\FixtureBundle\Fixture\VersionedFixtureInterface;
use CoreShop\Component\Product\Model\ProductUnitInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductUnitFixture extends AbstractFixture implements ContainerAwareInterface, VersionedFixtureInterface
{
    private ?ContainerInterface $container;

    public function getVersion(): string
    {
        return '2.0';
    }

    public function setContainer(ContainerInterface $container = null): void
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager): void
    {
        $factory = $this->container->get('coreshop.factory.product_unit');

        /**
         * @var ProductUnitInterface $productUnitPiece
         */
        $productUnitPiece = $factory->createNew();
        $productUnitPiece->setName('Piece');
        $productUnitPiece->setShortLabel('Pc', 'en');
        $productUnitPiece->setShortPluralLabel('Pcs', 'en');
        $productUnitPiece->setFullLabel('Piece', 'en');
        $productUnitPiece->setFullPluralLabel('Pieces', 'en');
        $productUnitPiece->setShortLabel('Stk', 'de');
        $productUnitPiece->setShortPluralLabel('Stk', 'de');
        $productUnitPiece->setFullLabel('Stück', 'de');
        $productUnitPiece->setFullPluralLabel('Stück', 'de');

        /**
         * @var ProductUnitInterface $productUnitCarton
         */
        $productUnitCarton = $factory->createNew();
        $productUnitCarton->setName('Carton');
        $productUnitCarton->setShortLabel('Ctn', 'en');
        $productUnitCarton->setShortPluralLabel('Ctns', 'en');
        $productUnitCarton->setFullLabel('Carton', 'en');
        $productUnitCarton->setFullPluralLabel('Cartons', 'en');
        $productUnitCarton->setShortLabel('Ktn', 'de');
        $productUnitCarton->setShortPluralLabel('Ktne', 'de');
        $productUnitCarton->setFullLabel('Karton', 'de');
        $productUnitCarton->setFullPluralLabel('Kartone', 'de');

        /**
         * @var ProductUnitInterface $productUnitPalette
         */
        $productUnitPalette = $factory->createNew();
        $productUnitPalette->setName('Palette');
        $productUnitPalette->setShortLabel('Pal', 'en');
        $productUnitPalette->setShortPluralLabel('Pals', 'en');
        $productUnitPalette->setFullLabel('Palette', 'en');
        $productUnitPalette->setFullPluralLabel('Palettes', 'en');
        $productUnitPalette->setShortLabel('Pal', 'de');
        $productUnitPalette->setShortPluralLabel('Paln', 'de');
        $productUnitPalette->setFullLabel('Palette', 'de');
        $productUnitPalette->setFullPluralLabel('Paletten', 'de');

        $manager->persist($productUnitPiece);
        $manager->persist($productUnitCarton);
        $manager->persist($productUnitPalette);
        $manager->flush();

        $this->setReference('unit-piece', $productUnitPiece);
        $this->setReference('unit-carton', $productUnitCarton);
        $this->setReference('unit-palette', $productUnitPalette);
    }
}
