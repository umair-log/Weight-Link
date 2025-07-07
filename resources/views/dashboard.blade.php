@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.topbar') 
<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
            <div class="col">
                {{-- <div class="card radius-10 bg-gradient-cosmic">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-auto">
                                <p class="mb-0 text-white">Truck Weight</p>
                                <h4 class="my-1 text-white">48kg</h4>
                            </div>
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- Repeat similar structure for Load Weight, Total Weight, etc. -->
        </div>
    </div>
</div>
@include('layouts.footer')
