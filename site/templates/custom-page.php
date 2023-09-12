<?php

/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */

$data = [
    "customPageContent" => $page->customPageContent()->toBlocks()->toArray()
];

echo \Kirby\Data\Json::encode($data);