<?php

/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */

$data = [
    "privacyPolicyContent" => $page->privacyPolicyContent()->toBlocks()->toArray(),
];

echo \Kirby\Data\Json::encode($data);