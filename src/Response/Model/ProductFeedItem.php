<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ProductFeedItem.
 *
 * @method string getSectionId()
 * @method string getSectionType()
 * @method string getModuleName()
 * @method ProductListItemContent getLayoutContent()
 * @method bool isSectionId()
 * @method bool isSectionType()
 * @method bool isModuleName()
 * @method bool isLayoutContent()
 * @method $this setSectionId(string $value)
 * @method $this setSectionType(string $value)
 * @method $this setModuleName(string $value)
 * @method $this setLayoutContent(ProductListItemContent $value)
 * @method $this unsetSectionId()
 * @method $this unsetSectionType()
 * @method $this unsetModuleName()
 * @method $this unsetLayoutContent()
 */
class ProductFeedItem extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'section_id'     => 'string',
        'section_type'   => 'string',
        'module_name'    => 'string',
        'layout_content' => 'ProductListItemContent',
    ];
}
