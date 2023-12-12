<?php

namespace Domain\Classes\Languages;

use Domain\Classes\Moment\MomentInterface;

interface LanguageInterface {

    public function congrats(): string;
    public function hello(MomentInterface $moment): string;
    public function goodbye(MomentInterface $moment): string;

}