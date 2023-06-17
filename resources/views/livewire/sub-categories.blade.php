<div>
    @include('includes.status')

    <div class="card">

        <div class="card-header">
            <div class="card-title">
                <div class=" input-group input-group-sm m-auto" style="width: 150px">
                    <input class="form-control" type="search" wire:model="search" placeholder="@lang('all.search')">
                </div>
            </div>

            <div class="d-flex card-tools">
                <button class="btn btn-success" data-toggle="modal" data-target="#add-sub-category-modal" type="button">
                    <i
                        class="fa fa-plus mr-2"></i> @lang('all.add')
                </button>

            </div>
        </div>
        <div class="card-body p-0">
            @if ($subCategories == null || count($subCategories) <= 0)
                <div class="alert alert-info m-l-10 m-r-10">
                    <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped projects ">
                        <thead>
                        <tr>
                            <th style="width: 10%">
                                #
                            </th>
                            <th style="width: 50%">
                                @lang('all.name')
                            </th>

                            <th style="width: 20%">
                                @lang('all.category')
                            </th>
                            <th style="width: 20%">
                                @lang('all.actions')
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($subCategories as $subCategory)
                            <tr>
                                <td>
                                    #{{ $subCategory->id }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.sub-categories.show', $subCategory) }}">
                                        {{ $subCategory->name }}
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('admin.categories.show', $subCategory->category) }}">
                                        {{ $subCategory->category->name }}
                                    </a>
                                </td>

                                <td class="project-actions text-right">
                                    @if ($delete_dialog)
                                        <button class="btn btn-danger btn-sm" data-target="#delete-modal"
                                                data-toggle="modal" wire:click="deleteId({{ $subCategory->id }})">
                                            <i class="fas fa-trash">
                                            </i>
                                            @lang('all.delete')
                                        </button>
                                    @else
                                        @if ($deleteId == $subCategory->id)
                                            <button class="btn btn-warning btn-sm" wire:click="delete">
                                                <i class="fas fa-check">
                                                </i>
                                                @lang('all.are_you_sure')
                                            </button>
                                        @else
                                            <button class="btn btn-danger btn-sm"
                                                    wire:click="deleteId({{ $subCategory->id }})">
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
            <span class="float-left">{{ $subCategories->links() }}</span>

            <div class="form-group float-right">

                <label>
                    <select class="form-control" wire:model="perPage">
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

    @livewire('create-sub-category')

    @push('scripts')
        <script>
            Livewire.on('sub_category_stored', () => {
                $('#add-sub-category-modal').modal('hide');
            });
        </script>
    @endpush

    {{-- @include('tests.create') --}}
    @include('includes.delete')
    <!-- /.modal -->
</div>
