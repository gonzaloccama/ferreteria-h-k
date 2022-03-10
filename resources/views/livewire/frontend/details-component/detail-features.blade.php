<div class="tab-style3 card">
    <ul class="nav nav-tabs text-uppercase card-header">
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
                (3)</a>
        </li>
    </ul>
    <div class="tab-content shop_info_tab entry-main-content card-body">
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
                        <h4 class="mb-30">Customer questions & answers</h4>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb text-center">
                                        <img
                                            src="{{ asset('assets/frontend/imgs/page/avatar-6.jpg') }}"
                                            alt="">
                                        <h6><a href="#">Jacky Chan</a></h6>
                                        <p class="font-xxs">Since 2012</p>
                                    </div>
                                    <div class="desc">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <p>Thank you very fast shipping from Poland only
                                            3days.</p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <p class="font-xs mr-30">December 4, 2020 at
                                                    3:12 pm </p>
                                                <a href="#" class="text-brand btn-reply">Reply
                                                    <i class="fi-rs-arrow-right"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--single-comment -->
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb text-center">
                                        <img
                                            src="{{ asset('assets/frontend/imgs/page/avatar-7.jpg') }}"
                                            alt="">
                                        <h6><a href="#">Ana Rosie</a></h6>
                                        <p class="font-xxs">Since 2008</p>
                                    </div>
                                    <div class="desc">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <p>Great low price and works well.</p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <p class="font-xs mr-30">December 4, 2020 at
                                                    3:12 pm </p>
                                                <a href="#" class="text-brand btn-reply">Reply
                                                    <i class="fi-rs-arrow-right"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--single-comment -->
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb text-center">
                                        <img
                                            src="{{ asset('assets/frontend/imgs/page/avatar-8.jpg') }}"
                                            alt="">
                                        <h6><a href="#">Steven Keny</a></h6>
                                        <p class="font-xxs">Since 2010</p>
                                    </div>
                                    <div class="desc">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <p>Authentic and Beautiful, Love these way more than
                                            ever expected They are Great earphones</p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <p class="font-xs mr-30">December 4, 2020 at
                                                    3:12 pm </p>
                                                <a href="#" class="text-brand btn-reply">Reply
                                                    <i class="fi-rs-arrow-right"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--single-comment -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="mb-30">Customer reviews</h4>
                        <div class="d-flex mb-30">
                            <div class="product-rate d-inline-block mr-15">
                                <div class="product-rating" style="width:90%">
                                </div>
                            </div>
                            <h6>4.8 out of 5</h6>
                        </div>
                        <div class="progress">
                            <span>5 star</span>
                            <div class="progress-bar" role="progressbar" style="width: 50%;"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%
                            </div>
                        </div>
                        <div class="progress">
                            <span>4 star</span>
                            <div class="progress-bar" role="progressbar" style="width: 25%;"
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
                            </div>
                        </div>
                        <div class="progress">
                            <span>3 star</span>
                            <div class="progress-bar" role="progressbar" style="width: 45%;"
                                 aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%
                            </div>
                        </div>
                        <div class="progress">
                            <span>2 star</span>
                            <div class="progress-bar" role="progressbar" style="width: 65%;"
                                 aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%
                            </div>
                        </div>
                        <div class="progress mb-30">
                            <span>1 star</span>
                            <div class="progress-bar" role="progressbar" style="width: 85%;"
                                 aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%
                            </div>
                        </div>
                        <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                    </div>
                </div>
            </div>
            <!--comment form-->
            <div class="comment-form">
                <h4 class="mb-15">Add a review</h4>
                <div class="product-rate d-inline-block mb-30">
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <form class="form-contact comment_form" action="#" id="commentForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                                                <textarea class="form-control w-100" name="comment"
                                                                          id="comment" cols="30" rows="9"
                                                                          placeholder="Write Comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name"
                                               type="text" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email"
                                               type="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="website" id="website"
                                               type="text" placeholder="Website">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm">Submit
                                    Review
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
