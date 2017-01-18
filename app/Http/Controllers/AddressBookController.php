<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\AddressBook;
use Response,Session;
class AddressBookController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$addressData = AddressBook::orderBy('title', 'asc')->get();
		return view('view_address_book',compact('addressData'));
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
           return redirect()->back()->withErrors($validator);
		}else{
			$result = $addressObj->saveAddress($request->all());
			if($result){
        	    Session::flash('message',"New contact is added.");
	        }else{
	        	Session::flash('message',"Somthing Went Wrong");
	        }
			//Session::flash('message',"New contact is added.");
            return redirect()->route('address.index');
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
		$address = AddressBook::where('id',$id)->first();
		return view('edit_address_book',compact('address'));

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
		
		if($validator->fails()){
           return redirect()->back()->withErrors($validator);
		}else{
			$result = $addressObj->saveAddress($request->all(),$id);
			//dd($result);
			if($result){
        	    Session::flash('message',"Contact is update.");
	        }else{
	        	Session::flash('message',"Somthing Went Wrong");
	        }
			//Session::flash('message',"New contact is added.");
            return redirect()->route('address.index');
			//return $result;
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
		//$result = AddressBook::where('id',$id)->delete();
		$result = AddressBook::findOrFail($id)->delete();
  
		if($result){
        	    Session::flash('message',"Contact is deleted.");
	        }else{
	        	Session::flash('message',"Somthing Went Wrong");
	        }
			//Session::flash('message',"New contact is added.");
            return redirect()->route('address.index');
	}

}
