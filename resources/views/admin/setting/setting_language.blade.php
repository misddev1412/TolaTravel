@extends('admin.layouts.template')

@section('main')
    <div class="page-title">
        <div class="title_left">
            <h3>Language</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4">
            <div class="x_panel">
                <div class="x_content">

                    <form action="{{route('admin_settings_language_status', \App\Models\Language::STATUS_ACTIVE)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <select class="form-control" name="language_id">
                                @foreach($language_deactive as $language)
                                    <option value="{{$language->id}}">{{$language->name}} ({{$language->code}})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success"  onclick="return confirm('Are you sure?');">Active language</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="x_panel">
                <div class="x_content">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Flag</th>
                            <th>Name</th>
                            <th>Default</th>
                            <th>Action</th>
                            <th>Translation</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($language_active as $language)
                            <tr>
                                <th scope="row">
                                    <img src="{{flagImageUrl($language->code)}}" style="width: 32px" alt="flag">
                                </th>
                                <td>{{$language->name}}</td>
                                <td>
                                    <input type="checkbox" class="js-switch language_default" name="is_default" data-id="{{$language->id}}" {{isChecked(\App\Models\Language::IS_DEFAULT, $language->is_default)}} {{isDisabled(\App\Models\Language::IS_DEFAULT, $language->is_default)}}/>
                                </td>
                                <td>
                                    <form action="{{route('admin_settings_language_status', \App\Models\Language::STATUS_DEACTIVE)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="language_id" value="{{$language->id}}">
                                        <button type="submit" class="btn btn-warning btn-sm language_deactive" onclick="return confirm('Are you sure?');" {{isDisabled(\App\Models\Language::IS_DEFAULT, $language->is_default)}}>Deactive</button>
                                    </form>
                                </td>
                                <td><a class="btn btn-info btn-sm" href="{{url('admincp/translations/view/_json')}}">Translation</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script src="{{asset('admin/js/page_setting_language.js')}}"></script>
@endpush