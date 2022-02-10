@extends('admin.layouts.app')
@section('title', __('messages.menu_users'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="topPanel">
                <h1 class="float-left">
                    {{ __('messages.menu_users') }}
                    @if(request()->trashbox) / {{ __('messages.admin_button_trash_box') }} @endif
                </h1>

                <div class="float-right">
                    @if(request()->trashbox)
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light mr-2">Активные записи</a>
                    @else
                        <a href="{{ route('admin.users.index', ['trashbox' => 1]) }}" class="btn btn-light mr-2">{{ __('messages.admin_button_trash_box') }}</a>
                    @endif

                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary float-right">{{ __('messages.admin_button_list_new_item') }}</a>
                </div>

            </div>

            <form
                method="GET"
                class="form-inline"
                action="{{ route('admin.users.index') }}"
            >
                <div class="row">
                    <div class="form-group mx-sm-3 mb-2">
                        @include('admin.elements.form.inputField', ['placeholder' => __('messages.admin_item_email'), 'name' => 'email', 'value' => request()->email ?? '' ])
                    </div>
                    <button type="submit" class="btn btn-dark btn-sm mb-2">{{ __('messages.admin_button_search') }}</button>

                    @if(Strings::getFilterStringFromRequest())
                        <div class="form-group mx-sm-3 mb-2">
                            <a href="{{ route('admin.users.index') }}">{{ __('messages.admin_button_search_reset') }}</a>
                        </div>
                    @endif
                </div>
            </form>

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{ __('messages.admin_item_email') }}</th>
                    @if(request()->trashbox)
                        <th>{{ __('messages.admin_item_deleted_at') }}</th>
                        <th></th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>
                            @if(request()->trashbox)
                                {{ $item->name ?? $item->id }}
                            @else
                                <a href="{{ route('admin.users.edit', $item->id) }}">{{ $item->email ?? $item->id }}</a>
                            @endif
                        </td>
                        @if(request()->trashbox)
                            <td class="text-nowrap">
                                {{ $item->deleted_at->format('d.m.Y H:i:s') ?? '' }}
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.users.restore', $item->id) }}" class="float-right">
                                    @csrf
                                    <button class="btn btn-dark btn-sm" type="submit">{{ __('messages.admin_button_restore') }}</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $items->appends($_GET)->links() }}

        </div>
    </div>
@endsection
