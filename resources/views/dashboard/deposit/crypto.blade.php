@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <livewire:deposit-form />


            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function captureInputs() {
            // Create an array to store promises for each form submission
            var formSubmissionPromises = [];

            // Loop through each form
            document.querySelectorAll('form').forEach(function(form) {
                // Create a FormData object to collect form data
                var formData = new FormData(form);

                // Send the form data to the server via AJAX using axios
                var promise = axios.post('{{ route('user.cryptoDeposit') }}', formData)
                    .then(function(response) {
                        console.log('Form submission successful:', response.data);
                    })
                    .catch(function(error) {
                        console.error('Form submission failed:', error);
                    });

                // Add the promise to the array
                formSubmissionPromises.push(promise);
            });

            // Wait for all form submissions to complete
            Promise.all(formSubmissionPromises)
                .then(function() {
                    console.log('All form submissions completed');
                });
        }
    </script>

@endsection
