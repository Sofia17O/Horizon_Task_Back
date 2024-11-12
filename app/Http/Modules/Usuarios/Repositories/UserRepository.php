<?php

namespace App\Http\Modules\Usuarios\Repositories;

use App\Http\Modules\Bases\RepositoryBase;
use App\Http\Modules\Usuarios\Models\User;

class UserRepository extends RepositoryBase
{



    public function __construct(protected User $userModel)
    {

    }

    public function listarUsuario()
    {
        return $this->userModel->get();
        // return 'Hola';
    }

    public function buscarUsuario($idUsuario)
    {
        return $this->userModel->findOrFail($idUsuario);
        // return 'test';
    }

    public function crearUsuario(array $data)
    {
        return $this->userModel->create($data);
    }

    public function actualizarUsuario(array $data, $idUsuario)
    {
        $usuario = $this->userModel->findOrFail($idUsuario);
        $usuario->update($data);
        return $usuario;
    }

}
