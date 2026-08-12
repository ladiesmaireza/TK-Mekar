<!-- ================= Visi & Misi ================= -->
<section class="py-5 bg-white">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold text-success">
                Visi dan Misi
            </h2>

            <hr class="mx-auto" style="width:120px;height:4px;background:#22c3b3;border:none;opacity:1;">
        </div>

        <div class="row">

            <!-- VISI -->
            <div class="col-lg-12 mb-4">

                <div class="card shadow border-0 rounded-4 h-100">

                    <div class="card-header text-white" style="background:#22c3b3;">

                        <h4 class="mb-0">
                            <i class="fas fa-bullseye me-2"></i>
                            Visi
                        </h4>

                    </div>

                    <div class="card-body">

                        @if ($visi)
                            <div style="line-height:2; text-align:justify;">
                                {!! $visi->visi !!}
                            </div>
                        @else
                            <p class="text-muted mb-0">
                                Data visi belum tersedia.
                            </p>
                        @endif

                    </div>

                </div>

            </div>

            <!-- MISI -->
            <div class="col-lg-12">

                <div class="card shadow border-0 rounded-4">

                    <div class="card-header text-white" style="background:#22c3b3;">

                        <h4 class="mb-0">
                            <i class="fas fa-list-check me-2"></i>
                            Misi
                        </h4>

                    </div>

                    <div class="card-body">

                        @if ($visi)
                            <div style="line-height:2; text-align:justify;">
                                {!! nl2br(e($visi->misi)) !!}
                            </div>
                        @else
                            <p class="text-muted mb-0">
                                Data misi belum tersedia.
                            </p>
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
