<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clientes;
use App\API\ApiError;

class ClientesController extends Controller
{
	/**
	* @var Clientes
	*/
	private $clientes;

	public function __construct(Clientes $clientes){
		$this->clientes = $clientes;
	}

    public function index(){

    	$data = ['data' => $this->clientes->all()];
    	return response()->json($data);
    }

    public function store(Request $request){
    	try{
    		$cliente_data = $request->all();
    		$this->clientes->create($cliente_data);

    		$return = [
    			'data' => [
    				'msg' => 'Cliente cadastrado com sucesso!',
    				'code' => 201
    			] 
    		];
    		
    		return response()->json($return);
    	}
    	catch(\Exception $e){
    		if(config('app.debug')){
    			return response()->json(ApiError::ErrorMessage($e->getMessage(), 1010));
    		}
    		return response()->json(ApiError::ErrorMessage('Houve um erro ao realizar a operação',1010));
    	}
    }

    public function show($id){
    	try{
    		$cliente = $this->clientes->find($id);

    		if($cliente == null){
    			$return = [
	    			'data' => [
	    				'msg' => 'Cliente não encontrado',
	    				'code' => 404
	    			] 
	    		];
    			return response()->json($return);
    		}

    		$data = ['data' => $cliente];
    		return response()->json($data, 200);
    	}
    	catch(\Exception $e){
    		if(config('app.debug')){
    			return response()->json(ApiError::ErrorMessage($e->getMessage(), 1010));
    		}
    		return response()->json(ApiError::ErrorMessage('Houve um erro ao realizar a operação',1010));
    	}
    }

    public function update(Request $request, $id){
    	try{
    		$cliente_data = $request->all();
    		$cliente = $this->clientes->find($id);
    		$cliente->update($cliente_data);

    		$return = [
    			'data' => [
    				'msg' => 'Cliente alterado com sucesso!'
    			] 
    		];
    		
    		return response()->json($return, 201);
    	}
    	catch(\Exception $e){
    		if(config('app.debug')){
    			return response()->json(ApiError::ErrorMessage($e->getMessage(), 1010));
    		}
    		return response()->json(ApiError::ErrorMessage('Houve um erro ao realizar a operação',1010));
    	}
    }

    public function delete(Request $request, $id){
    	try{
    		$cliente_data = $request->all();
    		$cliente = $this->clientes->find($id);

    		if($cliente == null){
    			$return = [
	    			'data' => [
	    				'msg' => 'Cliente não encontrado',
	    				'code' => 404
	    			] 
	    		];
    			return response()->json($return);
    		}

    		$cliente->delete($cliente_data);

    		$return = [
    			'data' => [
    				'msg' => 'Cliente excluido com sucesso!'
    			] 
    		];
    		
    		return response()->json($return, 201);
    	}
    	catch(\Exception $e){
    		if(config('app.debug')){
    			return response()->json(ApiError::ErrorMessage($e->getMessage(), 1010));
    		}
    		return response()->json(ApiError::ErrorMessage('Houve um erro ao realizar a operação',1010));
    	}
    }

}
