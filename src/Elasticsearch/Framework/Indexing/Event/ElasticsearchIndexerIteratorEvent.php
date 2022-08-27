<?php declare(strict_types=1);

namespace Shopware\Elasticsearch\Framework\Indexing\Event;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\Dbal\Common\IterableQuery;
use Shopware\Core\Framework\Event\ShopwareEvent;
use Shopware\Elasticsearch\Framework\AbstractElasticsearchDefinition;
use Symfony\Contracts\EventDispatcher\Event;

class ElasticsearchIndexerIteratorEvent extends Event implements ShopwareEvent
{
    private IterableQuery $iterator;

    private AbstractElasticsearchDefinition $definition;

    private Context $context;

    public function __construct(IterableQuery $iterator, AbstractElasticsearchDefinition $definition, Context $context)
    {
        $this->iterator = $iterator;
        $this->definition = $definition;
        $this->context = $context;
    }

    public function getContext(): Context
    {
        return $this->context;
    }

    public function getIterator(): IterableQuery
    {
        return $this->iterator;
    }

    public function getDefinition(): AbstractElasticsearchDefinition
    {
        return $this->definition;
    }
}
