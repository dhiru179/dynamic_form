<?php

namespace App\Http\Controllers\adhoards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdhordsController extends Controller
{

    public function adhoards()
    {
        
        $categories = DB::table('category')->get();
        
     
        // echo "<pre>";
        // // print_r($arr);
        // echo "</pre>";
        // return;
        return view('adhoards.home', compact(['categories']));
    }

    public function showAdpost(Request $request, $cat_slug, $sub_cat_slug)
    {
        $cat_id = DB::table('category')->where(['slug' => $cat_slug])->get()[0]->id;
        $sub_cat_id = DB::table('sub_category')->where(['slug' => $sub_cat_slug])->get()[0]->id;

        $inputOptions = DB::table('form_group')
            ->join('tmp_tbl_form_field', 'form_group.tbl_form_field_id', '=', 'tmp_tbl_form_field.id')
            ->join('tbl_form_tag_type', 'tmp_tbl_form_field.tag_type_id', '=', 'tbl_form_tag_type.id')
            ->select('tmp_tbl_form_field.*', 'tbl_form_tag_type.type')
            ->where(['form_group.cat_id' => $cat_id, 'form_group.sub_cat_id' => $sub_cat_id])
            ->orderBy('tmp_tbl_form_field.id')
            ->get();

        $categories = DB::table('category')->get();
        if ($request->has('_token')) {
            $min = 0;
            $max = DB::table('real_estate')->max('area');
            $data = [

                'posted_by' => $request->posted_by,
                'furnish_type' => $request->furnish_type,
                'property_type' => $request->property_type,
                'min' => $request->min,
                'max' => $request->max,
                'unit' => $request->unit,
                'no_of_rooms' => $request->no_of_rooms,
                'parking' => $request->parking,
            ];
            $keys = [
                'category_id' => $cat_id,
                'sub_category_id' => $sub_cat_id,
            ];

            foreach ($data as $key => $value) {
                if ($value != null) {
                    if ($key == 'min') {
                        $min = $value;
                    } else if ($key == 'max') {
                        $max = $value;
                    } else {

                        $keys[$key] = $value;
                    }
                }
            }
            // return $keys;

            $result = DB::table('real_estate')->where($keys)->whereBetween('area', [$min, $max])->get();
        } else {


            $result = DB::table('real_estate')->where(['category_id' => $cat_id, 'sub_category_id' => $sub_cat_id])->get();
        }
        return view('adhoards.show_adpost', compact(['categories', 'result', 'inputOptions', 'cat_slug', 'sub_cat_slug']));
    }
}
