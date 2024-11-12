<?php

namespace App\Http\Modules\Usuarios\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\Usuarios\Repositories\UserRepository;
use App\Http\Modules\Usuarios\Requests\CrearUserRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        protected  UserRepository $userRepository
    ) {}

    public function listarUsuarios(Request $request){
        try {
            $usuarios = $this->userRepository->listarUsuario($request->all());
            return response()->json($usuarios, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                Response::HTTP_INTERNAL_SERVER_ERROR
            ]);
        }
    }

    public function buscarUsuario(Request $request, int $id){
        try {
            $usuarios = $this->userRepository->buscarUsuario($id, $request->all());
            return response()->json($usuarios, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                Response::HTTP_INTERNAL_SERVER_ERROR
            ]);
        }
    }

    public function crearUsuario(CrearUserRequest $request){
        try {
            $usuarios = $this->userRepository->crearUsuario($request->validated());
            return response()->json($usuarios,  Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function actualizarUsuario(Request $request, $id){
        try {
            $id = $this->userRepository->actualizarUsuario($request->all(), $id);
            return response()->json($id, 200);
        } catch (\Throwable $th) {
            return response()->json([$th->getMessage()],500);
        }
    }

}
