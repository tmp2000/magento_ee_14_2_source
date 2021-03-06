<?php
/**
 * Magento Enterprise Edition
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Enterprise Edition End User License Agreement
 * that is bundled with this package in the file LICENSE_EE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.magento.com/license/enterprise-edition
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Tests
 * @package     Tests_Functional
 * @copyright Copyright (c) 2006-2015 X.commerce, Inc. (http://www.magento.com)
 * @license http://www.magento.com/license/enterprise-edition
 */

namespace Mage\Catalog\Test\Fixture\CatalogProductAttribute;

use Magento\Mtf\Fixture\FixtureInterface;

/**
 * Prepare Manage Options for attribute.
 */
class Options implements FixtureInterface
{
    /**
     * Prepared dataSet data.
     *
     * @var array
     */
    protected $data;

    /**
     * Data set configuration settings.
     *
     * @var array
     */
    protected $params;

    /**
     * Options ids.
     *
     * @var array
     */
    protected $optionsIds = [];

    /**
     * @constructor
     * @param array $params
     * @param array $data [optional]
     */
    public function __construct(array $params, array $data = [])
    {
        $this->params = $params;
        if (isset($data['preset'])) {
            $this->data = $this->getPreset($data['preset']);
        } elseif (isset($data['value'])) {
            $this->data = $data['value'];
        }

        $this->optionsIds = isset($data['optionsIds']) ? $data['optionsIds'] : $this->optionsIds;
    }

    /**
     * Get options ids.
     *
     * @return array
     */
    public function getOptionsIds()
    {
        return $this->optionsIds;
    }

    /**
     * Persist attribute options.
     *
     * @return void
     */
    public function persist()
    {
        //
    }

    /**
     * Return prepared data set.
     *
     * @param string|null $key [optional]
     * @return mixed
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function getData($key = null)
    {
        return $this->data;
    }

    /**
     * Return data set configuration settings.
     *
     * @return array
     */
    public function getDataConfig()
    {
        return $this->params;
    }

    /**
     * Preset for Attribute manage options.
     *
     * @param string $name
     * @return array|null
     */
    protected function getPreset($name)
    {
        $presets = [
            'default' => [
                [
                    'is_default' => 'Yes',
                    'admin' => 'blue',
                    'view' => 'blue'
                ],
                [
                    'admin' => 'black',
                    'view' => 'black'
                ]
            ],
            'with_three_options' => [
                [
                    'is_default' => 'Yes',
                    'admin' => 'black',
                    'view' => 'option_0_%isolation%'
                ],
                [
                    'is_default' => 'No',
                    'admin' => 'white',
                    'view' => 'option_1_%isolation%'
                ],
                [
                    'is_default' => 'No',
                    'admin' => 'green',
                    'view' => 'option_2_%isolation%'
                ]
            ],
        ];

        if (!isset($presets[$name])) {
            return null;
        }

        return $presets[$name];
    }
}
