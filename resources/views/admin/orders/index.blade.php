@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                List Orders
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <h3><a href="{{ url('admin/orders/withtrashed') }}" title=""><span class="glyphicon glyphicon-trash"></span>Thùng Rác</a></h3>
                        <thead>
                            <tr class="orders">
                                <th class="text-center">ID</th>
                                <th class="text-center">Order time</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total Price</th>
                                <th class="text-center" >Status</th>
                                <th class="text-center" >Actions</th>
                                <th class="text-center">Delete</th>
                                <th class="text-center">Handler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt =0 ?>
                            @foreach($orders as $order)
                            <?php $stt= $stt+1?>
                                <tr class="odd gradeX">
                                    <td class="text-center">{!! $stt !!}</td>
                                    <td class="text-center">{!! $order->updated_at !!}</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/orders/'.$order->id) }}">{!! $order->name !!}</a>
                                    </td>
                                    <td class="center">{{ $order->orderProducts->sum('quantity') }}</td>
                                    <td class="center">{!! $order->total_price !!}</td>
                                    <td class="text-center" id="stutustext">{{ $order->statusText() }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/orders/'.$order->id) }}">
                                            show
                                        </a>
                                    </td>
                                    <td class="text-center" ><a href="{{ url('admin/orders/'.$order->id.'/delete') }}" title=""><span class="glyphicon glyphicon-trash"></span></a></td>
                                    @if ($order->user_check == 0)
                                        <th class="text-center">Trống</th>
                                    @else @if($order->user_check == -1)
                                        <th class="text-center">Khách hàng</th>
                                        @else
                                        <?php $check_user = DB::table('users')->where('id' ,$order->user_check)->first(); ?>
                                        <th class="text-center">{{$check_user->name}}</th>
                                          @endif
                                    @endif
                                </tr>
                            @endforeach
                            <?php echo $orders->links(); ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    <!--End Advanced Tables -->
    </div>
</div>
@endsection
