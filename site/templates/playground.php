<?php

/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */

$data = [
    "playgroundTitle" => $page->playgroundTitle()->value(),
    "playgroundParagraph" => $page->playgroundParagraph()->value(),
    "labelTags" => $page->labelTags()->value(),
    "tags" => $page->tags()->value(),
    "playgroundProjects" => $page->playgroundProjects()->toStructure()->toArray(),
    "customBlocks" => $page->customBlocks()->toBlocks()->toArray(),
];

echo \Kirby\Data\Json::encode($data);