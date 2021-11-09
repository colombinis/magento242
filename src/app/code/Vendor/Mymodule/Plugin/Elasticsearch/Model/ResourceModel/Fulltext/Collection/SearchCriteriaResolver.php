<?php

declare(strict_types=1);

namespace Vendor\Mymodule\Plugin\Elasticsearch\Model\ResourceModel\Fulltext\Collection;

use Magento\Elasticsearch\Model\ResourceModel\Fulltext\Collection\SearchCriteriaResolver as MagentoSearchCriteriaResolver;
use Magento\Framework\Api\Search\SearchCriteria;

class SearchCriteriaResolver
{
    /**
     * @param MagentoSearchCriteriaResolver $subject
     * @param SearchCriteria $result
     * @return SearchCriteria
     */
    public function afterResolve(MagentoSearchCriteriaResolver $subject, SearchCriteria $result): SearchCriteria
    {
        $sortOrders = $result->getSortOrders();

        $sortOrders=[
            'seba_color' => "ASC",
            'entity_id' => "DESC"
        ];
        $result->setSortOrders($sortOrders);

        return $result;
    }
}
