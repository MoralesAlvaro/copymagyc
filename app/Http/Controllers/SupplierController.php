<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $slug = 'supplier';
        $encabezados= ['id', 'Nombre', 'Dirección', 'Empresa', 'Correo'];
        $campos= ['id', 'name', 'address', 'company_type', 'email'];
        $data = Supplier::orderBy('id', 'DESC')->paginate();
        return view('supplier.index', compact('slug','encabezados', 'campos', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $slug = 'supplier';
        return view('supplier.create', compact('slug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:suppliers'],
            'address' => ['required', 'string', 'max:255'],
            'nrc' => ['required', 'numeric', 'min:7', 'unique:suppliers'],
            'nit' => ['required', 'numeric', 'min:17', 'unique:suppliers'],
            'company_type' => ['required', 'string', 'max:7'],
            'business' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'numeric', 'min:8', 'unique:suppliers'],
            'email' => ['required', 'email', 'max:50', 'unique:suppliers'],
            'dui' => ['required', 'numeric', 'min:9', 'unique:suppliers'],
            'active' => 'required|boolean',
        ]);

        $supplier = new Supplier($request->all());
        $supplier->save();

        return redirect()->back()->with('success', 'El Proveedor se ha registrado correctamente!.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slug = 'supplier';
        $data = supplier::findOrFail($id);
        return view('supplier.show', compact('slug', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          
        $slug = 'supplier';
        $data = Supplier::findOrFail($id);
        return view('supplier.edit', compact('slug', 'data'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $supplier = Supplier::findOrFail($id);
        if ($supplier) {
            
            // Validando data
            $request->validate([
                'name' => 'required','string','max:255','unique:suppliers'.$supplier->name,
                'address' => 'required','string','max:255',
                'nrc' => 'required','numeric','max:7','unique:suppliers',
                'nit' => 'required','numeric','max:17','unique:suppliers',
                'company_type' => 'required','string','max:7',
                'business' => 'required','string','max:255',
                'telephone' => 'required','numeric','max:8','unique:suppliers',
                'email' => 'required','email','max:50','unique:suppliers',
                'dui' => 'required','numeric','max:9','unique:suppliers',
                'active' => 'required','boolean',
            ]);

            // Verificando si ha habido modificaciones
            $campos = ['name', 'surname', 'email', 'is_admin', 'active'];
            foreach ($campos as $item) {
                // Valor traido de la bd
                $valor_campo_old = $supplier->$item;
                // Valor traido del formulario
                $valor_campo_new = $request->get($item);
                if ($valor_campo_new != $valor_campo_old) {
                    // Actualizando campo
                    $supplier->fill([$item => $valor_campo_new])->save();
                }
            }

            return redirect('/supplier'.'/'.$id)->with('success', 'El Proveedor se ha sido actualizado correctamente!.');      
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Supplier::find($id);
        if ($data == null) {
            return redirect('/supplier')->with('success', 'El registro que desea eliminar no se encuentra!.');
        }
        
        $data->delete();
        return redirect('/supplier')->with('success', 'El registro se ha sido eliminado correctamente!.');
    }
}
