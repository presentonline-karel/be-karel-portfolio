<?php

/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */

$data = [
    "logoLight" => $site->logoLight()->toFiles()->toArray(),
    "logoDark" => $site->logoDark()->toFiles()->toArray(),
    "navigationBlock" => $site->navigationBlock()->toBlocks()->toArray(),
    "footerBlock" => $site->footerBlock()->toBlocks()->toArray(),
    "email" => $site->email()->value(),
    "phone" => $site->phone()->value(),
    "socials" => $site->socials()->toStructure()->toArray()
];

echo \Kirby\Data\Json::encode($data);