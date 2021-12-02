<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ProductComponentItem.
 *
 * @method Product getProduct()
 * @method bool isProduct()
 * @method $this setProduct(Product $value)
 * @method $this unsetProduct()
 */
class ProductComponentItem extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'product' => 'Product',
    ];
}
