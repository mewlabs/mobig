<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ProductComponentMeta.
 *
 * @method ProductComponentItemMeta getCommerceItemMeta()
 * @method bool isCommerceItemMeta()
 * @method $this setMeta(ProductComponentItemMeta $value)
 * @method $this unsetCommerceItemMeta()
 */
class ProductComponentMeta extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'commerce_item_meta' => 'ProductComponentItemMeta',
    ];
}
