---
title: Improve elasticsearch performance
issue: -
author: Silvio Kennecke
author_email: development@silvio-kennecke.de
author_github: @silviokennecke
---
# Elasticsearch
* Changed `\Shopware\Elasticsearch\Product\ElasticsearchProductDefinition::fetchProducts` to only index products that are relevant to the corresponding languages
