<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
        $asset = Asset::all();
        return [
            'carrousel' => $asset->where('type', 'carrousel'),
            'attentions' => $asset->where('type', 'attention'),
            'ourStore' => $asset->where('type', 'ourStore'),
            'about' => $asset->where('type', 'about'),
        ];
    }
}
