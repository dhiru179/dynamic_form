<?php

namespace App\Http\Controllers\universal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class formController extends Controller
{

    public function dynamicForm()
    {
        $category = DB::table('category')->where(['parent_id' => null])->get();

        return view('universal.form', compact(['category']));
    }

    function getForm(Request $request)
    {
        $cat_id = (int)$request->cat_id;
        $field_id = [];
        $form_filed = DB::table('tmp_tbl_form_field')
            ->join('tbl_form_tag_type', 'tmp_tbl_form_field.tag_type_id', '=', 'tbl_form_tag_type.id')
            ->select('tmp_tbl_form_field.*', 'tbl_form_tag_type.type')
            ->orderBy('tmp_tbl_form_field.id', 'ASC')
            ->where(['tmp_tbl_form_field.category_id' => $cat_id])
            ->get();
        if (count($form_filed) > 0) {
            for ($i = 0; $i < count($form_filed); $i++) {
                $field_id[] = (int)$form_filed[$i]->id;
            }
        }

        $options = DB::table('options')->whereIn('tmp_tbl_form_field_id', $field_id)->get();

        $data = [
            "status" => true,
            "data" => $form_filed,
            "options" => $options,
            "msg" => "success",
            "slug" => $request->slug,
        ];
        return $data;
    }

    function storeFormData(Request $request)
    {
            // return $request->all();
        $cat_id = $request->cat_id;
        $form_filed = DB::table('tmp_tbl_form_field')->where(['category_id' => $cat_id])->orderBy('orderby', 'ASC')->get();
        $getData = [];
        $opData = [];
        $singleInput = [];
        $timeKeys = time();
        foreach ($form_filed  as $key => $value) {
            $id = (int)($value->id);
            $val = $value->name;
            $data = $request->$val[$id];
            if (is_array($data)) {
                $options = [];
                foreach ($data as $op_id => $op_value) {
                 
                //    array_push($options,[$op_id=>$op_value[0]]);
                   $options[$op_id]=$op_value[0];
                }
                $opData[] = [
                    'tmp_tbl_form_field_id' => $value->id,
                    'options_data' => $options,
                ];
            } else {
                $singleInput[] = [
                    'tmp_tbl_form_field_id' => $value->id,
                    'input_data' => $data,
                ];
            }
            $getData[] = [
                'tmp_tbl_form_field_id' => $value->id,
                'submit_key' => $timeKeys,
                'category_id' => $cat_id,
            ];
        }
        // return [$opData,$singleInput,$getData];
        $lastId = 0; //insert if table empty
        $sql = DB::table('form_data')->limit(1)->orderBy('id', 'DESC')->get();
        if (count($sql) > 0) {
            $lastId = $sql[0]->id;
        }
        DB::table('form_data')->insert($getData);
        $get_new_insert_data = DB::table('form_data')->where('id', '>', $lastId)->get();
        $opNewData = [];
        $newSingleInput = [];
        foreach ($get_new_insert_data as $key => $value) {

            foreach ($opData as $options) {
                if ($options['tmp_tbl_form_field_id'] == $value->tmp_tbl_form_field_id) {
                    $opNewData[] = [
                        'form_data_id' => $value->id,
                        'tmp_tbl_form_field_id' => $value->tmp_tbl_form_field_id,
                        'options' => json_encode($options['options_data']),
                    ];
                }
            }
            foreach ($singleInput as $input) {
                if ($input['tmp_tbl_form_field_id'] == $value->tmp_tbl_form_field_id) {
                    $newSingleInput[] = [
                        'form_data_id' => $value->id,
                        'tmp_tbl_form_field_id' => $value->tmp_tbl_form_field_id,
                        'input_data' => $input['input_data'],
                    ];
                }
            }
        }

        DB::table('form_option_data')->insert($opNewData);
        DB::table('form_input_data')->insert($newSingleInput);
        $data = [
            "status" => true,
            'msg' => 'form save success',
            "data" => '',
            'slug' => $request->slug,
        ];
        return $data;
    }

