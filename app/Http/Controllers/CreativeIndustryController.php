<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CreativeIndustry;


class CreativeIndustryController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return a listing of the CreativeIndustries.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $creativeIndustries = CreativeIndustry::all();

       return $this->successResponse($creativeIndustries);
    }

    /**
     * Create an instance of CreativeIndustry.
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * rules for creating a CreativeIndustry
         */
        $rules = [
            'name' => 'required|max:255',
            'founded_at' => 'required|date',
            'country_id' => 'required|int | min:1',   
        ];

        /**
         * validate the request
         */
        $this->validate($request, $rules);

        /**
         * create a new CreativeIndustry
         */
        $creativeIndustry = CreativeIndustry::create($request->all());

        /**
         * return the new CreativeIndustry
         */
        return $this->successResponse($creativeIndustry, Response::HTTP_CREATED);
    }

    /**
     * return a specific CreativeIndustry.
     * @return \Illuminate\Http\Response
     */
    public function show($creativeIndustry)
    {
        /**
         * Find a specific CreativeIndustry
         */
        $creativeIndustry = CreativeIndustry::findOrFail($creativeIndustry);

        /**
         * return the CreativeIndustry
         */
        return $this->successResponse($creativeIndustry);
    }

    /**
     * update a specific CreativeIndustry.
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $creativeIndustry)
    {
         /**
         * rules for creating a CreativeIndustry
         */
        $rules = [
            'name' => 'max:255',
            'founded_at' => 'date',
            'country_id' => 'int | min:1',   
        ];

        /**
         * validate the request
         */
        $this->validate($request, $rules);

        /**
         * Find a specific CreativeIndustry
         */
        $creativeIndustry = CreativeIndustry::findOrFail($creativeIndustry);

        /**
         * update the CreativeIndustry
         */
        $creativeIndustry->fill($request->all());


        /**
         * check if the CreativeIndustry has changed
         */
        if($creativeIndustry->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        /**
         * save the CreativeIndustry
         */
        $creativeIndustry->save();

        /**
         * return the CreativeIndustry
         */

        return $this->successResponse($creativeIndustry);

        
    }

    /**
     * Remove a specific CreativeIndustry.
     * @return \Illuminate\Http\Response
     */
    public function destroy($creativeIndustry)
    {
        /**
         * Find a specific CreativeIndustry
         */
        $creativeIndustry = CreativeIndustry::findOrFail($creativeIndustry);

        /**
         * delete the CreativeIndustry
         */
         $creativeIndustry->delete();

         /**
          * return the CreativeIndustry
          */
        return $this->successResponse($creativeIndustry);

    }
}
