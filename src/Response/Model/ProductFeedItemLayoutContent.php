<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ProductFeedItemLayoutContent.
 *
 * @method ProductListItemContent getProductListItemContent()
 * @method ProductListGroupContent getProductListGroupContent()
 * @method bool isProductListItemContent()
 * @method bool isProductListGroupContent()
 * @method $this setProductListItemContent(ProductListItemContent $value)
 * @method $this setProductListGroupContent(ProductListGroupContent $value)
 * @method $this unsetProductListItemContent()
 * @method $this unsetProductListGroupContent()
 */
class ProductFeedItemLayoutContent extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'product_list_item_content'  => 'ProductListItemContent',
        'product_list_group_content' => 'ProductListGroupContent',
    ];
}
