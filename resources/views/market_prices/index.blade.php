@extends('shared.master')

@section('title','Bei za Soko')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h3 class="box-title">Bei za Masoko Tanzania</h3>
                        <p class="text-muted small mb-0">Usimamizi wa bei za bidhaa kutoka masoko mbalimbali.</p>
                    </div>
                    <a href="{{ route('market.market_price.create') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Ongeza Bei
                    </a>
                </div>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('success') }}
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="pricesTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Bidhaa</th>
                                <th>Soko / Mahali</th>
                                <th>Kipimo</th>
                                <th>Bei ya Chini</th>
                                <th>Bei ya Juu</th>
                                <th>Hali</th>
                                <th>Tarehe</th>
                                <th style="width:100px;">Vitendo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($prices as $price)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $price->commodity->name ?? '—' }}</strong></td>
                                <td>{{ $price->location ?? '<span class="text-muted">—</span>' }}</td>
                                <td><span class="label label-default">{{ $price->unit ?? 'kg' }}</span></td>
                                <td>Tsh {{ number_format($price->price_min) }}</td>
                                <td>Tsh {{ number_format($price->price_max) }}</td>
                                <td>
                                    @if($price->market_type === 'trending')
                                        <span class="label label-warning"><i class="fa fa-arrow-up"></i> Inapanda</span>
                                    @elseif($price->market_type === 'hot_offer')
                                        <span class="label label-success"><i class="fa fa-tag"></i> Punguzo</span>
                                    @else
                                        <span class="label label-default">Kawaida</span>
                                    @endif
                                </td>
                                <td>{{ $price->recorded_at?->format('d M, Y') ?? '—' }}</td>
                                <td>
                                    <a href="{{ route('market.market_price.edit', $price->id) }}"
                                       class="btn btn-xs btn-primary" title="Hariri">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('market.market_price.destroy', $price->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Futa bei hii?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger" title="Futa">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">
                                    Hakuna bei zilizoingizwa bado.
                                    <a href="{{ route('market.market_price.create') }}">Ongeza sasa</a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $prices->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
