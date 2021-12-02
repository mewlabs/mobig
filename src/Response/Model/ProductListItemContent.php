<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ProductListItemContent.
 *
 * @method Product getProductItem()
 * @method bool isProductItem()
 * @method $this setProductItem(Product $value)
 * @method $this unsetProductItem()
 */
class ProductListItemContent extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'product_item' => 'Product',
    ];
}
