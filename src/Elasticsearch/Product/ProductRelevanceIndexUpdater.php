<?php declare(strict_types=1);

namespace Shopware\Elasticsearch\Product;

use Shopware\Core\Framework\Uuid\Uuid;
use Shopware\Elasticsearch\Framework\Indexing\Event\ElasticsearchIndexerIteratorEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductRelevanceIndexUpdater implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            ElasticsearchIndexerIteratorEvent::class => 'onIndexerIterator'
        ];
    }

    public function onIndexerIterator(ElasticsearchIndexerIteratorEvent $event): void
    {
        $definition = $event->getDefinition();

        if (!$definition instanceof ElasticsearchProductDefinition::class) {
            return;
        }

        $event->getIterator()->getQuery()
            ->leftJoin('product', 'product_visibility', 'product_visibility', 'product_visibility.product_id = product.visibilities AND product_visibility.product_version_id = :versionId')
            ->leftJoin('product_visibility', 'sales_channel_language', 'sales_channel_domain.sales_channel_id = product_visibility.sales_channel_id')
            ->where('sales_channel_domain.language_id = :languageId')
            ->addGroupBy('id')
            ->setParameter('versionId', Uuid::fromHexToBytes($event->getContext()->getVersionId()))
            ->setParameter('languageId', Uuid::fromHexToBytes($event->getContext()->getLanguageId()));
    }
}
