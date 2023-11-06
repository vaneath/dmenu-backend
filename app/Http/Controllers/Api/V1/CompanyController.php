<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\JsonApi\V1\Companies\CompanyRequest;
use App\JsonApi\V1\Companies\CompanySchema;
use DB;
use Illuminate\Support\Facades\Auth;
use LaravelJsonApi\Core\Responses\DataResponse;
use LaravelJsonApi\Laravel\Http\Controllers\Actions;
use LaravelJsonApi\Laravel\Http\Requests\AnonymousQuery;

class CompanyController extends Controller
{
    use Actions\FetchMany;
    use Actions\FetchOne;
    use Actions\Update;
    use Actions\Destroy;
    use Actions\FetchRelated;
    use Actions\FetchRelationship;
    use Actions\UpdateRelationship;
    use Actions\AttachRelationship;
    use Actions\DetachRelationship;

    public function store(CompanySchema $schema, CompanyRequest $request, AnonymousQuery $query)
    {
        $model = $schema
            ->repository()
            ->create()
            ->withRequest($query)
            ->store($request->validated());

        DB::table('company_owner')->insert([
            'company_id' => $model->id,
            'owner_id' => Auth::user()->id,
        ]);

        return new DataResponse($model);
    }

}
