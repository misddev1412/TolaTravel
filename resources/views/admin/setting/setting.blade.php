@extends('admin.layouts.template')
@section('main')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('admin_setting_create') }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                @csrf

                @if(count(config('setting_fields', [])) )

                    @foreach(config('setting_fields') as $section => $fields)

                        <div class="row mb-2">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="dashboard_graph">
                                    <div class="row x_title">
                                        <div class="col-md-6">
                                            <h4>
                                                <i class="{{ array_get($fields, 'icon', 'glyphicon glyphicon-flash') }}"></i>
                                                {{ $fields['title'] }}
                                                <span class="small">{{$fields['desc']}}</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-7  col-md-offset-2">
                                        @foreach($fields['elements'] as $field)
                                            @includeIf('admin.setting.fields.' . $field['type'] )
                                        @endforeach
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <br>

                    @endforeach

                @endif

                <div class="row m-b-md">
                    <div class="col-md-12">
                        <button class="btn-primary btn">
                            Save Settings
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
