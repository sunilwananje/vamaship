<?php 
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Validator,Schema;

class AddressBook extends Model {

	protected $table = 'address_books';
    
    protected $rules = [ 'title' => 'required',
                         'person_name' => 'required',
                         'person_phone' => 'required|numeric',
                        ];
    public $message = [];

    /**
     * Validate address book
     */
	public function validate($data){
       $validator = Validator::make($data, $this->rules);
       return $validator;
	}
    
    /**
     * Save address book
     */
	public function saveAddress($data, $id = 0){
		
      if($id != 0){
      	$obj = self::find($id);
      }else{
        $obj = $this;
      }
      
      $columns = Schema::getColumnListing($this->table);
      //dd($columns);
      foreach ($data as $key => $value) {

        if (in_array($key, $columns)) {
            $obj->$key = $value;
        }
        
      }
       $result = $obj->save();
       
        /*if($result){
        	$this->message['success'] = "New contact is added.";
        }else{
        	$this->message['fail'] = "Somthing went wrong.";
        }*/

        return $result;
	}

	/**
     * Update address book
     
	public function updateAddress($data,$id){
      $obj = $self::find()
      $columns = Schema::getColumnListing($this->table);
      foreach ($data as $key => $value) {
        if (in_array($key, $columns)) {
            $this->$key = $value;
        }
        $this->save();
        return $this->id;
      }
	}
*/
	/**
     * View address book
     */
	public function viewAddress($data){
      
	}
}
