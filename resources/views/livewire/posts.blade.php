<div>
    @include('includes.status')

    <div class="card">

        <div class="card-header">
            @if ($posts != null && count($posts) > 0)

                <button data-toggle="modal" data-target="#delete-all-modal" class="float-right btn btn-danger m-l-10">
                    <i class="fas fa-trash">
                    </i>
                    @lang('all.deleteAll')
                </button>

            @endif

            <div class="card-title ">
                <div class=" input-group input-group-sm m-auto" style="width: 150px">
                    <input class="form-control" type="search" wire:model="search" placeholder="@lang('all.search')">
                </div>
            </div>

            <div class=" card-tools">
                <button class="btn btn-success" data-toggle="modal" data-target="#add-post-modal" type="button"><i
                        class="fa fa-plus mr-2"></i> @lang('all.add')
                </button>

            </div>
        </div>
        <div class="card-body p-0">
            @if ($posts == null || count($posts) <= 0)
                <div class="alert alert-info m-l-10 m-r-10">
                    <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                </div>
            @else
                <table class="table table-striped projects table-responsive">
                    <thead>
                        <tr>
                            <th style="width: 5%">
                                #
                            </th>
                            <th style="width: 20%">
                                @lang('all.name')
                            </th>
                            <th style="width: 15%">
                                @lang('all.photo')
                            </th>
                            <th style="width: 10%">
                                @lang('all.category')
                            </th>
                            <th style="width: 15%">
                                @lang('all.price')
                            </th>
                            <th style="width: 10%">
                                @lang('all.state')
                            </th>
                            <th style="width: 10%">
                                @lang('all.date')
                            </th>
                            <th style="width: 15%">
                                @lang('all.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    #{{ $post->id }}
                                </td>
                                <td>
                                    <a href="{{ $post->url }}" target="_blank">
                                        {{ $post->name }}
                                    </a>

                                </td>

                                <td>
                                    <img class=" img-size-64" src="{{ $post->image }}">
                                </td>

                                <td>
                                    <a href="{{ route('admin.categories.show', $post->category) }}">
                                        {{ $post->category->name }}
                                    </a>

                                </td>

                                <td>
                                    <a href="{{ route('admin.prices.show', $post->price) }}">
                                        {{ $post->price->name }}
                                    </a>

                                </td>

                                 <td>
                                    <a href="{{ route('admin.states.show', $post->state) }}">
                                        {{ $post->state->name }}
                                    </a>

                                </td>
                                <td>
                                        {{ $post->date }}
                                </td>

                                <td class="project-actions text-right">
                                    {{-- <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a> --}}

                                    @if ($delete_dialog)
                                        <button class="btn btn-danger btn-sm" data-target="#delete-modal"
                                            data-toggle="modal" wire:click="deleteId({{ $post->id }})">
                                            <i class="fas fa-trash">
                                            </i>
                                            @lang('all.delete')
                                        </button>
                                    @else
                                        @if ($deleteId == $post->id)
                                            <button class="btn btn-warning btn-sm" wire:click="delete">
                                                <i class="fas fa-check">
                                                </i>
                                                @lang('all.are_you_sure')
                                            </button>
                                        @else
                                            <button class="btn btn-danger btn-sm"
                                                wire:click="deleteId({{ $post->id }})">
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
            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <span class="float-left">{{ $posts->links() }}</span>

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

    @livewire('create-post')

    @push('scripts')
        <script>
            Livewire.on('post_stored', () => {
                $('#add-post-modal').modal('hide');
            });
        </script>
    @endpush

    @include('includes.delete')
    @include('includes.delete-all')
    <!-- /.modal -->
</div>
