<div>
    @include('includes.status')

    <div class="card">

        <div class="card-header">
            <div class="card-title ">
                <div class=" input-group input-group-sm m-auto" style="width: 150px">
                    <input class="form-control" type="search" wire:model="search" placeholder="@lang('all.search')">
                </div>
            </div>

            <div class=" card-tools">
                <button class="btn btn-success" data-toggle="modal" data-target="#add-product-modal" type="button"><i
                        class="fa fa-plus mr-2"></i> @lang('all.add')
                </button>

            </div>
        </div>
        <div class="card-body p-0">
            @if ($products == null || count($products) <= 0)
                <div class="alert alert-info m-l-10 m-r-10">
                    <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                </div>
            @else
                <div class="table-responsive">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 5%">
                                #
                            </th>
                            <th style="width: 15%">
                                @lang('all.name')
                            </th>
                            <th style="width: 15%">
                                @lang('all.photo')
                            </th>
                            <th style="width: 15%">
                                @lang('all.desc')
                            </th>
                            <th style="width: 10%">
                                @lang('all.category')
                            </th>
                            <th style="width: 10%">
                                @lang('all.sub_category')
                            </th>
                            <th style="width: 10%">
                                @lang('all.price')
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
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    #{{ $product->id }}
                                </td>
                                <td>
                                        {{ $product->name }}
                                </td>

                                <td>
                                    <img width="150"  class="img-thumbnail image-previewed" src="{{ $product->image }}">
                                </td>

                                <td>
                                    {{ $product->desc }}
                                </td>

                                <td>
                                    <a href="{{ route('admin.categories.show', $product->category) }}">
                                        {{ $product->category->name }}
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('admin.sub-categories.show', $product->subCategory) }}">
                                        {{ $product->subCategory->name }}
                                    </a>
                                </td>

                                 <td>

                                        {{ $product->getPrice() }}

                                </td>
                                <td>
                                        {{ optional($product->created_at)->format("Y-m-d") }}
                                </td>

                                <td class="project-actions text-right">

                                    @if ($delete_dialog)
                                        <button class="btn btn-danger btn-sm" data-target="#delete-modal"
                                            data-toggle="modal" wire:click="deleteId({{ $product->id }})">
                                            <i class="fas fa-trash">
                                            </i>
                                            @lang('all.delete')
                                        </button>
                                    @else
                                        @if ($deleteId == $product->id)
                                            <button class="btn btn-warning btn-sm" wire:click="delete">
                                                <i class="fas fa-check">
                                                </i>
                                                @lang('all.are_you_sure')
                                            </button>
                                        @else
                                            <button class="btn btn-danger btn-sm"
                                                wire:click="deleteId({{ $product->id }})">
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
            <span class="float-left">{{ $products->links() }}</span>

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

    @livewire('create-product')

    @push('scripts')
        <script>
            Livewire.on('product_stored', () => {
                $('#add-product-modal').modal('hide');
            });
        </script>
    @endpush

    @include('includes.delete')
    <!-- /.modal -->
</div>
