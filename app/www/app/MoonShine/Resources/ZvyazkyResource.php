<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Zvyazky;
use App\MoonShine\Pages\Zvyazky\ZvyazkyIndexPage;
use App\MoonShine\Pages\Zvyazky\ZvyazkyFormPage;
use App\MoonShine\Pages\Zvyazky\ZvyazkyDetailPage;

use MoonShine\Resources\ModelResource;

class ZvyazkyResource extends ModelResource
{
    protected string $model = Zvyazky::class;

    protected string $title = 'Zvyazkies';

    public function pages(): array
    {
        return [
            ZvyazkyIndexPage::make($this->title()),
            ZvyazkyFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            ZvyazkyDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
