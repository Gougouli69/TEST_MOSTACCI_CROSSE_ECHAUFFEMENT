<?php

namespace App\Classes\Languages;

use App\Classes\Moment;
use App\Classes\Moment\MomentInterface;

interface LanguageInterface {

    public function congrats(): string;
    public function hello(MomentInterface $moment): string;
    public function goodbye(MomentInterface $moment): string;

}