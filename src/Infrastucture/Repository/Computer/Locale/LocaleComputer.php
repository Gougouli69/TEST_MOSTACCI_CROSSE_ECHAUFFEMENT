<?php

namespace Infra\Repository\Computer\Locale;

use Locale;

class LocaleComputer implements LocaleInterface {

    public function getLocale(): string{
        return Locale::getDisplayLanguage(Locale::getDefault());
    }


}