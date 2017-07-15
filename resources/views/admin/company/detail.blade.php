@extends('layouts.admin')
    @section('content')
    <div>
    <div class="row centered-form">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h3 class="panel-title">Datos Empresa</h3>
                            </div>
                        
                            <div class="col-xs-6 " style='text-align:center; margin-top: 20px; z-index: 1'>
                                    <img src="/images/companylogo/{{$company->logo_company}}" alt="" style="width: 200px; height: 200px;"/>
                            </div>
                        
                            <div class="panel-body">
                                @include('admin.company.forms.company')

                            </div>
                    </div>
            </div>
    </div>
@endsection