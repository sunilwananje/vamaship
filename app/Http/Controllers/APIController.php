<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\AddressBook;
use Response;
class APIController extends Controller {
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public $message = [];
	public function index()
	{
		$addressData = AddressBook::orderBy('title', 'asc')->get();
		return Response::json($addressData);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('add_address_book');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
			//dd($request->all());
		$addressObj = new AddressBook();
		$validator = $addressObj->validate($request->all());
		//dd($validator);
		if($validator->fails()){
			return Response::json($validator->messages());
		}else{
			$result = $addressObj->saveAddress($request->all());
			if($result){
	        	$this->message['success'] = "New contact is added.";
	        }else{
	        	$this->message['fail'] = "Somthing went wrong.";
	        }
            return Response::json($this->message);
			//return $result;
		} 
	}
   
   /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$addressObj = new AddressBook();
		$validator = $addressObj->validate($request->all());
		//dd($validator);
		if($validator->fails()){
           return redirect()->back()->withErrors($validator);
		}else{
			$result = $addressObj->saveAddress($request->all(),$id);
			if($result){
	        	$this->message['success'] = "Contact is updated.";
	        }else{
	        	$this->message['fail'] = "Somthing went wrong.";
	        }
            return Response::json($this->message);
		} 
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 $result = AddressBook::where('id',$id)->delete();
		   if($result){
	        	$this->message['success'] = "Contact is deleted.";
	        }else{
	        	$this->message['fail'] = "Somthing went wrong.";
	        }
	        return Response::json($this->message);
	}

	

}
