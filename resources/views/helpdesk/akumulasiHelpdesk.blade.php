<x-helpdesk-layout>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.sidebarHelpdesk')
        </div>
        <div id="main" class='layout-navbar'>
            @include('layouts.headerHelpdesk')
            <div id="main-content">
                <div class="row">
                    <section class="section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Akumulasi Layanan</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="bar"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                @include('layouts.footer')
            </div>
        </div>
    </div>
</x-helpdesk-layout>