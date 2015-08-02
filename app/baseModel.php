<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Lang;


class BaseModel extends Model {


		protected $types_normalizete = [];
		protected $name_fiels_normalizete = ['id'=>'hidden','content'=>'Editor'];
		protected $change_name_fiels_normalizete = [];

		public function normalizeteColumns($column = [])
		{		
			foreach($this->types_normalizete as $typeName => $normName)
						if (strpos($column['type'], $typeName) !== false){
									$column['type'] = $normName;
									break;
			}
			
			$name_fiels_normalizete = array_merge($this->name_fiels_normalizete, $this->change_name_fiels_normalizete);
			
			foreach($name_fiels_normalizete as $typeName => $normName)
						if ($column['name']==$typeName){
									$column['type'] = $normName;
									break;
			}			
					
			return $column;								
		}
		
		public function getAllColumnsNames()
		{
			switch (DB::connection()->getConfig('driver')) {
					case 'pgsql':
							$query = "SELECT column_name FROM information_schema.columns WHERE table_name = '".$this->getTable()."'";
							
							$column_name = 'column_name';
							$column_type = 'Type';
							$types = ['tinyint' => 'tinyint','int' => 'int',];
							
							$reverse = true;
					break;
					 
					case 'mysql':
							$query = 'SHOW COLUMNS FROM '.$this->getTable();
							
							$column_name = 'Field';
							$column_type = 'Type';
							$this->types_normalizete = ['tinyint' => 'tinyint','int' => 'int',];
							
							$reverse = false;
					break;
					 
					case 'sqlsrv':
							$parts = explode('.', $this->getTable());
							$num = (count($parts) - 1);
							$table = $parts[$num];
							$query = "SELECT column_name FROM ".DB::connection()->getConfig('database').".INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'".$table."'";
							
							$column_name = 'column_name';
							$column_type = 'Type';
							$this->types_normalizete = ['tinyint' => 'tinyint','int' => 'int',];
							
							$reverse = false;
					break;
					 
					default:
							$error = 'Database driver not supported: '.DB::connection()->getConfig('driver');
							
							throw new Exception($error);
					break;
			}
			 
			$columns = array();
			 
			foreach(DB::select($query) as $column)			{
					
					$columnTitle = '';
					
					if (Lang::has('admin.'.$column->$column_name.$this->getTable()))							
							$columnTitle = Lang::get('admin.'.$column->$column_name.$this->getTable());
						else							
							if (Lang::has('admin.'.$column->$column_name))
							$columnTitle = Lang::get('admin.'.$column->$column_name);
							
					
					$columns[] = $this->normalizeteColumns(['name'=>$column->$column_name, 'type'=>$column->$column_type,'title'=>$columnTitle]);
			}
			
					
			 
			if($reverse)
			{
					$columns = array_reverse($columns);
			}		
			
			
			return $columns;
		}
}
