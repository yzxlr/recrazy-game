<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    function getCategoryNameById($cat_id){
        
        $cat_name = "";
        $JobsCat = M('JobsCat');
        $JobsCat->where("cat_id='$cat_id'")->find();
        //var_dump($JobsCat);
        $cat_name = $JobsCat->cat_name;
        
        return $cat_name;
    }
?>
