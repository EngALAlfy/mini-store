@extends('layout.panel')

@section('title')
    @lang('all.contacts')
@endsection

@section('page_title')
    @lang('all.contacts')
@endsection


@section('breadcrumb_title')
    @lang('all.contacts')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('includes.status')

                <div class="card">

                    @if ($contacts != null && count($contacts) > 0)
                        <div class="card-header">
                            <form class="float-left" action="{{ route('admin.contacts.destroyAll') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash">
                                    </i>
                                    @lang('all.deleteAll')
                                </button>
                            </form>
                        </div>
                    @endif
                    <div class="card-body">
                        @if ($contacts == null || count($contacts) <= 0)
                            <div class="alert alert-info m-l-10 m-r-10">
                                <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                            </div>
                        @else
                            <table class="table table-striped projects  table-responsive">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">
                                            #
                                        </th>
                                        <th style="width: 10%">
                                            @lang('all.name')
                                        </th>
                                        <th style="width: 10%">
                                            @lang('all.phone')
                                        </th>
                                        <th style="width: 10%">
                                            @lang('all.email')
                                        </th>
                                        <th style="width: 10%">
                                            @lang('all.title')
                                        </th>
                                        <th style="width: 35%">
                                            @lang('all.message')
                                        </th>
                                        <th style="width: 10%">
                                            @lang('all.date')
                                        </th>
                                        <th style="width: 10%">
                                            @lang('all.actions')
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>
                                                #{{ $contact->id }}
                                            </td>
                                            <td>
                                                {{ $contact->name }}
                                            </td>
                                            <td>
                                                {{ $contact->phone }}
                                            </td>
                                            <td>
                                                {{ $contact->email }}
                                            </td>
                                            <td>
                                                {{ $contact->title }}
                                            </td>
                                            <td>
                                                {{ $contact->message }}
                                            </td>

                                            <td>
                                                {{ $contact->created_at->format('d-m-Y') }}
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.contacts.destroy', $contact) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        @lang('all.delete')
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <span class="float-left">{{ $contacts->links() }}</span>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
