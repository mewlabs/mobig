<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ProductComponentItemMeta.
 *
 * @method string getBehavior()
 * @method string getItemType()
 * @method string getItemId()
 * @method ProductComponentItem getItem()
 * @method bool isBehavior()
 * @method bool isItemType()
 * @method bool isItemId()
 * @method bool isItem()
 * @method $this setBehavior(string $value)
 * @method $this setItemType(string $value)
 * @method $this setItemId(string $value)
 * @method $this setItem(ProductComponentItem $value)
 * @method $this unsetBehavior()
 * @method $this unsetItemType()
 * @method $this unsetItemId()
 * @method $this unsetItem()
 */
class ProductComponentItemMeta extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'behavior'  => 'string',
        'item_type' => 'string',
        'item_id'   => 'string',
        'item'      => 'ProductComponentItem',
    ];
}
