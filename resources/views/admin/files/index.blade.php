@extends('admin.layouts.app')
@section('title', __('messages.menu_files'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="topPanel">
                <h1 class="float-left">
                    {{ __('messages.menu_files') }}
                    @if(request()->trashbox) / {{ __('messages.admin_button_trash_box') }} @endif
                </h1>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th width="130">{{ __('messages.admin_table_th_file_icon') }}</th>
                    <th>{{ __('messages.admin_table_th_file_path') }}</th>
                    <th>{{ __('messages.admin_table_th_file_size') }}</th>
                    <th>{{ __('messages.admin_table_th_file_created_at') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td width="130">
                            <a href="{{ Strings::filePath($item->path) }}" data-fancybox="gallery" target="_blank">
                                <img src="{{ Strings::filePath($item->path) }}" alt="" style="max-width: 100px; max-height: 50px">
                            </a>
                        </td>
                        <td>
                            <a href="{{ Strings::filePath($item->path) }}" target="_blank">
                                {{ $item->path ?? '' }}
                            </a>
                        </td>
                        <td>
                            {{ number_format(($item->size / 1024), 2) }} кб
                        </td>
                        <td>
                            {{ $item->created_at->format('d.m.Y H:i:s') }}
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.files.destroy', $item->id) }}" class="float-right">
                                {!! method_field('DELETE') !!}
                                @csrf
                                <button class="btn btn-primary btn-sm" type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $items->appends($_GET)->links() }}

        </div>
    </div>
@endsection
