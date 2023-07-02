<div>
    @include('includes.status')


    <div class="card">

        <div class="card-header">
            <div class="card-title">
                <div class=" input-group input-group-sm m-auto" style="width: 150px">
                    <input type="search" wire:model="search" class="form-control" placeholder="@lang('all.search')">
                </div>
            </div>


            <div class="d-flex card-tools">
                <a href="{{ route('admin.pages.create') }}"
                    class="btn btn-success"><i class="fa fa-plus mr-2"></i> @lang('all.add')
                </a>

            </div>
        </div>
        <div class="card-body p-0">
            @if ($pages == null || count($pages) <= 0)
                <div class="alert alert-info m-l-10 m-r-10">
                    <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                </div>
            @else
                <div class="table-responsive">

                    <table class="table table-striped projects">
                        <thead>
                        <tr>

                            <th style="width: 10%">
                                #
                            </th>
                            <th style="width: 50%">
                                @lang('all.name')
                            </th>
                            <th style="width: 40%">
                                @lang('all.actions')
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>
                                    #{{ $page->id }}
                                </td>

                                <td>
                                    <a href="{{ route('pages.show', $page) }}">
                                        {{ $page->name }}
                                    </a>
                                </td>

                                <td class="project-actions text-right">

                                    @if ($delete_dialog)
                                        <button wire:click="deleteId({{ $page->name }})"
                                                data-target="#delete-modal" data-toggle="modal"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            @lang('all.delete')
                                        </button>
                                    @else
                                        @if ($deleteId == $page->name)
                                            <button wire:click="delete" class="btn btn-warning btn-sm">
                                                <i class="fas fa-check">
                                                </i>
                                                @lang('all.are_you_sure')
                                            </button>
                                        @else
                                            <button wire:click="deleteId({{ $page->name }})"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                                @lang('all.delete')
                                            </button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <span class="float-left">{{ $pages->links() }}</span>

            <div class="form-group float-right">

                <label>
                    <select wire:model="perPage" class="form-control">
                        <option>10</option>
                        <option>50</option>
                        <option>100</option>
                        <option>500</option>
                        <option>1000</option>
                    </select>
                </label>
            </div>
        </div>


    </div>

    {{-- @include('tests.create') --}}
    @include('includes.delete')
    <!-- /.modal -->
</div>
