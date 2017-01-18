@extends('layout.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
        <a href="{{route('address.create')}}" class="btn btn-info"><i class="fa fa-btn fa-plus-circle"></i>Add New Contact</a>
            <div class="panel panel-success">
                <div class="panel-heading">View Address Book</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Sr No.</th>
                              <th>Title</th>
                              <th>Person Name</th>
                              <th>Phone Number</th>
                              <th>Address</th>
                              <th>Pincode</th>
                              <th>City</th>
                              <th>State</th>
                              <th>Country</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @forelse ($addressData as $k => $address)
                            <tr>
                              <th scope="row">{{($k+1)}}</th>
                              <td>{{$address->title}}</td>
                              <td>{{$address->person_name}}</td>
                              <td>{{$address->person_phone}}</td>
                              <td>{{$address->address_line1}}<br>{{$address->address_line2}}<br>{{$address->address_line3}}</td>
                              <td>{{$address->pincode}}</td>
                              <td>{{$address->city}}</td>
                              <td>{{$address->state}}</td>
                              <td>{{$address->country}}</td>
                              <td>
                              
                              <a href="{{route('address.edit',$address->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                              <form action="{{route('address.destroy',$address->id)}}" method="post">
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                              </form>
                              </td>
                              
                            </tr>
                        @empty
                            <tr>
                              <td colspan="10">No Recor Found</td>
                            </tr>
                        @endforelse
                            
                            
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
