<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use App\Nodes;

class page extends BaseModel
{
    
    /**
     * Database tree fields
     *
     * @var array
     */
    protected static $treeColumns = [
        'path'   => 'path',
        'parent' => 'pid',
        'level'  => 'level'
    ];	
	
	//

	
	public function parent()
    {
        return $this->belongsTo(get_class($this), "pid", $this->getKeyName());
    }
	
    public function nodes()
    {
        return $this->hasMany(get_class($this), "pid", $this->getKeyName());
    }
	
	
    public function node()
    {
        return $this->hasMany('App\Node',"pages_id");
    }	

    /**
     * Gets all root nodes
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function getRoots()
    {
        return static::where(static::getTreeColumn('parent'), '=', 0);
    }
	
	
    /**
     * @param null $name
     *
     * @throws \Exception
     */
    public static function getTreeColumn($name = null)
    {
        if (empty($name)) {
            return static::$treeColumns;
        } elseif (!empty(static::$treeColumns[$name])) {
            return static::$treeColumns[$name];
        }
        throw new \Exception('Tree column: ' . $name . ' undefined');
    }	
	
}
