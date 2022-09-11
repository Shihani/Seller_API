<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Product;
use App\Models\User;
use App\Models\SellerProduct;
use Validator;
use App\common\ResponseCodes;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("kkk");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
        $product = SellerProduct::with('user:id,name','product')->find($id);
        if (is_null($product)) {
            return $this->sendResponse(false,  [], ResponseCodes::NOT_FOUND);
        }
        return $this->sendResponse(true,  $product, ResponseCodes::HTTP_OK);
            } catch (\Exception $e) {
                return $this->sendResponse(false, $e->getMessage(), ResponseCodes::SOMETHING_WENT_WRONG);
            }
    }

    public function getProductOfSeller($id){
        try{

        
        $products = User::with('userProducts.product')->find($id)->makeHidden(['email', 'location','contact_no']);;
        if (is_null($products)) {
            return $this->sendResponse(false, [],  ResponseCodes::NOT_FOUND);
        }
        foreach ($products->userProducts as $key => $value) {
           $value->name=$value->product->name;
           $value->image=$value->product->image;
           $value->description=$value->product->description;
           unset($value['product']);
        }   


        return $this->sendResponse(true,  $products, ResponseCodes::HTTP_OK);
            } catch (\Exception $e) {
                return $this->sendResponse(false, $e->getMessage(), ResponseCodes::SOMETHING_WENT_WRONG);
            }

    }

    public function getSellerByProduct($id){
        try{
        $product=SellerProduct::with('user')->find($id);
       
        if (is_null($product)) {
            return $this->sendResponse(false,  [], ResponseCodes::NOT_FOUND);
        }
        return $this->sendResponse(true,  $product->user, ResponseCodes::HTTP_OK);
        } catch (\Exception $e) {
            return $this->sendResponse(false, $e->getMessage(), ResponseCodes::SOMETHING_WENT_WRONG);
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
