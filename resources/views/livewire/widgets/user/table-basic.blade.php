<?php
$money = ['price', 'total', 'subtotal'];
$fld = ['not', 'status', 'image',];
$lnk = ['url', 'mobile', 'phone', 'email', 'whatsapp', 'website']
?>
<div class="card shadow">
    <div class="card-body">
        {{ $results->links('livewire.widgets.user.detail-pagination') }}
        <div style="overflow-x: auto">
            <table class="table table-hover table-striped">
                <thead class="bg-header">
                <tr>
                    @foreach($headers as $header)
                        <th class="text-uppercase">{{ $header }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>

                @foreach($results as $result)
                    <tr>
                        @foreach(array_keys($headers) as $header)
                            <th class="align-middle" scope="row">
                                @if(!in_array($header, array_merge($money, $fld, $lnk)))
                                    {{ $result[$header] }}
                                @elseif($header == 'image')
                                    <div class="text-center">
                                        <img src="{{ asset($path) . '/' . $result[$header] }}" style="height: 70px;"
                                             class="img-thumbnail" alt="{{ $result[$header] }}">
                                    </div>
                                @elseif($header == 'status')
                                    @if($result[$header] == '1')
                                        <span
                                            class="rounded-0 badge {{ (int)$result[$header]?'badge-success-1':'badge-danger-1 ' }}">
                                       {{ (int)$result[$header] ? 'activo' : 'inactivo' }}
                                    </span>
                                    @else
                                        <span class="rounded-0 badge {{ $result[$header] }}">
                                       {{ $result[$header] }}
                                    </span>
                                    @endif
                                @elseif($header == 'total')
                                    <p>S/ {{ number_format($result[$header], 2, '.', ',') }}</p>
                                @elseif(in_array($header, ['mobile', 'phone']))
                                    <a href="tel:{{ $result[$header] }}">{{ $result[$header] }}</a>
                                @elseif(in_array($header, ['website', 'url']))
                                    <a href="{{ $result[$header] }}">{{ $result[$header] }}</a>
                                @elseif(in_array($header, ['email']))
                                    <a href="mailto:{{ $result[$header] }}">{{ $result[$header] }}</a>
                                @elseif(in_array($header, ['whatsapp']))
                                    <a href="https://api.whatsapp.com/send?phone=51{{ $result[$header] }}"
                                       target="_blank">{{ $result[$header] }}</a>
                                @elseif($header == 'not')


                                    <div class="btn-group">
                                        <div class="btn-group dropstart" role="group">
                                            <button type="button"
                                                    class="btn btn-secondary btn-extra-sm"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fi-rs-settings"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                @include('livewire.widgets.user.action-table')
                                            </ul>
                                        </div>

                                    </div>
                                @endif
                            </th>
                        @endforeach
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
        {{ $results->links('livewire.widgets.user.pagination') }}
    </div>
</div>

