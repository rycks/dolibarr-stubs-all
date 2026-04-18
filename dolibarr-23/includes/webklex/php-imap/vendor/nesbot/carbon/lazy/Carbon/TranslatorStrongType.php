<?php

namespace Carbon;

class LazyTranslator extends \Carbon\AbstractTranslator implements \Carbon\TranslatorStrongTypeInterface
{
    public function trans(?string $id, array $parameters = [], ?string $domain = null, ?string $locale = null) : string
    {
    }
    public function getFromCatalogue(\Symfony\Component\Translation\MessageCatalogueInterface $catalogue, string $id, string $domain = 'messages')
    {
    }
    private function getPrivateProperty($instance, string $field)
    {
    }
}