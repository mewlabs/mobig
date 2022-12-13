<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ProductListGroupContent.
 *
 * @method ProductGroup getProductGroup()
 * @method bool isProductGroup()
 * @method $this setProductGroup(ProductGroup $value)
 * @method $this unsetProductGroup()
 */
class ProductListGroupContent extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'product_group' => 'ProductGroup',
    ];
}
