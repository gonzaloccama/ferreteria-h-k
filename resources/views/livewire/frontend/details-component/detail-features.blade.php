<div class="tab-style3 card">
    <ul class="nav nav-tabs nav-fill text-uppercase card-header">
        <li class="nav-item">
            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
               href="#Description">DESCRIPCIÓN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
               href="#Additional-info">CARACTERISTICAS</a>
        </li>
        @if($product->video_url != '')
            <li class="nav-item">
                <a class="nav-link" id="video-info-tab" data-bs-toggle="tab"
                   href="#video-info">VIDEO</a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">VALORACIÓN
                ({{ ($orderItems = $product->orderItems->where('rstatus', 1))->count() }})</a>
        </li>
    </ul>
    <div class="tab-content shop_info_tab entry-main-content pl-30 pb-30 pr-30">
        <div class="tab-pane fade show active" id="Description">
            <div class="">
                <p>{!! $product->description !!}</p>
            </div>
        </div>
        <div class="tab-pane fade" id="Additional-info">
            <table class="font-md">
                <tbody>
                <tr class="stand-up">
                    <th>Stand Up</th>
                    <td>
                        <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                    </td>
                </tr>
                <tr class="folded-wo-wheels">
                    <th>Folded (w/o wheels)</th>
                    <td>
                        <p>32.5″L x 18.5″W x 16.5″H</p>
                    </td>
                </tr>
                <tr class="folded-w-wheels">
                    <th>Folded (w/ wheels)</th>
                    <td>
                        <p>32.5″L x 24″W x 18.5″H</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        @if($product->video_url != '')
            <div class="tab-pane fade" id="video-info">
                <video
                    id="vid1"
                    class="video-js vjs-theme-sea"
                    controls
                    width="640"
                    data-setup='{ "controlBar": { "muteToggle": false }, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ $product->video_url }}"}] }'
                >
                </video>
            </div>
        @endif
        <div class="tab-pane fade" id="Reviews">
            <!--Comments-->
            <div class="comments-area">
                <div class="row">
                    <div class="col-lg-8">
                        <h4 class="mb-30">Preguntas y respuestas de los clientes</h4>
                        <div class="comment-list">
                            @foreach($orderItems as $orderItem)
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb text-center" >
                                            @if(isset($orderItem->order->user->profile->image) && !empty($orderItem->order->user->profile->image))
                                                <img
                                                    src="{{ asset('assets/images/profile/').'/'.$orderItem->order->user->profile->image }}"
                                                    alt="">
                                            @else
                                                <img
                                                    src="{{ asset('assets/images/profile/avatar.svg') }}"
                                                    alt="">
                                            @endif


                                            <h6><a href="#">{{ $orderItem->order->user->name }}</a></h6>
                                            {{--                                            <p class="font-xxs">Since 2012</p>--}}
                                        </div>
                                        <div class="desc">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating"
                                                     style="width:{{ $orderItem->review->rating * 100 / 5 }}%">
                                                </div>
                                            </div>
                                            <p>{!! $orderItem->review->comment !!}</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <p class="font-xs mr-30">
                                                        <?php echo ucfirst(Carbon\Carbon::parse($orderItem->review->created_at)
                                                            ->locale('es')
                                                            ->translatedFormat('l d \d\e F \d\e\l Y | g:i:s A'));
                                                        ?>
                                                    </p>
                                                    <a href="javascript:;" class="text-brand btn-reply">Respuesta
                                                        <i class="fi-rs-arrow-right"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="mb-30">Valoración de usuarios</h4>
                        <?php
                        $avgrating = 0;
                        $averange = [
                            'star_5' => 0,
                            'star_4' => 0,
                            'star_3' => 0,
                            'star_2' => 0,
                            'star_1' => 0,
                        ];

                        foreach ($cnt = $product->orderItems->where('rstatus', 1) as $orderItem) {
                            $avgrating += $orderItem->review->rating;
                            if ($orderItem->review->rating == 5) {
                                $averange['star_5'] += $orderItem->review->rating;
                            } elseif ($orderItem->review->rating == 4) {
                                $averange['star_4'] += $orderItem->review->rating;
                            } elseif ($orderItem->review->rating == 3) {
                                $averange['star_3'] += $orderItem->review->rating;
                            } elseif ($orderItem->review->rating == 2) {
                                $averange['star_2'] += $orderItem->review->rating;
                            } elseif ($orderItem->review->rating == 1) {
                                $averange['star_1'] += $orderItem->review->rating;
                            }
                        }
                        ?>
                        {{--                        {{ json_encode($averange) }}--}}
                        <div class="d-flex mb-30">
                            <div class="product-rate d-inline-block mr-15">
                                <?php
                                $percent = 100;
                                if ($cnt->count()) {
                                    $percent = ($avgrating / $cnt->count()) * 100 / 5;
                                }
                                ?>
                                <div class="product-rating" style="width:{{ $percent }}%">
                                </div>
                            </div>
                            <h6>
                                {{ $cnt->count() ? round($avgrating / $cnt->count(), 2) : '0' }} de 5
                            </h6>
                        </div>

                        @foreach($averange as $key => $av)
                            <?php
                            $percent = 100;
                            if ($cnt->count()) {
                                $percent = round(($av / $cnt->count()) * 100 / ($avgrating / $cnt->count()), 2);
                            }
                            ?>
                            <div class="progress">
                                <span>{{ str_replace('star_', '', $key) }} star</span>
                                <div class="progress-bar" role="progressbar"
                                     style="width: {{ $percent }}%;"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    {{ $percent }}%
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
