<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ProductFeedItemLayoutContent.
 *
 * @method ProductListItemContent getProductListItemContent()
 * @method bool isProductListItemContent()
 * @method $this setProductListItemContent(ProductListItemContent $value)
 * @method $this unsetProductListItemContent()
 */
class ProductFeedItemLayoutContent extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'product_list_item_content' => 'ProductListItemContent',
    ];
}
