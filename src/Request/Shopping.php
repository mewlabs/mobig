<?php

namespace InstagramAPI\Request;

use InstagramAPI\Response;
use InstagramAPI\Signatures;

/**
 * Functions related to Shopping and catalogs.
 */
class Shopping extends RequestCollection
{
    /**
     * Get on tag product information.
     *
     * @param string $productId   The product ID.
     * @param string $mediaId     The media ID in Instagram's internal format (ie "1820978425064383299").
     * @param int    $deviceWidth Device width (optional).
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\OnTagProductResponse
     */
    public function getOnTagProductInfo(
        $productId,
        $mediaId,
        $deviceWidth = 720)
    {
        return $this->ig->request("commerce/products/{$productId}/on_tag/")
            ->addParam('media_id', $mediaId)
            ->addParam('device_width', $deviceWidth)
            ->getResponse(new Response\OnTagProductResponse());
    }

    /**
     * Get catalogs.
     *
     * @param string $locale The device user's locale, such as "en_US.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\GraphqlResponse
     */
    public function getCatalogs(
        $locale = 'en_US')
    {
        return $this->ig->request('wwwgraphql/ig/query/')
            ->addParam('locale', $locale)
            ->addUnsignedPost('access_token', 'undefined')
            ->addUnsignedPost('fb_api_caller_class', 'RelayModern')
            ->addUnsignedPost('variables', ['sources' => null])
            ->addUnsignedPost('doc_id', '1742970149122229')
            ->getResponse(new Response\GraphqlResponse());
    }

    /**
     * Get catalog items.
     *
     * @param string $catalogId The catalog's ID.
     * @param string $locale    The device user's locale, such as "en_US.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\GraphqlResponse
     */
    public function getCatalogItems(
        $catalogId,
        $locale = 'en_US')
    {
        $query = [
            '',
            $catalogId,
            '96',
            '20',
            null,
        ];

        return $this->ig->request('wwwgraphql/ig/query/')
            ->addUnsignedPost('doc_id', '1747750168640998')
            ->addUnsignedPost('locale', $locale)
            ->addUnsignedPost('vc_policy', 'default')
            ->addUnsignedPost('strip_nulls', true)
            ->addUnsignedPost('strip_defaults', true)
            ->addUnsignedPost('query_params', json_encode($query, JSON_FORCE_OBJECT))
            ->getResponse(new Response\GraphqlResponse());
    }

    /**
     * Sets on board catalog.
     *
     * @param string $catalogId The catalog's ID.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\OnBoardCatalogResponse
     */
    public function setOnBoardCatalog(
        $catalogId)
    {
        return $this->ig->request('commerce/onboard/')
            ->addPost('current_catalog_id', $catalogId)
            ->addPost('_uid', $this->ig->account_id)
            ->addPost('_uuid', $this->ig->uuid)
            ->addPost('_csrftoken', $this->ig->client->getToken())
            ->getResponse(new Response\OnBoardCatalogResponse());
    }

    /**
     * Search for Instagram product.
     *
     * @param string $query The product title to search for.
     * @param null|string $maxId Next "maximum ID", used for pagination.
     *
     * @throws \InvalidArgumentException                  If invalid query or
     *                                                    trying to exclude too
     *                                                    many user IDs.
     *
     * @return \InstagramAPI\Response\ProductFeedResponse
     */
    public function editProductsFeed(
        $query,
        $maxId = null)
    {
        $request = $this->ig->request('commerce/shop_management/edit_products_feed/')
            ->addParam('query', $query);

        if ($maxId !== null) {
            $request->addParam('max_id', $maxId);
        }

        return $request->getResponse(new Response\ProductFeedResponse());
    }

    /**
     * Search for Instagram product.
     *
     * @param string $queryText The product title to search for.
     *
     * @throws \InstagramAPI\Exception\InstagramException
     *
     * @return \InstagramAPI\Response\ProductTaggingFeedResponse
     */
    public function taggingFeed(
        $queryText)
    {
        $request = $this->ig->request('commerce/product_tagging/tagging_feed/')
            ->addParam('client_state', '{"tagged_products":[],"tagged_collections":[],"tagged_merchants":[],"branded_content_partners":[],"tagged_users":[]}')
            ->addParam('prior_module', 'product_tagging')
            ->addParam('timezone_offset', date('Z'))
            ->addParam('query_text', $queryText)
            ->addParam('usage', 'feed_sharing')
            ->addParam('waterfall_id', Signatures::generateUUID(true))
            ->addParam('session_id', $this->ig->session_id);

        return $request->getResponse(new Response\ProductTaggingFeedResponse());
    }
}