    function showFormData(Request $request, $cat_id = "")
    {
        $category = DB::table('category')->where(['parent_id' => null])->get();
        if (empty($cat_id)) {
            $result = [];
            $th = [];

            return view('universal.list_form_data', compact(['result', 'category','th']));
        } else {
            $field_id = [];
            $where = [];
            $case = [];
            // return $request->all();
            $th = DB::table('tmp_tbl_form_field')
                ->join('tbl_form_tag_type', 'tmp_tbl_form_field.tag_type_id', '=', 'tbl_form_tag_type.id')
                ->select('tmp_tbl_form_field.*', 'tbl_form_tag_type.type')
                ->orderBy('tmp_tbl_form_field.id', 'ASC')
                ->where(['tmp_tbl_form_field.category_id' => $cat_id])
                ->get();

            if (count($th) > 0) {

                for ($i = 0; $i < count($th); $i++) {
                    $id = (int)$th[$i]->id;
                    $name = $th[$i]->name;
                    $label = $th[$i]->label;
                    $field_id[] = $id;

                    $case[] = "MAX(CASE WHEN `name` = '$name' then  `input_data` END) as `$name`";
                    
                    if (!empty($request->$name[0])) {

                        foreach ($request->$name as $key => $value) {

                            $where[] = "new_pv_tbl.$name LIKE '%$value%'";
                        }
                    }
                }
            }

            // return [$where, $request->all(), empty($request->$name[0]), $request->city];
            $options = DB::table('options')->whereIn('tmp_tbl_form_field_id', $field_id)->get();

            $where_search = implode(' and ', $where);
            if(!empty($where_search))
            {
                $where_search = 'WHERE '.$where_search;
            }
            $case_qry = implode(' , ',$case);
            $result = DB::select("SELECT * FROM (SELECT 
            -- submit_key,
            $case_qry
        FROM
            (SELECT 
                    form_data.id,
                    form_data.category_id,
                    form_data.submit_key,
                    form_data.tmp_tbl_form_field_id,
                    tmp_tbl_form_field.name,
                    GROUP_CONCAT(form_option_data.options_id) AS op_id,
                    COALESCE(form_input_data.input_data, GROUP_CONCAT(options.option)) AS input_data
            FROM
                form_data
            LEFT JOIN form_option_data ON form_data.id = form_option_data.form_data_id
            LEFT JOIN form_input_data ON form_data.id = form_input_data.form_data_id
            LEFT JOIN `options` ON form_option_data.options_id = `options`.id
            LEFT JOIN tmp_tbl_form_field ON form_data.tmp_tbl_form_field_id = tmp_tbl_form_field.id
            WHERE
                form_data.category_id = $cat_id
            GROUP BY id) AS pviot
        GROUP BY submit_key) as new_pv_tbl
        $where_search
        ");




            //     echo "<pre>";
            //     // // print_r($field);
            // //    print_r($opData);
            //     // // print_r($input_data_arr);
            //     print_r($result);
            //     echo "</pre>";
            //     return;
            return view('universal.list_form_data', compact(['category', 'result', 'th', 'options']));
        }
    }

    function getSubCategory(Request $request)
    {
        $result = DB::table('category')->where(['parent_id' => $request->category_id])->get();
        $data = [
            "status" => true,
            "data" => $result,
            'slug' => $request->slug,
        ];
        return $data;
    }

    function customForm()
    {
        $category = DB::table('category')->where(['parent_id' => null])->get();
        $type = DB::table('tbl_form_tag_type')->get();
        return view('universal.custom_form', compact(['category', 'type']));
    }

    //show modify form
    function modifyForm()
    {
        $category = DB::table('category')->where(['parent_id' => null])->get();
        $type = DB::table('tbl_form_tag_type')->get();
        return view('universal.modify_custom_form', compact(['category', 'type']));
    }

    //store modify form data

