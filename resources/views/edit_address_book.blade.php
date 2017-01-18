@extends('layout.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Edit Address Book</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('address.update',$address->id) }}">
                     <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $address->title or old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('person_name') ? ' has-error' : '' }}">
                            <label for="person_name" class="col-md-4 control-label">Person Name</label>

                            <div class="col-md-6">
                                <input id="person_name" type="text" class="form-control" name="person_name" value="{{$address->person_name or old('person_name') }}">

                                @if ($errors->has('person_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('person_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('person_phone') ? ' has-error' : '' }}">
                            <label for="person_phone" class="col-md-4 control-label">Person Phone</label>

                            <div class="col-md-6">
                                <input id="person_phone" type="text" class="form-control" name="person_phone" value="{{ $address->person_phone or old('person_phone') }}">

                                @if ($errors->has('person_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('person_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address_line1') ? ' has-error' : '' }}">
                            <label for="address_line1" class="col-md-4 control-label">Address Line1</label>

                            <div class="col-md-6">
                                <input id="address_line1" type="text" class="form-control" name="address_line1" value="{{ $address->address_line1 or old('address_line1') }}">

                                @if ($errors->has('address_line1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_line1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address_line2') ? ' has-error' : '' }}">
                            <label for="address_line2" class="col-md-4 control-label">Address Line2</label>

                            <div class="col-md-6">
                                <input id="address_line2" type="text" class="form-control" name="address_line2" value="{{ $address->address_line2 or old('address_line2') }}">

                                @if ($errors->has('address_line2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_line2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('address_line3') ? ' has-error' : '' }}">
                            <label for="address_line3" class="col-md-4 control-label">Address Line3</label>

                            <div class="col-md-6">
                                <input id="address_line3" type="text" class="form-control" name="address_line3" value="{{ $address->address_line3 or old('address_line3') }}">

                                @if ($errors->has('address_line3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_line3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
                            <label for="pincode" class="col-md-4 control-label">Pincode</label>

                            <div class="col-md-6">
                                <input id="pincode" type="text" class="form-control" name="pincode" value="{{ $address->pincode or old('pincode') }}">

                                @if ($errors->has('pincode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pincode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ $address->city or old('city') }}">

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" value="{{ $address->state or old('state') }}">

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">Country</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ $address->country or old('country') }}">

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
