<?php

namespace App\Http\Controllers\adhoards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddPostController extends Controller
{

    public function adposts()
    {
        $category = DB::table('category')->get();
        $sub_category = DB::table('sub_category')->orderBy('category_id', 'ASC')->get();
        return view('adhoards.adposts', compact('category', 'sub_category'));
    }
    public function proceed(Request $request)
    {
        $category_id = $request->post('main_catid');
        $sub_category_id = $request->post('sub_catid');
        return ['url' => "/adposts/$category_id/$sub_category_id"];
    }
    public function formGenerate($cat_id, $sub_cat_id)
    {
        $results = DB::table('rel_form_cat_subcat')
            ->join('form_tag', 'rel_form_cat_subcat.form_tag_id', '=', 'form_tag.id')
            ->select('form_tag.*')
            ->where(['rel_form_cat_subcat.category_id' => $cat_id, 'rel_form_cat_subcat.sub_category_id' => $sub_cat_id])
            ->get();

        $inputOptions = DB::table('form_group')
            ->join('tmp_tbl_form_field', 'form_group.tbl_form_field_id', '=', 'tmp_tbl_form_field.id')
            ->join('tbl_form_tag_type','tmp_tbl_form_field.tag_type_id','=','tbl_form_tag_type.id')
            ->select('tmp_tbl_form_field.*','tbl_form_tag_type.type')
            ->where(['form_group.cat_id' => $cat_id, 'form_group.sub_cat_id' => $sub_cat_id])
            ->orderBy('tmp_tbl_form_field.id')
            ->get();

        // echo "<pre>";
        // print_r($results);
        // echo "</pre>";
        // return false;
        return view('adhoards.adpost_form', compact(['results', 'inputOptions', 'cat_id', 'sub_cat_id']));
    }

    function adSubmit(Request $request)
    {
        $category_id = $request->post('category_id');
        $sub_cat_id = $request->post('sub_category_id');
        $commonData = [
            '' => $request->post('category_id'),
            '' => $request->post('sub_category_id'),
            '' => $request->post('ad_description'),
            '' => $request->post('ad_place'),
            '' => $request->post('ad_post_type'),
            '' => $request->post('ad_title'),
            '' => $request->post('ad_youtube_video'),
            '' => $request->post('currency'),
            '' => $request->post('post_phone_show'),
            '' => $request->post('ad_email'),
            '' => $request->post('ad_name'),
            '' => $request->post('ad_phone'),
        ];
        $serviceData = [];
        return $request->all();
    }

   
}
