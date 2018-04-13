@extends('master')

@section('content')
    <div class="row">
        <div class="col s12 card">
            <div class="row">
                <div class="col s12">
                    <h5 class="center"> Sales Chart </h5>
                    {!! $salesChart->render() !!}
                </div>

                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-content white-text">
                            <h2 class="center">{{ $orders_count }}</h2>
                        </div>
                        <div class="card-action center">
                            Total Orders
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-content white-text">
                            <h2 class="center"> {{ $amount }} /=</h2>
                        </div>
                        <div class="card-action center">
                            Total Total Revenue
                        </div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-content white-text">
                            <h2 class="center">{{ count($orders)-$pending }} </h2>
                        </div>
                        <div class="card-action center">
                            Confirmed Orders
                        </div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-content white-text">
                            <h2 class="center"> {{ $pending? :0 }}</h2>
                        </div>
                        <div class="card-action center">
                            Pending Orders
                        </div>
                    </div>
                </div>

                <div class="col s12">
                    <div class="card">
                        <div class="card-content white-text">
                            <h5 class="center"> Waiter Performance </h5>
                            {!! $chart->render() !!}
                        </div>
                        <div class="card-action center">
                        </div>
                    </div>
                </div>



            </div>

        </div>
        <div class="col s12 card-panel">
            @include('orders.table', $orders)
            @include('pagination.paginator', ['paginator' => $orders])
        </div>

    </div>
@endsection