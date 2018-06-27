@extends('layouts.admin')
@section('style')
    <style>
        .input-field {
            color: #e53935 !important;
        }
        /* label focus color */
        .input-field input[type=text]:focus + label {
            color: #e53935 !important;
        }
        /* label underline focus color */
        .input-field input[type=text]:focus {
            border-bottom: 1px solid #e53935 !important;
            box-shadow: 0 1px 0 0 #e53935 !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
@endsection