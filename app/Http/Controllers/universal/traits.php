<!-- 
            $result = DB::table('form_data')
                ->join('tmp_tbl_form_field', 'form_data.tmp_tbl_form_field_id', '=', 'tmp_tbl_form_field.id')
                ->select("tmp_tbl_form_field.id", 'form_data.input_data', 'form_data.id as form_data_id')
                ->where(['tmp_tbl_form_field.category_id' => $cat_id])
                ->orderBy('form_data.id', 'ASC')
                ->get();
            // echo "<pre>";
            // print_r($result);
            // echo "</pre>";
            // return;

            $opData = DB::table('form_option_data')
                ->join('tmp_tbl_form_field', 'form_option_data.tmp_tbl_form_field_id', '=', 'tmp_tbl_form_field.id')
                ->join('options', 'form_option_data.options_id', '=', 'options.id')
                ->select('options.tmp_tbl_form_field_id', 'options.option', 'form_option_data.form_data_id')
                ->where(['tmp_tbl_form_field.category_id' => $cat_id])

                ->orderBy('form_option_data.form_data_id', 'ASC')
                ->get();


            $input_data_arr = [];
            foreach ($opData as $this_data) {
                $key = 'option_' . $this_data->form_data_id;
                if (empty($input_data_arr[$key])) {
                    $input_data_arr[$key] = [];
                }
                $input_data_arr[$key][] = $this_data->option;
            }
            foreach ($input_data_arr as $key => $this_data) {
                $input_data_arr[$key] = implode(', ', $this_data);
            }
            foreach ($result as $key => $this_data) {
                $op_key = 'option_' . $this_data->form_data_id;
                if (empty($this_data->input_data)) {
                    $result[$key]->input_data = $input_data_arr[$op_key];
                }
            } -->