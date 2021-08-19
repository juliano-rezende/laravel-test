<?php

namespace App\Http\Controllers;

use App\Jobs\ImportCsv;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use League\Csv\Reader;


/**
 * Class ControllerProducts
 * @package App\Http\Controllers
 */
class ControllerProducts extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        setlocale(LC_MONETARY, 'pt_BR');

        $products = (new Product())->limit(50)->get();

        return view('index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate post data
        $this->validate($request, [
            'description' => 'required',
            'quantity' => 'required',
            'amount' => 'required'
        ]);

        //get post data
        $postData = $request->all();

        //insert post data
        $createProduct = (new Product())->create($postData);

        //store status message
        Session::flash('success_msg', 'Produto criado com sucesso!');

        return redirect()->route('product.form.new');
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        if ($request->file('csv')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->file('csv')->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.csv";

            // Faz o upload:
            $env = $request->file('csv')->storeAs('products', $nameFile);

            \App\Jobs\importCsv::dispatch($nameFile)->delay(now()->addSeconds('15')); //15 seconds

            //store status message
            Session::flash('success_msg', 'Arquivo importado com sucesso!');

            return redirect()->route('product.form.new');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = (new Product())->find($id);

        return view('edit_product', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //validate post data
        $this->validate($request, [
            'description' => 'required',
            'quantity' => 'required',
            'amount' => 'required'
        ]);

        $user = (new Product())->find($id);
        $user->description = $request->description;
        $user->quantity = $request->quantity;
        $user->amount = str_replace(',', '.', str_replace('.', '', $request->amount));
        $user->save();


        //store status message
        Session::flash('success_msg', 'Produto editado com sucesso!!');
        return redirect()->route('product.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //update post data
        $remove = (new Product())->find($id)->delete();

        //store status message
        Session::flash('success_msg', 'Produto removido com sucesso!!');

        return redirect()->route('product.index');

    }
}
