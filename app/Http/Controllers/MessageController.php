<?php

namespace ITOportunidades\Http\Controllers;

use Illuminate\Http\Request;
use ITOportunidades\Message;
use Mail;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		$this->validate($request, [
			'name' => 'required|max:255',
			'email' => 'required|email',
			'message' => 'required'
		]);
			
		if ( Message::create($request->all())) {
			
			$cdata = array(	"name" => $request["name"],
							"email" => $request["email"],
							"message" => $request["message"] );
			
				Mail::later(5,'website.emails.contact', ['cdata'=>$cdata], function($msj) {
					
					$msj->from('info@it-oportunidades.com', 'IT-Oportunidades :: Contacto');
					
					$msj->to("karina.ferrarotti@4latam.com")->to("marcelo.arrabal@4latam.com")->subject('Nuevo mensaje de contacto');
				});			
						
				Mail::later(5,'website.emails.contact', ['cdata'=>$cdata], function($msj) use ($cdata) {
					
					$msj->from('info@it-oportunidades.com', 'IT-Oportunidades :: Contacto');
					
					$msj->to($cdata["email"])->subject('Gracias por comunicarte con nosotros!');
				});

			
			return response()->json(array(	"status"=>"success",
											"message"=>"Mensaje enviado con éxito"));			
			
		} else {
			return response()->json(array(	"status"=>"error",
											"message"=>"Ha ocurrido un error inesperado, por favor vuelva a intentarlo"));
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
