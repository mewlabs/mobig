<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * ProductTaggingFeedResponses.
 *
 * @method Model\ProductComponent[] getComponentFeed()
 * @method string getMaxId()
 * @method bool getMoreAvailable()
 * @method mixed getMessage()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isComponentFeed()
 * @method bool isMaxId()
 * @method bool isMoreAvailable()
 * @method bool isProductFeed()
 * @method bool isMessage()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setComponentFeed(Model\ProductComponent[] $value)
 * @method $this setMaxId(string $value)
 * @method $this setMoreAvailable(bool $value)
 * @method $this setMessage(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetComponentFeed()
 * @method $this unsetMaxId()
 * @method $this unsetMoreAvailable()
 * @method $this unsetMessage()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class ProductTaggingFeedResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'component_feed' => 'Model\ProductComponent[]',
        'more_available' => 'bool',
        'max_id'         => 'string',
    ];
}
