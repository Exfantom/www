<?php

namespace App\Repository;
use Illuminate\Routing\Router;
/**
 * Created by PhpStorm.
 * User: ������
 * Date: 03.08.2015
 * Time: 20:17
 */
class TreeRepository implements TreeRepositoryInterface

{
    /** @var  ������ ��������� ������ �� ��������� ������� */
    private $model;

    /**
     * @return object
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     *
     *
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    public function __construct(Router $router )
    {
        //$action = $router->getCurrentRoute()->getActionName();
        //var_dump($action);

        //$parametr=$router->getCurrentRoute()->parameter('adminmodel');
        //var_dump($parametr);
    }

    public function bind($value, $route)
    {
        $parameter=$route->parameter('adminmodel');
        var_dump($parameter);

        $modelName = "App\\".$parameter;
        $model = new $modelName();
        $this->setModel($model);

    }



}