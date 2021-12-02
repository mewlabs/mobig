<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ProductComponent.
 *
 * @method ProductComponentMeta getMeta()
 * @method string getComponentType()
 * @method string getComponentId()
 * @method bool isMeta()
 * @method bool isComponentType()
 * @method bool isComponentId()
 * @method $this setMeta(ProductComponentMeta $value)
 * @method $this setComponentType(string $value)
 * @method $this setComponentId(string $value)
 * @method $this unsetMeta()
 * @method $this unsetComponentType()
 * @method $this unsetComponentId()
 */
class ProductComponent extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'component_type' => 'string',
        'component_id'   => 'string',
        'meta'           => 'ProductComponentMeta',
    ];
}
