<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use DB;

class Node extends BaseModel
{
    
	
	//
	
	protected $change_name_fiels_normalizete = ['content'=>'Editor2'];
	
	//protected $table = 'Node';
	
	
    public function getTableCol() {
        //return \Schema::getColumnListing($this->table);
		return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }


    public function columns(){
      $table = $this->getTable();
      return DB::select(" SHOW COLUMNS FROM ".$table);
    }
	
	
}
