@extends('admin.layouts.app')
@section('title', __('messages.menu_users'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="topPanel">
                <h1 class="float-left">{{ __('messages.menu_users') }}. {{ $item ? $item->email : __('messages.admin_button_list_new_item') }}</h1>
            </div>
            <div class="formWrap row">
                <div class="col-12 col-md-8">

                    @if($item && !empty($item->created_at))
                    <ul>
                        <li><span>{{ __('messages.admin_item_created_at') }}:</span> {{ $item->created_at->format('d.m.Y H:i:s') }}</li>
                        <li><span>{{ __('messages.admin_item_updated_at') }}:</span> {{ $item->updated_at->format('d.m.Y H:i:s') }}</li>
                    </ul>
                    @endif

                    <form
                        method="POST"
                        enctype="multipart/form-data"
                        action="{{
                                $item
                                ? route('admin.users.update', $item->id)
                                : route('admin.users.store')
                            }}"
                    >
                        @csrf

                        @include('admin.elements.form.inputField', ['title' => __('messages.admin_item_email'), 'name' => 'email', 'value' => $item->email ?? '', 'type' => 'email', 'required' => 1 ])
                        @include('admin.elements.form.inputField', ['title' => __('messages.admin_item_new_password'), 'name' => 'password', 'value' => '', 'type' => 'password'])

                        <button class="btn btn-primary" type="submit">{{ $item ? __('messages.admin_button_update') : __('messages.admin_button_store') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
