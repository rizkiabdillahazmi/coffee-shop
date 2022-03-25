@extends('layouts.admin.main')
@section('content')
<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="box-info">
        <div class="w-full mx-auto grid grid-cols-4 gap-16 justify-items-center items-center">
            <div class="flex justify-between items-center gap-8 p-4 border-l-8 border-blue-500 shadow-lg rounded-md w-80">
                <div class="flex flex-col">
                    <span class="font-bold text-2xl">23</span>
                    <span class="mb-2 font-semibold">Total Produk</span>
                </div>
                <div class="p-4 bg-blue-300 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                      </svg>
                </div>
            </div>
            <div class="flex justify-between items-center gap-8 p-4 border-l-8 border-yellow-500 shadow-lg rounded-md w-80">
                <div class="flex flex-col">
                    <span class="font-bold text-2xl">12</span>
                    <span class="mb-2 font-semibold">Produk Diskon</span>
                </div>
                <div class="p-4 bg-yellow-300 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                      </svg>
                </div>
            </div>
            <div class="flex justify-between items-center gap-8 p-4 border-l-8 border-green-500 shadow-lg rounded-md w-80">
                <div class="flex flex-col">
                    <span class="font-bold text-2xl">Rp. 1500000</span>
                    <span class="mb-2 font-semibold">Total Penjualan</span>
                </div>
                <div class="p-4 bg-green-300 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                </div>
            </div>
            <div class="flex justify-between items-center gap-8 p-4 border-l-8 border-red-500 shadow-lg rounded-md w-80">
                <div class="flex flex-col">
                    <span class="font-bold text-2xl">12 Order</span>
                    <span class="mb-2 font-semibold">Butuh Konfirmasi</span>
                </div>
                <div class="p-4 bg-red-300 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                      </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart --}}
    <div class="box-info">
        <div class="shadow-lg rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-50">Radar chart</div>
            <canvas class="p-10" id="chartRadar"></canvas>
          </div>
          
          <!-- Required chart.js -->
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          
          <!-- Chart radar -->
          <script>
            const dataRadar = {
              labels: [
                "Eating",
                "Drinking",
                "Sleeping",
                "Designing",
                "Coding",
                "Cycling",
                "Running",
              ],
              datasets: [
                {
                  label: "My First Dataset",
                  data: [65, 59, 90, 81, 56, 55, 40],
                  fill: true,
                  backgroundColor: "rgba(133, 105, 241, 0.2)",
                  borderColor: "rgb(133, 105, 241)",
                  pointBackgroundColor: "rgb(133, 105, 241)",
                  pointBorderColor: "#fff",
                  pointHoverBackgroundColor: "#fff",
                  pointHoverBorderColor: "rgb(133, 105, 241)",
                },
                {
                  label: "My Second Dataset",
                  data: [28, 48, 40, 19, 96, 27, 100],
                  fill: true,
                  backgroundColor: "rgba(54, 162, 235, 0.2)",
                  borderColor: "rgb(54, 162, 235)",
                  pointBackgroundColor: "rgb(54, 162, 235)",
                  pointBorderColor: "#fff",
                  pointHoverBackgroundColor: "#fff",
                  pointHoverBorderColor: "rgb(54, 162, 235)",
                },
              ],
            };
          
            const configRadarChart = {
              type: "radar",
              data: dataRadar,
              options: {},
            };
          
            var chartBar = new Chart(
              document.getElementById("chartRadar"),
              configRadarChart
            );
          </script>
          <div class="shadow-lg rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-50">Doughnut chart</div>
            <canvas class="p-10" id="chartDoughnut"></canvas>
          </div>
          
          <!-- Required chart.js -->
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          
          <!-- Chart doughnut -->
          <script>
            const dataDoughnut = {
              labels: ["JavaScript", "Python", "Ruby"],
              datasets: [
                {
                  label: "My First Dataset",
                  data: [300, 50, 100],
                  backgroundColor: [
                    "rgb(133, 105, 241)",
                    "rgb(164, 101, 241)",
                    "rgb(101, 143, 241)",
                  ],
                  hoverOffset: 4,
                },
              ],
            };
          
            const configDoughnut = {
              type: "doughnut",
              data: dataDoughnut,
              options: {},
            };
          
            var chartBar = new Chart(
              document.getElementById("chartDoughnut"),
              configDoughnut
            );
          </script>
    </div>
</main>
<!-- MAIN -->
@endsection