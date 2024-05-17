<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <div class="col-12">
                <div class="row">

                    <!-- Dogs Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card dogs-card">

                            <div class="card-body">
                                <h5 class="card-title">Dogs</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-dog"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Dogs Card -->

                    <!-- Cats Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card cats-card">

                            <div class="card-body">
                                <h5 class="card-title">Cats</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-cat"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$3,264</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Cats Card -->

                    <!-- Owners Card -->
                    <div class="col-xxl-3 col-md-6">

                        <div class="card info-card owners-card">

                            <div class="card-body">
                                <h5 class="card-title">Owners</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-user"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Owners Card -->

                    <!-- Vaccinated Card -->
                    <div class="col-xxl-3 col-md-6">

                        <div class="card info-card vacc-card">

                            <div class="card-body">
                                <h5 class="card-title">Vaccinated</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-injection"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Vaccinated Card -->

                </div>
            </div>

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- [Project Calendar] start -->
                    <template>
                        <b-row>
                            <b-col md="auto">
                                <b-calendar v-model="value" @context="onContext" locale="en-US"></b-calendar>
                            </b-col>
                            <b-col>
                                <p>Value: <b>'{{ value }}'</b></p>
                                <p class="mb-0">Context:</p>
                                <pre class="small">{{ context }}</pre>
                            </b-col>
                        </b-row>
                    </template>

                    <script>
                    export default {
                        data() {
                            return {
                                value: '',
                                context: null
                            }
                        },
                        methods: {
                            onContext(ctx) {
                                this.context = ctx
                            }
                        }
                    }
                    </script>


                    <!-- [Project Calendar] end -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Website Traffic -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Website Traffic</h5>

                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            echarts.init(document.querySelector("#trafficChart")).setOption({
                                tooltip: {
                                    trigger: 'item'
                                },
                                legend: {
                                    top: '5%',
                                    left: 'center'
                                },
                                series: [{
                                    name: 'Access From',
                                    type: 'pie',
                                    radius: ['40%', '70%'],
                                    avoidLabelOverlap: false,
                                    label: {
                                        show: false,
                                        position: 'center'
                                    },
                                    emphasis: {
                                        label: {
                                            show: true,
                                            fontSize: '18',
                                            fontWeight: 'bold'
                                        }
                                    },
                                    labelLine: {
                                        show: false
                                    },
                                    data: [{
                                            value: 1048,
                                            name: 'Search Engine'
                                        },
                                        {
                                            value: 735,
                                            name: 'Direct'
                                        },
                                        {
                                            value: 580,
                                            name: 'Email'
                                        },
                                        {
                                            value: 484,
                                            name: 'Union Ads'
                                        },
                                        {
                                            value: 300,
                                            name: 'Video Ads'
                                        }
                                    ]
                                }]
                            });
                        });
                        </script>

                    </div>
                </div><!-- End Website Traffic -->

            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->

<?php
include "includes/footer.php";
?>