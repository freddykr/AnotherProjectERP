<?php

/**
 * MuWebCloneEngine
 * Created by epmak
 * 19.11.2016
 *
 **/
namespace build\erp\adm\m;
use mwce\Connect;
use mwce\Model;

class mModules extends Model
{
    /**
     * @param array $params
     * @return mModules
     */
    public static function Add($params){
        $db = Connect::start();
        $db->exec("INSERT INTO tbl_modules (col_title,col_path,col_cache,col_isClass) VALUE('{$params['titleList']}','{$params['adrCnt']}',{$params['cachSec']},{$params['isMVC']})");
        return self::getCurModel($db->lastId('tbl_modules'));
    }

    /**
     * @param array $groups
     */
    public function addGroupToModule($groups){
        $this->db->exec('DELETE FROM tbl_module_groups WHERE col_modID = '.$this['col_modID']);

        if(empty($groups))
            return;

        $q = '';
        foreach ($groups as $group) {
            if(!empty($q))
                $q.=',';
            $q.= "({$this['col_modID']},$group)";
        }
        if(!empty($q)){

            $this->db->exec("INSERT INTO tbl_module_groups (col_modID,col_gID) VALUES $q");
        }
    }

    /**
     * @param array $groups
     */
    public function addRolesToModule($groups){

        $this->db->exec('DELETE FROM tbl_module_roles WHERE col_modID = '.$this['col_modID']);

        if(empty($groups))
            return;

        $q = '';
        foreach ($groups as $group) {
            if(!empty($q))
                $q.=',';
            $q.= "({$this['col_modID']},$group)";
        }
        if(!empty($q)){

            $this->db->exec("INSERT INTO tbl_module_roles (col_modID,col_roleID) VALUES $q");
        }
    }

    public static function getModels($params = null)
    {
        $db = Connect::start();
        return $db->query("SELECT 
  mm.* 
FROM 
  tbl_modules mm 
order BY mm.col_title")->fetchAll(static::class);
    }

    /**
     * @param int $id
     * @return mModules
     */
    public static function getCurModel($id)
    {
        $db = Connect::start();
        return $db->query("SELECT 
   mm.*,
   GROUP_CONCAT(mr.col_roleID separator ',') as col_roles,
   GROUP_CONCAT(mg.col_gID separator ',') as col_groups
FROM 
   tbl_modules mm 
         LEFT JOIN tbl_module_roles mr ON mr.col_modID = mm.col_modID
         LEFT JOIN tbl_module_groups mg ON mg.col_modID = mm.col_modID
WHERE 
  mm.col_modID = $id
ORDER BY mm.col_title")->fetch(static::class);
    }

    public function edit($params){
        $this->db->exec("UPDATE tbl_modules SET col_title='{$params['titleList']}',col_path='{$params['adrCnt']}',col_cache={$params['cachSec']},col_isClass = {$params['isMVC']} WHERE col_modID = ".$this['col_modID']);
    }

    public function delete(){
        $this->db->exec('DELETE FROM tbl_module_groups WHERE col_modID = '.$this['col_modID']);
        $this->db->exec("DELETE FROM tbl_module_roles WHERE col_modID = {$this['col_modID']}");
        $this->db->exec("DELETE FROM tbl_modules WHERE col_modID = {$this['col_modID']}");
    }

    protected function _adding($name, $value)
    {
        switch ($name){
            case 'col_isClass':
                if($value == '1')
                    parent::_adding($name.'Legend', 'MVC');
                else
                    parent::_adding($name.'Legend', 'script');
                break;
        }
        parent::_adding($name, $value);
    }
}