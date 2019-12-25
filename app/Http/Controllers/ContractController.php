<?php

namespace App\Http\Controllers;

use App\DataTables\ContractDataTable;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ContractController extends Controller
{
    public function index(ContractDataTable $dataTable)
    {
        $authUser = Auth::user();

        Log::info('ContractController@index', ['user_id' => $authUser->id]);

        if ($authUser->cannot('viewAny', Contract::class))
            abort(403);

        return $dataTable->render('contracts.index');
    }

    public function show($id)
    {
        $authUser = Auth::user();

        Log::info('ContractController@show', ['user_id' => $authUser->id]);

        $model = Contract::withTrashed()
            ->with('user')
            ->with('contractType')
            ->find($id);

        if (!$model)
            abort(404);

        if ($authUser->cannot('view', $model))
            abort(403);

        return view('contracts.show', ['model' => $model]);
    }
}
