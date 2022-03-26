<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Repository\AlunoRepository;
use App\Http\Repository\RegistroEvolutivoRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;

use App\Http\Service\Arquivo\ArquivoService;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTFactory;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @group Aluno / Registro Evolutivo
 *
 * APIs para gerenciar as mensalidades das contas de alunos
 */
class RegistroEvolutivoController extends Controller
{
    private $repository;
    private $registroEvolutivoRepository;
    private $arquivoService;

    private $guard;

    public function __construct(
        AlunoRepository $repository,
        RegistroEvolutivoRepository $registroEvolutivoRepository,
        ArquivoService $arquivoService,
        Guard $guard
    ){
        $this->repository = $repository;
        $this->registroEvolutivoRepository = $registroEvolutivoRepository;
        $this->arquivoService = $arquivoService;

        $this->guard = auth('aluno');
    }

    /**
     * Listar Registro
     *
     * Retorna os dados do registro evolutivo do aluno
     * @authenticated
     *
     * @urlParam per_page int Registros por página. 
     * @urlParam page int Página atual. 
     * 
     * @response {
     *   "current_page": 1,
     *   "data": [
     *       {
     *           "id": 1,
     *           "arquivo": 1,
     *           "datahora": "9999-99-99 99:99:99",
     *           "descricao": "..."
     *       }
     *   ],
     *   "first_page_url": "http://domain/aluno/registroevolutivo?page=1",
     *   "from": 1,
     *   "last_page": 1,
     *   "last_page_url": "http://domain/aluno/registroevolutivo?page=1",
     *   "next_page_url": null,
     *   "path": "http://domain/aluno/registroevolutivoo",
     *   "per_page": 20,
     *   "prev_page_url": null,
     *   "to": 1,
     *   "total": 1
     * }
     */
    public function index(Request $request)
    {
        $aluno = $this->guard->user();
        if($request->has('id')){
            $request->merge(['aluno' => $request->input("id")]);
        }else{
            $request->merge(['aluno' => $aluno->alu_id]);
        }
        $result = $this->registroEvolutivoRepository->listItems($request->all(), $request->input("per_page", 20));
        return response()->json($result);
    }

    /**
     * Enviar Registro
     *
     * Envia um novo registro evolutivo do aluno
     * @authenticated
     *
     * @bodyParam arquivo file required Arquivo do upload 
     * @bodyParam descricao string Descrição do registro
     * 
     * @response 400 {
     *     "erro": true,
     *     "mensagem": "Não foi possível realizar o upload do documento"
     * }
     * 
     * @response 200 {
     *   "erro": false
     * }
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $aluno = $this->guard->user();
        $arquivo = $this->arquivoService->uploadFiles($request->file("arquivo"), "registro.jpg", "registroevolutivo");
        if(!$arquivo){
            DB::rollback();
            return response()->json([
                'erro' => true,
                'mensagem' => 'Não foi possível realizar o upload do arquivo'
            ], 400);
        }
        $result = $this->registroEvolutivoRepository->create([
            'arq_id' => $arquivo->arq_id,
            'alu_id' => $aluno->alu_id,
            'regev_titulo' => $request->input('titulo'),
            'regev_descricao' => $request->input('descricao'),
            'regev_datahora' => date("Y-m-d H:i:s")
        ]);
        if(!$result){
            DB::rollback();
            return response()->json([
                'erro' => true,
                'mensagem' => 'Não foi possível inserir o registro evolutivo'
            ], 400);
        }
        DB::commit();
        return response()->json([
            'erro' => false
        ]);
    }
}
