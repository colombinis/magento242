<?php

namespace Sacsi\Comuna\Plugin\Model\Rule\Condition;

/**
 * Address rule condition data model.
 */
class Address {
    const ATTRIBUTE_CODE ='comuna_id';

    /**
     * @var \Magento\Directory\Model\Config\Source\Country
     */
    protected $_directoryCountry;

    /**
     * @param \Magento\Directory\Model\Config\Source\Country $directoryCountry
     */
    public function __construct(
        \Magento\Directory\Model\Config\Source\Country $directoryCountry
    ) {
        $this->_directoryCountry = $directoryCountry;
    }

    /**
     * Load attribute options
     *
     * @return $this
     */
    public function afterLoadAttributeOptions(
        \Magento\SalesRule\Model\Rule\Condition\Address $subject,
        $result
    )
    {
        $attributes = $subject->getAttributeOption();
        $attributes[ self::ATTRIBUTE_CODE ] = __('Envio Codigo Comuna');

        $subject->setAttributeOption($attributes);

        return $subject;
    }

    /**
     * Get input type
     *
     * @return string
     */
    public function afterGetInputType(
        \Magento\SalesRule\Model\Rule\Condition\Address $subject,
        $result
    )
    {
        switch ($subject->getAttribute()) {
            case self::ATTRIBUTE_CODE:
                return 'select';
        }
        return 'string';
    }

    /**
     * Get value element type
     *
     * @return string
     */
    public function afterGetValueElementType(
        \Magento\SalesRule\Model\Rule\Condition\Address $subject,
        $result
    )
    {
        switch ($subject->getAttribute()) {
            case self::ATTRIBUTE_CODE:
                return 'select';
        }
        return 'text';
    }

    /**
     * Get value select options
     *
     * @return array|mixed
     */
    public function afterGetValueSelectOptions(
        \Magento\SalesRule\Model\Rule\Condition\Address $subject,
        $result
    )
    {

        switch ($subject->getAttribute()) {
            case self::ATTRIBUTE_CODE:
                $options = $this->_directoryCountry->toOptionArray();
                $subject->setData('value_select_options', $options);
                return $subject->getData('value_select_options');
            default:
                return $result;
        }

    }

    // /**
    //  * Validate Address Rule Condition
    //  *
    //  * @return bool
    //  */
    // public function afterValidate(
    //     \Magento\SalesRule\Model\Rule\Condition\Address $subject,
    //     $result
    // )
    // {
    //     $address = $subject;
    //     $resultpg = $result;

    //     return $resultpg;
    // }

}
