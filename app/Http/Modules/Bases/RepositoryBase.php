<?php

namespace App\Http\Modules\Bases;

use Illuminate\Database\Eloquent\Model;
use App\Http\Modules\Bases\BaseService;

class RepositoryBase
{
    protected $model;

    public function listar($data){
        $orden = isset($data->orden) ? $data->orden : 'asc';
        $filas = $data->filas ? $data->filas : 10;

        $consulta = $this->model
            ->orderBy('created_at', $orden);

        return $data->page ? $consulta->paginate($filas) : $consulta->get();
    }

    public function buscar(int $id){
        return  $this->model->find($id);
    }

    public function guardar(Model $model){
        $model->save();
        return $model;
    }

    public function crear($data){
        return $this->model->create($data);
    }

    public function actualizar($model, $data){
        return $model->update($data);
    }

}
