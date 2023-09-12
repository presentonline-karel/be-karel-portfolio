<?php

/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */

$data = [
    "customPageContent" => $page->customPageContent()->toResolvedBlocks()->toArray()
];

echo \Kirby\Data\Json::encode($data);