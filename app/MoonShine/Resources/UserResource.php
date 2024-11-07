<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use MoonShine\Fields\Date;
use MoonShine\Fields\Email;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Users';

    protected string $column = 'name';

    protected int $itemsPerPage = 10;

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Name')->required(),
                Email::make('E-mail', 'email')->required(),
                Phone::make('Phone', 'phone', fn($model) => '+998 ' . $model->phone)
                    ->expansion('+998')
                    ->mask('(99) 999-99-99')
                    ->required(),
                Enum::make('Gender')
                    ->attach(GenderEnum::class)
                    ->sortable()
                    ->required(),
                Date::make('Created at', 'updated_at')
                    ->format('d.m.Y H:i:s')
                    ->disabled()
                    ->hideOnIndex()
                    ->hideOnCreate()
                    ->hideOnUpdate(),
                HasMany::make('Ads', 'ads', resource: new AdResource())
                    ->hideOnAll()
                    ->showOnIndex()
                    ->onlyLink(),
                HasMany::make('Ads', 'ads', resource: new AdResource())
                       ->hideOnIndex()
            ]),
        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
