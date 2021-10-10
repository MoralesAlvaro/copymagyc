<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slug = 'customers';
        $encabezados= ['id', 'Nombre', 'NIT', 'NRC', 'Empresa'];
        $campos= ['id', 'name','nit', 'nrc', 'company_type'];
        $data = Customer::orderBy('id', 'DESC')->paginate();
        return view('customers.index', compact('slug','encabezados', 'campos', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $slug = 'customers';
        return view('customers.create', compact('slug'));
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
           'name' => ['required', 'string', 'max:255', 'unique:customers'],
           'address' => ['string', 'max:255', 'nullable'],
           'nrc' => ['required', 'numeric', 'min:7', 'unique:customers'],
           'nit' => ['required', 'numeric', 'min:17', 'unique:customers'],
           'company_type' => ['required', 'string', 'max:7'],
           'business' => ['string', 'max:255', 'nullable'],
           'active' => 'required|boolean',
           'user_id' => 'required|integer',
       ]);

       $cusotmer = new Customer($request->all());
       $cusotmer->save();

       return redirect()->back()->with('success', 'El Cliente se ha registrado correctamente!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $slug = 'customers';
        $data = Customer::findOrFail($id);
        return view('customers.show', compact('slug', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slug = 'customers';
        $data = Customer::findOrFail($id);
        return view('customers.edit', compact('slug', 'data'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        if ($customer) {
            
            // Validando data
            $request->validate([
                'name' => 'required|string|max:255|unique:customers,name,'.$customer->id,
                'address' => 'required|string|max:255',
                'nrc' => 'required|numeric|min:7|unique:customers,nrc,'.$customer->id,
                'nit' => 'required|numeric|min:17|unique:customers,nit,'.$customer->id,
                'company_type' => 'required|string|max:7',
                'business' => 'required|string|max:255',
                'active' => 'required|boolean',
            ]);

            // Verificando si ha habido modificaciones
            $campos = ['name', 'address', 'nrc', 'nit', 'company_type', 'business', 'active'];
            foreach ($campos as $item) {
                // Valor traido de la bd
                $valor_campo_old = $customer->$item;
                // Valor traido del formulario
                $valor_campo_new = $request->get($item);
                if ($valor_campo_new != $valor_campo_old) {
                    // Actualizando campo
                    $customer->fill([$item => $valor_campo_new])->save();
                }
            }

            return redirect('/customers'.'/'.$id)->with('success', 'El Proveedor se ha sido actualizado correctamente!.');      
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::find($id);
        if ($data == null) {
            return redirect('/customers')->with('success', 'El registro que desea eliminar no se encuentra!.');
        }
        
        $data->delete();
        return redirect('/customers')->with('success', 'El registro se ha sido eliminado correctamente!.');
    }
}