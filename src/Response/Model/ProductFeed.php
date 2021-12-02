<?php

namespace InstagramAPI\Response\Model;

use InstagramAPI\AutoPropertyMapper;

/**
 * ProductFeed.
 *
 * @method ProductFeedItem[] getItems()
 * @method string getNextMaxId()
 * @method bool getMoreAvailable()
 * @method mixed getNumResults()
 * @method bool isItems()
 * @method bool isNextMaxId()
 * @method bool isMoreAvailable()
 * @method bool isNumResults()
 * @method $this setItems(ProductFeedItem[] $value)
 * @method $this setNextMaxId(string $value)
 * @method $this setMoreAvailable(bool $value)
 * @method $this setNumResults(mixed $value)
 * @method $this unsetItems()
 * @method $this unsetNextMaxId()
 * @method $this unsetMoreAvailable()
 * @method $this unsetNumResults()
 */
class ProductFeed extends AutoPropertyMapper
{
    const JSON_PROPERTY_MAP = [
        'items'          => 'ProductFeedItem[]',
        'num_results'    => 'int',
        'more_available' => 'bool',
        'next_max_id'    => 'string',
    ];
}