    function modifyFormData(Request $request)
    {
        $cat_id = (int)$request->cat_id;
        $formData = $request->form;
        // return $request->all();
        $insertData = [];
        $updateData = [];
        $insertNewOpData = [];
        $updateOpData = [];
        $updateOpId = [];
        $updateId = [];
        $optionDataWithoutFieldId = [];
        foreach ($formData as $value) {
            // for update

            if ((int)$value['id'] > 0) {
                $updateId[] = (int)$value['id'];

                $updateData[] = (array)[
                    'category_id' => $cat_id,
                    'tag_type_id' => (int)$value['tag_id'],
                    'label' => $value['tag_label'],
                    'name' => $value['tag_name'],
                    'is_need' => $value['is_need'],
                    'orderby' => $value['orderby'],
                ];
                if (!empty($value['options'])) {

                    foreach ($value['options'] as $key => $opData) {

                        if ((int)$opData['id'] > 0) {
                            $updateOpId[] = (int)$opData['id'];
                            $updateOpData[] = [
                                'option' => $opData['data'],
                                'tmp_tbl_form_field_id' => (int)$value['id'],
                            ];
                        } else {
                            $insertNewOpData[] = [
                                'option' => $opData['data'],
                                'tmp_tbl_form_field_id' => (int)$value['id'],
                            ];
                        }
                    }
                }
            } else {
                // for new insert
                $insertData[] = (array)[
                    'category_id' => $cat_id,
                    'tag_type_id' => $value['tag_id'],
                    'label' => $value['tag_label'],
                    'name' => $value['tag_name'],
                    'is_need' => $value['is_need'],
                    'orderby' => $value['orderby'],
                ];
                if (!empty($value['options'])) {
                    $optionDataWithoutFieldId[] = $value;
                }
            }
        }
        // return [$updateId,$updateData];
        foreach ($updateData as $key => $value) {
            DB::table('tmp_tbl_form_field')->where(['id' => $updateId[$key]])->update($value);
        }
        foreach ($updateOpData as $key => $value) {
            DB::table('options')->where(['id' => $updateOpId[$key]])->update($value);
        }
        // //bulk 
        // DB::table('tmp_tbl_form_field')->whereIn('id', $updateId)->update($updateData);
        // DB::table('options')->whereIn('id', $updateOpId)->update($updateOpData);

        $lastId = 0; //insert if table empty
        $sql = DB::table('tmp_tbl_form_field')->limit(1)->orderBy('id', 'DESC')->get();
        if (count($sql) > 0) {
            $lastId = $sql[0]->id;
        }
        DB::table('tmp_tbl_form_field')->insert($insertData);
        $getInsertData = DB::table('tmp_tbl_form_field')->where('id', '>', $lastId)->get();

        foreach ($optionDataWithoutFieldId as $key => $opData) {
            foreach ($getInsertData as $key => $dbData) {
                if (
                    $opData['tag_id'] == $dbData->tag_type_id &&
                    $opData['tag_label'] == $dbData->label &&
                    $opData['tag_name'] == $dbData->name &&
                    $opData['is_need'] == $dbData->is_need &&
                    $opData['orderby'] == $dbData->orderby
                ) {
                    foreach ($opData['options'] as $key => $option) {
                        $insertNewOpData[] = [
                            'option' => $option['data'],
                            'tmp_tbl_form_field_id' => $dbData->id
                        ];
                    }

                    break;
                }
            }
        }
        DB::table('options')->insert($insertNewOpData);
        // return ['insertData'=>$insertData,
        // 'updateData'=>$updateData,
        // 'insertNewOpData'=>$insertNewOpData,
        // 'updateOpData'=>$updateOpData,
        // 'updateOpId'=>$updateOpId,
        // 'updateId'=>$updateId,
        // 'optionData'=>$optionDataWithoutFieldId,];
        // return $request->all();
        $data = [
            "status" => true,
            // "data" => $result,
            // "options" => $options,
            "msg" => "success",
            "slug" => $request->slug,
        ];
        return $data;
    }

    function deleteField(Request $request)
    {
        $form_field_id = (int)$request->id;
        DB::table('options')->where(['tmp_tbl_form_field_id' => $form_field_id])->delete();
        DB::table('tmp_tbl_form_field')->where(['id' => $form_field_id])->delete();
        $data = [
            "status" => true,
            // "data" => $result,
            // "options" => $options,
            "msg" => "delete row success",
            "slug" => $request->slug,
        ];
        return $data;
    }

