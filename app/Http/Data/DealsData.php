<?php

namespace App\Http\Data;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class DealsData extends Data
{
    public function __construct(
        public string $name,
        public string $stage,
        public string $accountName,
        public string $closingDate
    ) {}
}
