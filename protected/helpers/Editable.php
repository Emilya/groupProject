<?php
class Editable {
    static public function inlineEdit($data, $field, $type='text') {
        if($data->contract_id)
            $contract_id = $data->contract_id;
        else
            $contract_id = '';
        return '<div
        contract_id="'.$contract_id.'"
        offer_id="'.$data->offer_id.'"
        model_name="'.get_class($data).'"
        class="inlineEdit" id="' . $data['id'] . '"
        .
        field="'.$field.'"
        type="'.$type.'"
        currency_id='.$data->currency_id.' ">' . $data[$field] . '</div>';
    }

    static public function input($data,$field,$type='checkbox')
    {
        return CHtml::tag('input',array(
            'class'=>get_class($data),
            'field'=>$field,
            'type'=>$type,
            'checked'=>((int)$data->main == 1) ? 'checked' : '',
            'id'=>$data->id,
            'onchange'=>'js: checkCF('.$data->id.',"'.Yii::app()->createUrl('manager/CheckedContactFace').'")',
        ),'');

    }

    static public function Edit($data, $field, $type='text') {
        return CHtml::tag('div',array(
            'model_name'=>get_class($data),
            'class'=>"inlineEdit",
            'id'=>$data['id'],
            'field'=>$field,
            'type'=>$type
        ),$data->$field);
    }
}