    function deleteOption(Request $request)
    {
        $id = (int)$request->id;
        DB::table('options')->where(['id' => $id])->delete();
        $data = [
            "status" => true,
            // "data" => $result,
            // "options" => $options,
            "msg" => "delete option success",
            "slug" => $request->slug,
        ];
        return $data;
    }

    function showFormDetails(Request $request)
    {

        $cat_id = $request->cat_id;
        $result = DB::table('tmp_tbl_form_field')->where(['category_id' => $cat_id])->get();
        $field_id = [];
        if (count($result) > 0) {

            for ($i = 0; $i < count($result); $i++) {
                $field_id[] = (int)$result[$i]->id;
            }

            $options = DB::table('options')->whereIn('tmp_tbl_form_field_id', $field_id)->get();
            $data = [
                "status" => true,
                "data" => $result,
                "options" => $options,
                "msg" => "success",
                "slug" => $request->slug,
            ];
        } else {
            $data = [
                "status" => true,
                "data" => "",
                // "options" => $options,
                "msg" => "failer",
                "slug" => $request->slug,
            ];
        }
        return $data;
    }

    function storeCustomForm(Request $request)
    {
        $formData = $request->form;
        $cat_id = $request->cat_id;
        $optionData = [];
        // return count($formData);
        $lastId = 0; //insert if table empty
        $sql = DB::table('tmp_tbl_form_field')->limit(1)->orderBy('id', 'DESC')->get();
        if (count($sql) > 0) {
            $lastId = $sql[0]->id;
        }

        foreach ($formData as $key => $value) {

            $data[] =  [
                'category_id' => $cat_id,
                'tag_type_id' => $value['tag_id'],
                'label' => $value['tag_label'],
                'name' => $value['tag_name'],
                'is_need' => $value['is_need'],
                'orderby' => $value['orderby'],
                // 'option' => isset($value['options']) == 1 ? json_encode($value['options']) : json_encode([]),
            ];

            // $id = DB::table('tmp_tbl_form_field')->insertGetId($data);
            if (!empty($value['options'])) {
                $optionData[] = $value;
                // foreach ($value['options'] as $key => $option) {
                //     $optionData[] = $value

                //     // DB::table('options')->insert(['tag_id' => $value['tag_id'], 'option' => $option, 'tmp_tbl_form_field_id' => $id]);
                // }
            }
        }
       
        DB::table('tmp_tbl_form_field')->insert($data);
        $getInsertData = DB::table('tmp_tbl_form_field')->where('id', '>', $lastId)->get();
        $newOpData = [];
        foreach ($optionData as $key => $opData) {
            foreach ($getInsertData as $key => $dbData) {
                if (
                    $opData['tag_id'] == $dbData->tag_type_id &&
                    $opData['tag_label'] == $dbData->label &&
                    $opData['tag_name'] == $dbData->name &&
                    $opData['is_need'] == $dbData->is_need &&
                    $opData['orderby'] == $dbData->orderby
                ) {
                    foreach ($opData['options'] as $key => $option) {
                        $newOpData[] = [
                            'option' => $option['data'],
                            'tmp_tbl_form_field_id' => $dbData->id
                        ];
                    }

                    break;
                }
            }
        }

        DB::table('options')->insert($newOpData);
        $data = [
            "status" => true,
            "data" => $request->formData,
            "msg" => "success",
            "slug" => $request->slug,
        ];
        return $data;
        
    }

    function showCategory()
    {
        $category = DB::table('category')->where(['parent_id' => null])->get();
        return view('universal.category', compact(['category']));
    }

    function storeCategory(Request $request)
    {

        $id = $request->parent_id;
        $category = $request->category;
        $slugs = $request->slugs;
        for ($i = 0; $i < count($category); $i++) {
            $result = [
                'name' => $category[$i],
                'slug' => $slugs[$i],
                'parent_id' => $id,
            ];
            DB::table('category')->insert($result);
        }

        $data = [
            "status" => true,
            "msg" => 'create succuessfully',
            'slug' => $request->slug,
        ];
        return $data;
    }
}
