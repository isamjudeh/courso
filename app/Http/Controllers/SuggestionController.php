<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuggestionStoreRequest;
use App\Http\Resources\SuggestionResource;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function store(SuggestionStoreRequest $request)
    {
        $suggestion = Suggestion::create(array_merge($request->validated(), ['user_id' => auth()->id()]));

        return new SuggestionResource($suggestion);
    }
}
