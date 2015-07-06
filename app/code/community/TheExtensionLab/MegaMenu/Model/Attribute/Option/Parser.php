<?php

class TheExtensionLab_MegaMenu_Model_Attribute_Option_Parser
    implements TheExtensionLab_MegaMenu_Model_Widget_Parser_Interface
{
    public function saveDataToPrefetch($params)
    {
        $dataToPrefetch = array();
        if(isset($params['option_ids'])) {
            $optionIds = json_decode($params['option_ids']);
            foreach($optionIds as $key => $value):
                $dataToPrefetch['option_ids'][] = $key;
                if(isset($params['category_id'])):
                    $dataToPrefetch['rewrite_ids'][] = 'category/'.$params['category_id'];
                endif;
            endforeach;
        }

        return $dataToPrefetch;
    }
}