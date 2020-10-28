<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enderecos;
use App\API\ApiError;

class EnderecoController extends Controller
{
    /**
	* @var Enderecos
	*/
	private $enderecos;

	public function __construct(Enderecos $enderecos){
		$this->enderecos = $enderecos;
	}

    public function index($ClienteId){
    	try{
    		$endereco = $this->enderecos->where('ClienteId', '=', $ClienteId)->get();
    		
    		if($endereco == null){
    			$return = [
	    			'data' => [
	    				'msg' => 'Cliente não encontrado',
	    				'code' => 404
	    			] 
	    		];
    			return response()->json($return);
    		}

    		$data = ['data' => $endereco];
    		return response()->json($data, 200);
    	}
    	catch(\Exception $e){
    		if(config('app.debug')){
    			return response()->json(ApiError::ErrorMessage($e->getMessage(), 1010));
    		}
    		return response()->json(ApiError::ErrorMessage('Houve um erro ao realizar a operação',1010));
    	}
    }

    public function store(Request $request, $ClienteId){
        try{
            
            $endereco_data = ['ClienteId' => $ClienteId] + $request->all();
            

            $this->enderecos->create($endereco_data);


            $return = [
                'data' => [
                    'msg' => 'Endereço cadastrado com sucesso!',
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

    public function show($ClienteId, $id){
        try{
            $endereco = $this->enderecos->where('ClienteId', '=', $ClienteId)->where('id', '=', $id)->get();
            
            if($endereco == null){
                $return = [
                    'data' => [
                        'msg' => 'Cliente não encontrado',
                        'code' => 404
                    ] 
                ];
                return response()->json($return);
            }

            $data = ['data' => $endereco];
            return response()->json($data, 200);
        }
        catch(\Exception $e){
            if(config('app.debug')){
                return response()->json(ApiError::ErrorMessage($e->getMessage(), 1010));
            }
            return response()->json(ApiError::ErrorMessage('Houve um erro ao realizar a operação',1010));
        }
    }

    public function update(Request $request, $ClienteId, $id){
        try{
            $endereco_data = $request->all();
            $endereco = $this->enderecos->where('ClienteId', '=', $ClienteId)->where('id', '=', $id);
            
            if($endereco == null){
                $return = [
                    'data' => [
                        'msg' => 'Cliente não encontrado',
                        'code' => 404
                    ] 
                ];
                return response()->json($return);
            }

            $endereco->update($endereco_data);

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

    public function delete(Request $request, $ClienteId, $id){
        try{
            $endereco_data = $request->all();
            $endereco = $this->enderecos->where('ClienteId', '=', $ClienteId)->where('id', '=', $id);

            if($endereco == null){
                $return = [
                    'data' => [
                        'msg' => 'Cliente não encontrado',
                        'code' => 404
                    ] 
                ];
                return response()->json($return);
            }

            $endereco->delete($endereco_data);

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
