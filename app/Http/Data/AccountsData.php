<?php

namespace App\Http\Data;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class AccountsData extends Data
{
    /**
     * @param  string  $name
     * @param  string  $website
     * @param  string  $phone
     */
    public function __construct(
        public string $name,
        public string $website,
        public string $phone,
    ) {}

    /**
     * @return array[]
     */
    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'website' => ['required', 'string', 'active_url'],
            'phone' => ['required', 'string', 'min:3', 'max:30'],
        ];
    }
}
