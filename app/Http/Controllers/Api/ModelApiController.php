<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ModelResource;
use App\Models\Model;
use Exception;
use Illuminate\Routing\Controller;

class ModelApiController extends Controller
{
    public function getMany()
    {
        try{
            $manufacturer_id = $_GET['manufacturer_id'];
            $manufacturer_id = intval($manufacturer_id);

            if($manufacturer_id <= 0){
                throw new Exception("manufacturer_id not an unsigned number");
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Manufacturer not specified. Please specify manufacturer id.',
            ], 406);
        }

        return new ModelResource(Model::where('manufacturer_id', $manufacturer_id)
            ->orderBy('name')
            ->get()
        );
    }
}
