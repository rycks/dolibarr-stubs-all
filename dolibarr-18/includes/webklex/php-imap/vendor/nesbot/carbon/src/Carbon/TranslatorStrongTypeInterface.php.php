<?php

namespace Carbon;

/**
 * Mark translator using strong type from symfony/translation >= 6.
 */
interface TranslatorStrongTypeInterface
{
    public function getFromCatalogue(\Symfony\Component\Translation\MessageCatalogueInterface $catalogue, string $id, string $domain = 'messages');
}