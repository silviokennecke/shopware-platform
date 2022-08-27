---
title: Improve elasticsearch performance
issue: -
author: Silvio Kennecke
author_email: development@silvio-kennecke.de
author_github: @silviokennecke
---
# Elasticsearch
* Added `\Shopware\Elasticsearch\Framework\Indexing\Event\ElasticsearchIndexerIteratorEvent` to allow modifications to the iterator fetching entity id's
* Changed `\Shopware\Elasticsearch\Framework\Indexing\ElasticsearchIndexer::init` to dispatch an `ElasticsearchIndexerIteratorEvent` before fetching entity id's
* Added `\Shopware\Elasticsearch\Product\ProductRelevanceIndexUpdater` to filter products that are not relevant to the corresponding language
