<?php
declare(strict_types=1);
namespace Sacsi\Checkout\Block;

use Magento\Checkout\Block\Checkout\AttributeMerger;
use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;
use Magento\Customer\Model\AttributeMetadataDataProvider;
use Magento\Eav\Api\Data\AttributeInterface;
use Magento\Ui\Component\Form\AttributeMapper;

class LayoutProcessor implements LayoutProcessorInterface
{

    /**
     * @var AttributeMerger
     */
    private $merger;

    /**
     * @var AttributeMapper
     */
    private $attributeMapper;

    /**
     * @var AttributeMetadataDataProvider
     */
    private $attributeMetadaDataProvider;

    public function __construct(
        AttributeMetadataDataProvider $attributeMetadaDataProvider,
        AttributeMapper $attributeMapper,
        AttributeMerger $merger
    )
    {
        $this->attributeMetadaDataProvider = $attributeMetadaDataProvider;
        $this->attributeMapper= $attributeMapper;
        $this->merger = $merger;
    }

    /**
     * @param mixed $jsLayout
     *
     * @return array
     */
    public function process($jsLayout):array {

        //load attributes from DB
        $elements = $this->getAddressAttributes();

        // get fields configuratio nof our step
        $fields = &$jsLayout['components']['checkout']['children']['steps']['children']['contact-step']['children']['contact']['children']['contact-fieldset']['children'];

        $fieldCodes = array_keys($fields);
        $elements = array_filter($elements, function ($key) use ($fieldCodes) {
            return in_array($key,$fieldCodes);
        },ARRAY_FILTER_USE_KEY);

        // merge attribute and fields
        $fields = $this->merger->merge($elements,'checkoutProvider','contact',$fields);

        return $jsLayout;
    }

    /**
     * @return array
     */
    private function getAddressAttributes(): array {
        /**
         * @var AttributeInterface[] $attributes
         */
        $attributes = $this->attributeMetadaDataProvider->loadAttributesCollection(
            'customer_address',
            'customer_register_address'
        );

        $elements=[];
        foreach ($attributes as $attribute) {
            $code = $attribute->getAttributeCode();
            $elements[$code] = $this->attributeMapper->map($attribute);
            //check if exist label to translated
            if(isset($elements[$code]['label'])){
                $labelTmp = $elements[$code]['label'];
                $elements[$code]['label'] = __($labelTmp);
            }
        }

        return $elements;
    }
}
