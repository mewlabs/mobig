<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ProductGroup.
 *
 * @method Product[] getProductItems()
 * @method bool isProductItems()
 * @method $this setProductItems(Product[] $value)
 * @method $this unsetProductItems()
 */
class ProductGroup extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'product_items' => 'Product[]',
    ];
}
