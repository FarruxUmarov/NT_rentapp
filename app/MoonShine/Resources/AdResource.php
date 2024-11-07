<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Enums\GenderEnum;
use App\Enums\StatusEnum;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ad;

use Illuminate\Http\Request;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Date;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Relationships\HasOne;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;


class AdResource extends ModelResource
{
    protected string $model = Ad::class;

    protected string $title = 'Ads';

    protected string $column = 'title';

    protected array $with = [
        'user',
        'branch'
    ];

    protected int $itemsPerPage = 10;

//    protected bool $editInModal = true;

//    protected bool $detailInModal = true;

    public function fields(): array
    {
        return [
            ID::make()->sortable(),

            Grid::make([
                Column::make([
                    Block::make([
                        BelongsTo::make('Author', 'user', resource: new UserResource())->asyncSearch()->disabled()->badge('green')->sortable()->required(),
                    ]),
                ]),

                Column::make([
                    Block::make([
                        Text::make('Title')->required(),
                        Textarea::make('Description')->hideOnIndex()->required(),
                        Text::make('Address')->required(),
                        BelongsTo::make('Branch', 'branch', resource: new BranchResource())->badge()->required(),
                    ]),
                ])->columnSpan(6),

                Column::make([
                    Block::make([
                        Number::make('Rooms')->sortable()->required(),
                        Number::make('Square ( m2 )', 'square', fn($model) => $model->square . ' m2')->sortable()->required(),
                        Number::make('Price ( $ )', 'price', fn($model) => $model->price . ' $')->sortable()->required(),

                        Enum::make('Gender')->attach(GenderEnum::class)->sortable()->required(),

                        Date::make('Created at')->format('d.m.Y')->disabled()->hideOnIndex()->hideOnCreate()->hideOnUpdate()->required(),

                        HasMany::make('Images', 'images', resource: new ImageResource)->hideOnAll()->showOnIndex()->onlyLink(),

                        HasMany::make('Images', 'images', resource: new ImageResource)->hideOnIndex()

                    ]),
                ])->columnSpan(4),

                Column::make([
                    Block::make([
                        Switcher::make('Status', 'status_id')->onValue(1)->offValue(2)->updateOnPreview()
                    ])
                ])->columnSpan(2)
            ]),

            HasOne::make('Author', 'author', resource: new UserResource())->disabled()->hideOnIndex()->hideOnDetail()
        ];
    }

    /**
     * @param Ad $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
