<?php

namespace App\Http\Controllers;

use App\Http\Resources\VictimResource;
use App\Models\Victim;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Victims extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $per_page = 50;

        if (!empty($request->get('per_page'))) {
            $per_page = $request->get('per_page');
        }

        $victimsQuery = QueryBuilder::for(Victim::class)
            ->allowedFilters([
                AllowedFilter::exact('status'),
                AllowedFilter::exact('gender')
            ])
            ->allowedSorts(
                'name',
                'security_organ_id',
                'holding_location_id',
                'status_date')->paginate($per_page)
                ->appends(request()->query());

        return VictimResource::collection($victimsQuery);
    }
}
