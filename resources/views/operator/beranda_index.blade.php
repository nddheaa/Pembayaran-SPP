@extends('layouts.sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <h4 class="card-header" style="color: rgb(7, 77, 7); font-weight: bold;">SELAMAT DATANG, OPERATOR</h4>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You have successfully logged in!') }}
                </div>         
                <div style="display: flex; overflow-x: auto; white-space: nowrap; justify-content: center; align-items: center; " class="animate__animated animate__bounce">
                    <img src="{{ asset('sneat') }}/assets/img/avatars/kelas.jpeg" style="border-width:0; border-radius: 14px; box-shadow: 0 8px 16px rgb(51, 105, 21); margin-left: 20px; max-width: 100%;" width="250" height="250">
                    <img src="{{ asset('sneat') }}/assets/img/avatars/kelas2.jpeg" style="border-width:0; border-radius: 14px; box-shadow: 0 8px 16px rgb(51, 105, 21); margin-left: 20px; max-width: 100%;" width="250" height="250">
                    <img src="{{ asset('sneat') }}/assets/img/avatars/perpus (1).jpeg" style="border-width:0; border-radius: 14px; box-shadow: 0 8px 16px rgb(51, 105, 21); margin-left: 20px; max-width: 100%;" width="250" height="250">
                    <img src="{{ asset('sneat') }}/assets/img/avatars/perpus (2).jpeg" style="border-width:0; border-radius: 14px; box-shadow: 0 8px 16px rgb(51, 105, 21); margin-left: 20px; max-width: 100%;" width="250" height="250">
                    <img src="{{ asset('sneat') }}/assets/img/avatars/lokeer.jpeg" style="border-width:0; border-radius: 14px; box-shadow: 0 8px 16px rgb(51, 105, 21); margin-left: 20px; max-width: 100%;" width="250" height="250">
                    <img src="{{ asset('sneat') }}/assets/img/avatars/perpus (3).jpeg" style="border-width:0; border-radius: 14px; box-shadow: 0 8px 16px rgb(51, 105, 21); margin-left: 20px; margin-bottom:20px; max-width: 100%;" width="250" height="250">
                </div>                
                
                <br>
                <div id="motivation-quote" class="motivation-cloud text-center mx-3 mb-3 animate__animated animate__bounce">
                
                    <p id="quote-text">Loading...</p>
                    <button id="refresh-button" class="btn rounded-pill px-4 py-2 text-white" style="background-color: rgb(29, 61, 29)">
                        Refresh Quote
                    </button>               
                </div>                           
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Daftar kutipan motivasi
            const motivationQuotes = [
                "Success is the sum of small efforts, repeated day in and day out.",
                "Don't watch the clock; do what it does. Keep going.",
                "Believe you can and you're halfway there.",
                "The only way to do great work is to love what you do.",
                "Your work is going to fill a large part of your life, and the only way to be truly satisfied is to do what you believe is great work.",
                "Success usually comes to those who are too busy to be looking for it.",
                "The only place where success comes before work is in the dictionary.",
                "Your work is to discover your world and then with all your heart give yourself to it.",
                "Don't be pushed around by the fears in your mind. Be led by the dreams in your heart.",
                "The only limit to our realization of tomorrow will be our doubts of today."

            ];

            // Fungsi untuk mendapatkan kutipan motivasi acak
            function getRandomQuote() {
                const randomIndex = Math.floor(Math.random() * motivationQuotes.length);
                return motivationQuotes[randomIndex];
            }

            // Fungsi untuk memperbarui kutipan motivasi
            function updateMotivationQuote() {
                const quoteTextElement = document.getElementById('quote-text');
                quoteTextElement.textContent = getRandomQuote();
            }

            // Memanggil fungsi pertama kali halaman dimuat
            updateMotivationQuote();

            // Menambahkan event listener untuk tombol refresh
            const refreshButton = document.getElementById('refresh-button');
            refreshButton.addEventListener('click', updateMotivationQuote);
        });
    </script>

    <style>
        .motivation-cloud {
            background-color: #d6f5c9; /* Warna latar belakang awan */
            color: black;
            padding: 15px;
            border-radius: 20px; /* Bentuk bulat untuk awan */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan awan */
            position: relative; /* Posisi relatif untuk mengatur z-index elemen */
        }

        #quote-text {
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
    
@endsection
