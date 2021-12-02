<?php

namespace InstagramAPI\Response;

use InstagramAPI\Response;

/**
 * ProductFeedResponse.
 *
 * @method Model\ProductFeed getProductFeed()
 * @method mixed getMessage()
 * @method string getStatus()
 * @method Model\_Message[] get_Messages()
 * @method bool isProductFeed()
 * @method bool isMessage()
 * @method bool isStatus()
 * @method bool is_Messages()
 * @method $this setProductFeed(Model\ProductFeed $value)
 * @method $this setMessage(mixed $value)
 * @method $this setStatus(string $value)
 * @method $this set_Messages(Model\_Message[] $value)
 * @method $this unsetProductFeed()
 * @method $this unsetMessage()
 * @method $this unsetStatus()
 * @method $this unset_Messages()
 */
class ProductFeedResponse extends Response
{
    const JSON_PROPERTY_MAP = [
        'product_feed' => 'Model\ProductFeed',
    ];
}
