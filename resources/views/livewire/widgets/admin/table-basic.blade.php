<div class="border">
    <?php
    $money = ['price', 'total', 'subtotal'];
    $fld = ['not', 'status', 'image'];
    $lnk = ['url', 'link', 'mobile', 'phone', 'email', 'whatsapp', 'website']
    ?>
    <div class="card-body" style="overflow-x: auto">
        {{ $results->links('livewire.widgets.user.detail-pagination') }}
        <table class="table table-hover responsive">
            <thead class="thead-light">
            <tr>
                @foreach($headers as $header)
                    <th scope="col" class="text-uppercase">{{ $header }}</th>
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
                            @elseif(in_array($header, ['website', 'url', 'link']))
                                <a href="{{ $result[$header] }}">{{ $result[$header] }}</a>
                            @elseif(in_array($header, ['email']))
                                <a href="mailto:{{ $result[$header] }}">{{ $result[$header] }}</a>
                            @elseif(in_array($header, ['whatsapp']))
                                <a href="https://api.whatsapp.com/send?phone=51{{ $result[$header] }}"
                                   target="_blank">{{ $result[$header] }}</a>
                            @elseif($header == 'not')

                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <i class="simple-icon-settings"
                                           style="font-size: 14px; position: absolute; margin-top: -7px"></i>
                                    </button>
                                    <button type="button"
                                            class="btn btn-primary btn-xs dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{--                                        <i class="fe-chevron-down"></i>--}}
                                    </button>

                                    <div class="dropdown-menu">
                                        @include('livewire.widgets.admin.action-table')
                                    </div>
                                </div>

                                @if(isset($customs) && !empty($customs))
                                    @include('livewire.widgets.admin.action-custom-table')
                                @endif
                            @endif
                        </th>
                    @endforeach
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
</div>
<div class="wrap-pagination-info">
    {{ $results->links('livewire.widgets.admin-pagination-link') }}
</div>
