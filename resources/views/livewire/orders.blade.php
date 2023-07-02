<div>
    @include('includes.status')

    <div class="card">

        <div class="card-header">
            <div class="card-title ">
                <div class=" input-group input-group-sm m-auto" style="width: 150px">
                    <input class="form-control" type="search" wire:model="search" placeholder="@lang('all.search')">
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            @if ($orders == null || count($orders) <= 0)
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
                            <th style="width: 10%">
                                @lang('all.email')
                            </th>
                            <th style="width: 10%">
                                @lang('all.phone')
                            </th>
                            <th style="width: 20%">
                                @lang('all.message')
                            </th>
                            <th style="width: 10%">
                                @lang('all.product')
                            </th>
                            <th style="width: 15%">
                                @lang('all.date')
                            </th>
                            <th style="width: 15%">
                                @lang('all.actions')
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    #{{ $order->id }}
                                </td>
                                <td>
                                    {{ $order->client_name }}
                                </td>
                                <td>
                                    {{ $order->client_email }}
                                </td>
                                <td>
                                    {{ $order->client_phone }}
                                </td>
                                <td>
                                    {{ $order->message }}
                                </td>
                                <td>
                                    <a href="{{route('admin.products.show' , $order->product)}}">{{ $order->product->name }}</a>
                                </td>
                                <td>
                                    {{ optional($order->created_at)->format("Y-m-d") }}
                                </td>

                                <td class="project-actions text-right">
                                    @if ($delete_dialog)
                                        <button class="btn btn-danger btn-sm" data-target="#delete-modal"
                                                data-toggle="modal" wire:click="deleteId({{ $order->id }})">
                                            <i class="fas fa-trash">
                                            </i>
                                            @lang('all.delete')
                                        </button>
                                    @else
                                        @if ($deleteId == $order->id)
                                            <button class="btn btn-warning btn-sm" wire:click="delete">
                                                <i class="fas fa-check">
                                                </i>
                                                @lang('all.are_you_sure')
                                            </button>
                                        @else
                                            <button class="btn btn-danger btn-sm"
                                                    wire:click="deleteId({{ $order->id }})">
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
            <span class="float-left">{{ $orders->links() }}</span>

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

    @include('includes.delete')
    <!-- /.modal -->
</div>
