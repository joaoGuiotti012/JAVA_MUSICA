<?php

namespace App\Http\Controllers;
use App\agendamentoVisita as Agendamento;
use App\Funcionario;
use App\Visitantes;
use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use DateTime;
use DB;
use Dotenv\Validator;
use Exception;
use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\VarDumper\VarDumper;
date_default_timezone_set('America/Sao_Paulo');
class ControladorAgendamento extends Controller
{
    
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    public function index(Funcionario $func)
    {
        $func = Funcionario::all();
        $visitantes = Visitantes::all();
        return view('visitas.agendamento', compact('func' , 'visitantes'));
    }
  
    public function entrada($id)
    {
       
        $agendamento = Agendamento::find($id);
        $agendamento->dataEntrada = Carbon::now();
        $agendamento->hrEntrada = date('H:i:s');
        $entrada = $agendamento->save();
        if($entrada){
            return redirect('agendamento/saida' )->with('primary', 'Visitante entrou na empresa !' );
        }
    }

    public function confSaida($id)
    {
       
        $agendamento = Agendamento::find($id);
        $agendamento->dataSaida = Carbon::now();
        $agendamento->hrSaida = date('H:i:s');
        $entrada = $agendamento->save();
        if($entrada){
            return redirect('agendamento/saida' )->with('saida', 'Visitante saiu na empresa !' );
        }
    }



    public function store(Request $request)
    {   
        $agendamento = new Agendamento();
        $request = Agendamento::valido($request);
        $agendamento->codigo = $request->codigo;
        $agendamento->visitado_id = $request->visitado_id;
        $agendamento->visitante_id = $request->visitante_id;
        $agendamento->dataPrevisao = $request->dataPrevisao;
        $agendamento->horarioPrevisao = $request->horarioPrevisao;
        $agendamento->descricao = $request->descricao;
        try{

            if($agendamento->save()){
                return redirect('agendamento/saida' )->with( 'success', ' Agendamento confirmado com sucesso ! ' );  
                exit; 
            }

        }catch( Exception $e){
            return redirect('agendamento/saida' )->with( 'fail', $e->getMessage() );
        }

        /*if(  > 0){
            return redirect('agendamento/saida' )->with( 'success', ' Agendamento confirmado com sucesso ! ' );
        }*/

    }

    public function show( )
    {
        $agendamento = Agendamento::selectAll();
        $cont = count($agendamento);
        return view('visitas.saidaAgendamento', compact('agendamento'), compact('cont'));
        
    }

    public function showHistorico( )
    {
        $agendamento = Agendamento::selectAll();
        $cont = count($agendamento);
        return view('visitas.historicoAgendamento', compact('agendamento'), compact('cont'));
        
    }

    public function search(Request $request){
        $busca = Agendamento::search($request->get('search'));
        $cont = count($busca);
        return view('visitas.saidaAgendamento', compact('busca') ,compact('cont'));
    }

    public function histSearch(Request $request){
        
        //$busca = Agendamento::histSearch($request);
            
            $busca = Agendamento::histSearch( $request);

        return view('visitas.historicoAgendamento',  compact('busca'));
    }

    public function saida($id){
        $agendamento = Agendamento::find($id);
        $agendamento->dataSaida = Carbon::now();
        if( $agendamento->save() ){
            return redirect('agendamento/saida')->with('primary' , 'Confirmação de saida realizada com sucesso! ');
        }
    }

    public function edit($id)
    {
        //
    }
  
    public function update(Request $request, $id)
    {
        $request = Agendamento::valido($request);
       
        $agendamento = Agendamento::find($id);
        $agendamento->nome = $request->get('nome');
        $agendamento->empresa = $request->get('empresa');
        $agendamento->rg = $request->get('rg');
        $agendamento->codigo = $request->get('codigo');
        $agendamento->visitado_id = $request->get('visitado_id');
        $agendamento->dataEntrada = $request->get('dataEntrada');
        $update = $agendamento->save();

        if($update){
            return redirect('agendamento/saida' )->with('success', 'Agendamento atualizado :) ');
        }
    }

    public function exportExcel()
    {    
        $dadosXls  = "";
        $dadosXls .= "  <table border='1' >";
        $dadosXls .= "      <tr>";
        $dadosXls .= "          <th>Código</th>";
        $dadosXls .= "          <th>Descrição</th>";
        $dadosXls .= "          <th>Visitante</th>";
        $dadosXls .= "          <th>RG</th>";
        $dadosXls .= "          <th>Empresa</th>";
        $dadosXls .= "          <th>Visitado</th>";
        $dadosXls .= "          <th>Setor</th>";
        $dadosXls .= "          <th>Data Entrada</th>";
        $dadosXls .= "          <th>Data Saida</th>";
        $dadosXls .= "      </tr>";
        $result = Agendamento::selectAll();
       
        foreach($result as $res){
            if( $res->dataSaida != null){   
                $dadosXls .= "      <tr>";
                $dadosXls .= "          <td>".$res->codigo."</td>";
                $dadosXls .= "          <td>".$res->descricao."</td>";
                $dadosXls .= "          <td>".$res->nome."</td>";
                $dadosXls .= "          <td>".$res->rg."</td>";
                $dadosXls .= "          <td>".$res->empresa."</td>";
                $dadosXls .= "          <td>".$res->nome_func."</td>";
                $dadosXls .= "          <td>".$res->setor."</td>";
                $dadosXls .= "          <td>".$res->dataEntrada."</td>";
                $dadosXls .= "          <td>".$res->dataSaida."</td>";
                $dadosXls .= "      </tr>";
            }
        }
        $dadosXls .= "  </table>";
     
        // Definimos o nome do arquivo que será exportado
        $arquivo = 'historico' . date('_His').".xls"; 
         //"MinhaPlanilha.xls";  
        // Configurações header para forçar o download  
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$arquivo.'"');
        header('Cache-Control: max-age=0');
        // Se for o IE9, isso talvez seja necessário
        header('Cache-Control: max-age=1');
           
        // Envia o conteúdo do arquivo  
        echo $dadosXls;  
        exit;
    }

  
    public function destroy( $id)
    {
        $agendamento = Agendamento::find($id);
        $agendamento->delete();
        
        return redirect('agendamento/saida')->with('success', 'Agendamento deletado com sucesso !! ');
        
    }
}
