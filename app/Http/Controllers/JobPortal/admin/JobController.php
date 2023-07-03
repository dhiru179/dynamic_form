<?php

namespace App\Http\Controllers\jobPortal\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jobController extends Controller
{
    public function seeker(Request $request, $cat_id = 32)
    {
        

        $field_id = [];
        $where = [];
        $laravelWhere = [];
        $where_any = [];
        $th = DB::table('tmp_tbl_form_field')
            ->join('tbl_form_tag_type', 'tmp_tbl_form_field.tag_type_id', '=', 'tbl_form_tag_type.id')
            ->select('tmp_tbl_form_field.*', 'tbl_form_tag_type.type')
            ->orderBy('tmp_tbl_form_field.id', 'ASC')
            ->where(['tmp_tbl_form_field.category_id' => $cat_id])
            ->get();
        if (count($th) > 0) {

            for ($i = 0; $i < count($th); $i++) {
                $id = (int)$th[$i]->id;
                $field_id[] = $id;
                $name = $th[$i]->name;
                $where_any[] = "json_data->'$.$name'";
                if (!empty($request->$name[0])) {

                    foreach ($request->$name as $key => $value) {

                        $where[] = "json_data->'$.$name'='$value'";
                        $laravelWhere[] = [
                            "$name" => $value,
                        ];
                    }
                }
            }
        }

        // return [$where, $request->all(), empty($request->$name[0]), $request->city];
        $options = DB::table('options')->whereIn('tmp_tbl_form_field_id', $field_id)->get();
        $result = DB::table("json_form_data")->where(['cat_id' => $cat_id])->get('json_data');

        $search_input = $request->search_keys;
        if (count($where) > 0 || !empty($search_input)) {
            $where_select = "";
            $where_input_key = "";
            $or = "";

            if (count($where) > 0) {
                $where_select = "WHERE cat_id = $cat_id AND " . implode(' AND ', $where);
            } elseif (count($where) > 0 && !empty($search_input)) {
                $or = " OR ";
                $where_select = "WHERE cat_id = $cat_id AND " . implode(' AND ', $where);
                $where_input_key = "concat(" . implode(',', $where_any) . ") like '%$search_input%'";
            } else {
                $where_input_key = "WHERE cat_id = $cat_id AND  concat(" . implode(',', $where_any) . ") like '%$search_input%'";
            }

            // $result = DB::table("json_form_data")->where(['cat_id' => $cat_id])->whereJsonContains('to', $laravelWhere)->get();
            $result = DB::select("SELECT `json_data` from json_form_data $where_select $or $where_input_key");
            //    where concat(json_data->"$.city",json_data->"$.name",json_data->"$.address",json_data->"$.education") like '%kol%'   
        }


        return view('job_portal.seeker.index', compact(['result', 'options', 'th']));
    }
}
